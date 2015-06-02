<?php 
	//Variables
	$name="";
	$text="";
	//Connection
	try
	{
		$myBDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e -> getMessage());
	}
	//Recived
	if(isset($_POST["name"]) && $_POST["name"] != "")
	{
		$name = $_POST["name"];
	}
	if(isset($_POST["text"]) && $_POST["text"] != "")
	{
		$text = $_POST["text"];
	}
?>
<form method="POST" action="layout.php?page=minichat.php">
	<label for="text">Psedo : </label>
	<input type="text" name="name" value='<?php echo $name ?>' />
	<br/>
	<label for="text">Message : </label>
	<input type="text" name="text" />
	<br/>
	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<br/>
<?php


	//Insert
	if ($name != "" && $text!="")
	{
		$selections = $myBDD -> prepare('INSERT INTO minichat(names, texts) VALUES (:name,:texts)');
		$selections->execute(array('name' => $name,'texts'=>$text));
		$selections -> closeCursor();
	}

	//Read
	$selections = $myBDD -> query('SELECT names, texts FROM minichat ORDER BY ids DESC LIMIT 0,10' );

	while ($datas =$selections -> fetch())
	{
		echo '<strong>'.htmlspecialchars($datas['names']).' : </strong><div style="display:inline">'.htmlspecialchars($datas['texts']).'</div><br/>';
	}
	$selections -> closeCursor();
?>