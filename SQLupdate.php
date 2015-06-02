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
	$id=0;
	$name="";
	$owner="";
	$console = "";
	$prise = 0;
	$max_player = 0;
	$commentaires ="";

	if(isset($_POST["ID"]) && $_POST["ID"] != "")
	{
		$id = (int)$_POST["ID"];
		if($id<0)
		{
			$prise=0;
		}
	}
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
	
	//UPDATE
	if ($name != "")
	{
		$selections = $myBDD -> prepare('UPDATE jeux_video SET nom=:name, possesseur=:owner, prix=:prise, console=:hardware, nbre_joueurs_max =:max_player ,commentaires=:comment WHERE ID=:id');
		$selections->execute(array('id'=>$id,'name' => $name,'hardware'=>$console,'owner'=>$owner,'prise'=>$prise,'max_player'=>$max_player,'comment'=>$commentaires));
		$selections -> closeCursor();
	}


	//SELECT
	if ($id != 0)
	{
		
		$rep = $myBDD -> prepare('SELECT ID, nom, possesseur, prix, console, nbre_joueurs_max ,commentaires FROM jeux_video WHERE ID=:id');
		$rep->execute(array('id' => $id));

		$get = $rep -> fetch();
		
		$id=$get['ID'];
		$name=$get['nom'];
		$owner=$get['possesseur'];
		$console = $get['console'];
		$prise = $get['prix'];
		$max_player = $get['nbre_joueurs_max'];
		$commentaires = $get['commentaires'];
		$rep -> closeCursor();
		
	}
?>
<form method="POST" action="layout.php?page=SQLupdate.php">
	<label for="ID">Id : </label>
	<input type="number" name="ID" value=<?php echo $id ?> />
	<br/>

	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<br/>
<br/>
<br/>
<form method="POST" action="layout.php?page=SQLupdate.php">
	
	<input type="hidden" name="ID" value=<?php echo $id ?> />
	<br/>
	<label for="name">Nom : </label>
	<input type="text" name="name" value=<?php echo $name ?> />
	<br/>
	<label for="owner">Possesseur : </label>
	<input type="text" name="owner" value=<?php echo $owner ?> />
	<br/>
	<label for="hardware">Console : </label>
	<input type="text" name="hardware" value=<?php echo $console ?> />
	<br/>
	<label for="prise">Prix : </label>
	<input type="number" name="prise" value=<?php echo $prise ?> />
	<br/>
	<label for="max_player">Nombre de joeur max : </label>
	<input type="number" name="max_player" value=<?php echo $max_player ?> />
	<br/>
	<label for="comment">Commentaires : </label>
	<input type="text" name="comment" value=<?php echo $commentaires ?> />
	<br/>
	<label for="submit2">Send : </label>
	<input type="submit" name="submit2" />
</form>