<?php

require_once('../models/model.php');


if($_REQUEST['func']=="find_all")
{
	$html="";
	$arr=$article->findAll();	
	foreach ($arr as $key => $value) {
		$html=$html.
		"<div style='border:1px solid #000;margin:10px;padding:10px;'><div>Date: ".$arr[$key][1]."</div></br>
		<div>Name: ".$arr[$key][2]."</div>
		<div>Email: ".$arr[$key][3]."</div>
		<div>Title: ".$arr[$key][4]."</div>
		<div>Text: ".$arr[$key][5]."</div></div>";
	}
	echo $html;
}

if($_REQUEST['func']=="send_text")
{
	$arr=$article->sendText(array(':user_name' => $_REQUEST['name'],':email' => $_REQUEST['email'],':title' => $_REQUEST['title'],':text' => $_REQUEST['text']));	
}


