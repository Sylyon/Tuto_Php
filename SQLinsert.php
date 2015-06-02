<form method="POST" action="layout.php?page=SQLinsert.php">
	<label for="name">Nom : </label>
	<input type="text" name="name" />
	<br/>
	<label for="name">Possesseur : </label>
	<input type="text" name="owner" />
	<br/>
	<label for="name">Console : </label>
	<input type="text" name="hardware" />
	<br/>
	<label for="name">Prix : </label>
	<input type="number" name="prise" />
	<br/>
	<label for="name">Nombre de joeur max : </label>
	<input type="number" name="max_player" />
	<br/>
	<label for="name">Commentaires : </label>
	<input type="text" name="comment" />
	<br/>
	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<?php
	$name="";
	$owner="NC";
	$console = "NC";
	$prise = 0;
	$max_player = 1;
	$commentaires ="";
	if(isset($_POST["name"]) && $_POST["name"] != "")
	{
		$name = $_POST["name"];
	}
	if(isset($_POST["owner"]) && $_POST["owner"] != "")
	{
		$owner = $_POST["owner"];
	}
	if(isset($_POST["hardware"]) && $_POST["hardware"] != "")
	{
		$console = $_POST["hardware"];
	}
	if(isset($_POST["prise"]) && $_POST["prise"] != "")
	{
		$prise = ((int) $_POST["prise"]);
		if($prise<=0 || $prise>=255)
		{
			$prise=0;
		}
	}
	if(isset($_POST["max_player"]) && $_POST["max_player"] != "")
	{
		$max_player = ((int) $_POST["max_player"]);
		if($max_player<=0 || $max_player>=255)
		{
			$max_player=0;
		}
	}
	if(isset($_POST["comment"]) && $_POST["comment"] != "")
	{
		$commentaires = $_POST["comment"];
	}
	
	//Connection
	try
	{
		$myBDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e -> getMessage());
	}

	//Request

	if ($name != "")
	{
		echo "valid name";
		$selections = $myBDD -> prepare('INSERT INTO jeux_video(ID, nom, possesseur, console, prix, nbre_joueurs_max, commentaires) VALUES ("",:name,:owner,:hardware,:prise,:max_player,:comment)');
		$selections->execute(array('name' => $name,'hardware'=>$console,'owner'=>$owner,'prise'=>$prise,'max_player'=>$max_player,'comment'=>$commentaires));
		$selections -> closeCursor();
	}

	


?>