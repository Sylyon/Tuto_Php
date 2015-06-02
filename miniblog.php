<?php 
	//Variables
	$id=0;
	$contents="";
	$author="";
	$title="";
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
	if(isset($_POST["title"]) && $_POST["title"] != "")
	{
		$title = $_POST["title"];
	}

?>
<form method="POST" action="layout.php?page=miniblog.php">
	<label for="title">Title : </label>
	<input type="text" name="title" value='<?php echo $title ?>' />
	<br/>
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
	if ($title != "" && $author!="")
	{
		$selections = $myBDD -> prepare('INSERT INTO billets(title, author, contents, date_creation) VALUES ( :title, :author, :contents,NOW())');
		$selections->execute(array('title' => $title,'author'=>$author,'contents'=>$contents));
		$selections -> closeCursor();
	}

	//Read
	$selections = $myBDD -> query('SELECT id, title, author, contents, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_reforme FROM billets ORDER BY date_creation DESC LIMIT 0,10' );

	while ($datas =$selections -> fetch())
	{
		echo '<h1>'.htmlspecialchars($datas['title']).' : </h1><h2>'.$datas['author'].'</h2><i>'.$datas['date_reforme'].' :  </i><div style="display:inline">'.htmlspecialchars($datas['contents']).'</div> &nbsp; &nbsp; &nbsp;<a href="layout.php?page=miniblog_comment.php&amp;id_billet='.$datas['id'].'">Comment</a><br/>';
	}
	$selections -> closeCursor();
?>