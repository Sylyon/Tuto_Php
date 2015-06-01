<?php 
	$myfile = fopen('myFile.txt','r+');

	$myline= fgets($myfile);
	if($myline == "")
	{
		$myline=0;
	}
	$myline++;
	fseek($myfile, 0);
	fputs($myfile,$myline);
	fclose($myfile);

	echo "<p>Fichier myFile.txt mise a jours, nombre de co : ".$myline."</p>";
?>