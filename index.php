<?php require_once('header.php');?>

<div class="article">

	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pulvinar etiam non quam lacus. Felis bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Sed egestas egestas fringilla phasellus faucibus scelerisque. Sit amet commodo nulla facilisi nullam vehicula ipsum a arcu. Sed egestas egestas fringilla phasellus faucibus scelerisque. Faucibus ornare suspendisse sed nisi lacus sed viverra. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non curabitur. Adipiscing elit duis tristique sollicitudin nibh. Faucibus a pellentesque sit amet porttitor eget dolor morbi. Tristique senectus et netus et malesuada fames. Egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla. Etiam tempor orci eu lobortis elementum nibh tellus molestie. Turpis massa tincidunt dui ut ornare lectus sit. Purus semper eget duis at tellus at urna condimentum. Mus mauris vitae ultricies leo integer malesuada nunc. A arcu cursus vitae congue mauris rhoncus.</br></br>

	Massa id neque aliquam vestibulum. Ultrices tincidunt arcu non sodales. Orci eu lobortis elementum nibh tellus molestie. Mattis ullamcorper velit sed ullamcorper morbi tincidunt ornare. Scelerisque fermentum dui faucibus in ornare quam. Diam vel quam elementum pulvinar etiam non quam. Vitae congue mauris rhoncus aenean vel elit. Montes nascetur ridiculus mus mauris vitae ultricies leo integer. In cursus turpis massa tincidunt dui ut ornare lectus. Eget dolor morbi non arcu risus quis varius quam. Est ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Fermentum leo vel orci porta non pulvinar neque. Vel eros donec ac odio tempor orci. Non odio euismod lacinia at quis risus sed vulputate odio. Risus nec feugiat in fermentum posuere urna nec. Tempus quam pellentesque nec nam. Sagittis id consectetur purus ut faucibus pulvinar elementum. Viverra orci sagittis eu volutpat odio. Pellentesque diam volutpat commodo sed. Arcu dui vivamus arcu felis bibendum ut tristique et egestas.	

</div>
<div class="comments" id="comments">
</div>
<div class="input_form" align="center">
	<input id="name" placeholder="name" type="text"></br>
	<input id="email" placeholder="email" type="text"></br>
	<input id="title" placeholder="title" type="text"></br>
	<input id="text" placeholder="text" type="text"></br>
	<input id="send_text" onclick="SendText();" value="Send" type="button"></br>
</div>
<script>

function FindAll()
{
	$.ajax({
	    url: 'controllers/MainController.php',        
	    dataType: 'html',       
	    data: {"func": "find_all"},    
	    success: function(data){   
		     $("#comments").html(data);
	    }
	});
}

function SendText()
{
	if ($.trim($("#name").val()) == "") {
		alert("The name field is not filled in!");
		return;
	}
	if ($.trim($("#email").val()) == "") {
		alert("The email field is not filled in!");
		return;
	}
	if (!validateEmail($.trim($("#email").val()))) {
		alert("Email has an incorrect format!");
		return;
	}
	if ($.trim($("#title").val()) == "") {
		alert("The title field is not filled in!");
		return;
	}
	if ($.trim($("#text").val()) == "") {
		alert("The text field is not filled in!");
		return;
	}
	$.ajax({
	    url: 'controllers/MainController.php',        
	    dataType: 'html',        
	    data: {"func": "send_text","name": $.trim($("#name").val()),"email": $.trim($("#email").val()),"title": $.trim($("#title").val()),"text": $.trim($("#text").val())},    
	    success: function(data){   
		     FindAll();
	    }
	});
}
FindAll();

function validateEmail(email) {
    var re = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    return re.test(String(email).toLowerCase());
 }

</script>

<?php require_once('footer.php');?>