<?php 
	//Variables
	$id_billet=0;
	$id=0;
	$contents="";
	$author="";
	$date_creation="";
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
	if(isset($_POST["contents"]) && $_POST["contents"] != "")
	{
		$contents = $_POST["contents"];
	}
	if(isset($_POST["author"]) && $_POST["author"] != "")
	{
		$author = $_POST["author"];
	}
	if(isset($_POST["id_billet"]) && $_POST["id_billet"] != "")
	{
		$id_billet=(int)$_POST["id_billet"];
	}

?>
<form method="POST" action="layout.php?page=SQLjoint.php" >
	<label for="author">Author : </label>
	<input type="text" name="author" value='<?php echo $author ?>'/>
	<br/>
	<label for="contents">Message : </label>
	<input type="text" name="contents" value='<?php echo $contents ?>'/>
	<br/>
	<label for="contents">id_billet : </label>
	<input type="text" name="id_billet" value='<?php echo $id_billet ?>'/>
	<br/>
	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<br/>
<?php

	//Insert
	if ($author != "" && $contents!="" && $id_billet>0)
	{
		$selections = $myBDD -> prepare('INSERT INTO comments(id_billet, author, contents, date_creation) VALUES (:id_billet, :author, :contents,NOW())');
		$selections->execute(array('id_billet' => $id_billet,'author'=>$author,'contents'=>$contents));
		$selections -> closeCursor();
	}

	//Read

	if ($id_billet>0)
	{

		$selections = $myBDD -> prepare('
			SELECT b.title, b.author, b.contents, DATE_FORMAT(b.date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_reforme_b, 
					c.author, c.contents, DATE_FORMAT(c.date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_reforme_c
			FROM comments AS c
			INNER JOIN billets AS b
			ON c.id_billet = b.id
			WHERE c.id_billet = :id_billet 
			ORDER BY c.date_creation DESC 
			LIMIT 0,10
		');
		$selections->execute(array('id_billet' => $id_billet));
		while ($datas =$selections -> fetch())
		{
			echo '<h1>Billet : </h1>';
			echo '<h1>'.htmlspecialchars($datas['title']).' : </h1><i>'.$datas['date_reforme_b'].' :  </i><br/>';
			echo '<h1>Comments : </h1>';
			echo '<h2>'.$datas['author'].'</h2><i>'.$datas['date_reforme_c'].' :  </i><div style="display:inline">'.htmlspecialchars($datas['contents']).'</div><br/><br/><br/>';
		}
		$selections -> closeCursor();
	}
	
?>