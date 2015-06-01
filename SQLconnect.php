<?php
	try
	{
		$myBDD = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e -> getMessage());
	}
//Request 1
	$allGames = $myBDD -> query('SELECT * FROM jeux_video');
	?>
	<table>
		<tr>
			<td><strong>nom</strong></td>
			<td><strong>console</strong></td>
			<td><strong>commentaires</strong></td>
		</tr>
	<?php
	while ($aGame = $allGames -> fetch())
	{
		?>
		<tr>
			<td><?php echo $aGame['nom']; ?></td>
			<td><?php echo $aGame['console']; ?></td>
			<td><?php echo $aGame['commentaires']; ?></td>
		</tr>
		<?php
	}
	echo '</table>';
	$allGames -> closeCursor();
//END Request 1
//Request 2
	$allGames = $myBDD -> query('SELECT nom, console, prix FROM jeux_video WHERE console="PS2" AND prix < 35 ORDER BY prix DESC LIMIT 0,5 ');
	?>
	<table>
		<tr>
			<td><strong>nom</strong></td>
			<td><strong>console</strong></td>
			<td><strong>prix</strong></td>
		</tr>
	<?php
	while ($aGame = $allGames -> fetch())
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
	$allGames -> closeCursor();
//END Request 2

?>