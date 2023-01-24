<?php


class Article
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $text;

    /** @var string */
    private $authorId;

    /** @var string */
    private $createdAt;

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return Article[]
     */
    public static function findAll(): array
    {
        $db = new Db();
        return $db->query('SELECT * FROM `comments`;', [], Article::class);
    }

    public static function sendText($params): array
    {
        $db = new Db();
        return $db->query('INSERT INTO comments (date,user_name,email,title,text) VALUES(NOW(),:user_name,:email,:title,:text)', $params, Article::class);
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
}



class Db
{
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {

        require_once('../settings.php');
    	
        $this->pdo = new \PDO(
            'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'],
            $db['user'],
            $db['password']
        );
        $this->pdo->exec('SET NAMES UTF8');

    }

    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
    }
}

$article = new Article();



