<?php

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
	$selections = $myBDD -> query('SELECT SUM(prix) AS prix_tot, possesseur FROM jeux_video GROUP BY possesseur ORDER BY prix_tot');

	?>
	<table>
		<tr>
			<td><strong>Possesseur</strong></td>
			<td><strong>Prix Total</strong></td>
		</tr>
	<?php
	while ($aGame = $selections -> fetch())
	{
		?>
		<tr>
			<td><?php echo $aGame['possesseur']; ?></td>
			<td><?php echo $aGame['prix_tot']; ?></td>
		</tr>
		<?php
	}
	echo '</table>';
	$selections -> closeCursor();


?>