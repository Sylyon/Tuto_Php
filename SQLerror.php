<?php
	//Connection
	try
	{
		$myBDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e -> getMessage());
	}

	$reponse = $myBDD->query('SELECT champinconnu FROM jeux_video');

?>