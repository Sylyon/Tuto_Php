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
	$delete=0;

	if(isset($_POST["ID"]) && $_POST["ID"] != "")
	{
		$id = (int)$_POST["ID"];
		if($id<0)
		{
			$prise=0;
		}
	}
	if(isset($_POST["delete"]) && $_POST["delete"] != "")
	{
		if ((int)$_POST["delete"] > 0 )
		{
			$delete = (int)$_POST["delete"];
		}
	}
	//SELECT
	if ($id != 0)
	{
		
		$rep = $myBDD -> prepare('SELECT ID, nom, possesseur, prix, console, nbre_joueurs_max ,commentaires FROM jeux_video WHERE ID=:id');
		$rep->execute(array('id' => $id));

		$get = $rep -> fetch();
		
		$id=$get['ID'];

		
		?>
		<table>
			<tr>
				<td><strong>Nom</strong></td>
				<td><strong>Console</strong></td>
				<td><strong>Prix</strong></td>
				<td><strong>Commentaires</strong></td>
			</tr>

			<tr>
				<td><?php echo $get['nom']; ?></td>
				<td><?php echo $get['console']; ?></td>
				<td><?php echo $get['prix']; ?></td>
				<td><?php echo $get['commentaires']; ?></td>
			</tr>
		</table>
		<?php
		$rep -> closeCursor();
	}

	//DELETE
	if($delete >0)
	{

		$rep = $myBDD -> prepare('DELETE FROM jeux_video WHERE ID=:id');
		$rep->execute(array('id' => $delete));	
	}
?>
<form method="POST" action="layout.php?page=SQLdelete.php">
	<label for="ID">Id : </label>
	<input type="number" name="ID" value=<?php echo $id ?> />
	<br/>

	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<form method="POST" action="layout.php?page=SQLdelete.php">
	<input type="hidden" name="delete" value=<?php echo $id ?> />
	<br/>

	<label for="submit">Delete : </label>
	<input type="submit" name="submit" />
</form>
