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
	if(isset($_GET["id_billet"]) && $_GET["id_billet"] != "")
	{
		$id_billet = (int) $_GET["id_billet"];
	}

?>
<form method="POST" action="layout.php?page=miniblog_comment.php&amp;id_billet=<?php echo $id_billet ?>" >
	<label for="author">Author : </label>
	<input type="text" name="author" value='<?php echo $author ?>'/>
	<br/>
	<label for="contents">Message : </label>
	<input type="text" name="contents" value='<?php echo $contents ?>'/>
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

		$selections = $myBDD -> prepare('SELECT title, author, contents, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_reforme FROM billets WHERE id = :id_billet ORDER BY date_creation DESC LIMIT 0,10' );
		$selections->execute(array('id_billet' => $id_billet));
		$datas =$selections -> fetch();
		echo '<h1>Billet : </h1>';
		echo '<h1>'.htmlspecialchars($datas['title']).' : </h1><h2>'.$datas['author'].'</h2><i>'.$datas['date_reforme'].' :  </i><div style="display:inline">'.htmlspecialchars($datas['contents']).'</div> <br/><br/>';

		$selections -> closeCursor();


		$selections = $myBDD -> prepare('SELECT  author, contents, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_reforme FROM comments WHERE id_billet = :id_billet  ORDER BY date_creation DESC LIMIT 0,10' );
		$selections->execute(array('id_billet' => $id_billet));
		
	
		echo '<h1>Comments : </h1>';
		while ($datas =$selections -> fetch())
		{
			echo '<h2>'.$datas['author'].'</h2><i>'.$datas['date_reforme'].' :  </i><div style="display:inline">'.htmlspecialchars($datas['contents']).'</div><br/>';
		}
		$selections -> closeCursor();
	}
	
?>