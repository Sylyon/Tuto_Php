<h1> Welcome on my site </h1>
<?php
	if(isset($_POST["name"]) && $_POST["name"] != "")
	{
		$_SESSION["name"] = $_POST["name"];
		echo "Your connected as : ".$_SESSION["name"];
	}
	if(isset($_POST["cookie"]) && $_POST["cookie"] != "")
	{
		setcookie("name",$_POST["cookie"],time()+60,null,null,false,true);

	}
?>