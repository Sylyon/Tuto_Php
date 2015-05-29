<?php
	header('Content-Transfer-Encoding: binary'); //Transfert en binaire (fichier)
	header('Content-Disposition: attachment; filename="'.$_GET['filename'].'"'); //Nom du fichier
	header('Content-Length: '.$_GET['filesize']); //Taille du fichier

	//Envoi du fichier dont le chemin est passé en paramètre
	readfile('upload/'.$_GET['filename']);
?>