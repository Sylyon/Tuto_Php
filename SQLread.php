<form method="POST" action="layout.php?page=SQLread.php">
	<label for="name">Console : </label>
	<input type="text" name="hardware" />
	<br/>
	<label for="name">Prix mini : </label>
	<input type="number" name="mini" />
	<br/>
	<label for="name">Prix maxi : </label>
	<input type="number" name="maxi" />
	<br/>
	<label for="submit">Send : </label>
	<input type="submit" name="submit" />
</form>
<?php
	$console = "";
	$mini = 0;
	$maxi = 100;
	if(isset($_POST["hardware"]) && $_POST["hardware"] != "")
	{
		$console = $_POST["hardware"];
	}
	if(isset($_POST["mini"]) && $_POST["mini"] != "")
	{
		$mini = ((int) $_POST["mini"])%100;
	}	
	if(isset($_POST["maxi"]) && $_POST["maxi"] != "")
	{
		$maxi = ((int) $_POST["maxi"])%100;
	}
	
	//Connection
	try
	{
		$myBDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e -> getMessage());
	}
	//Request
	if ($console == "")
	{
		$selections = $myBDD -> prepare('SELECT nom, prix, console FROM jeux_video WHERE prix >= ? AND prix <= ? ORDER BY prix');
		$selections->execute(array($mini,$maxi));
	}
	else
	{
		$selections = $myBDD -> prepare('SELECT nom, prix, console FROM jeux_video WHERE console=:console AND prix >= :prix_mini AND prix <= :prix_maxi ORDER BY prix');
		$selections->execute(array('console' => $console,'prix_mini'=>$mini,'prix_maxi'=>$maxi));
	}

	?>
	<table>
		<tr>
			<td><strong>Nom</strong></td>
			<td><strong>Console</strong></td>
			<td><strong>Prix</strong></td>
		</tr>
	<?php
	while ($aGame = $selections -> fetch())
	{
		?>
		<tr>
			<td><?php echo $aGame['nom']; ?></td>
			<td><?php echo $aGame['console']; ?></td>
			<td><?php echo $aGame['prix']; ?></td>
		</tr>
		<?php
	}
	echo '</table>';
	$selections -> closeCursor();


?>