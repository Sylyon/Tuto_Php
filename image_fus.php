<?php
header ("Content-type: image/jpeg"); // L'image que l'on va créer est un jpeg

// On charge d'abord les images
$source = imagecreatefrompng("images/hyperion.png"); // Le logo est la source

$destination = imagecreatefromjpeg("images/sylyon.jpg"); // La photo est la destination

$white = imagecolorallocate($source, 255, 255, 255);
$grey = imagecolorallocate($source, 100, 100, 100);
$black = imagecolorallocate($source, 0, 0, 0);
$yellow = imagecolorallocate($source, 255, 255, 0);
imagecolortransparent($source,$black);

imagestring($destination, 5, 5, imagesy($destination)-15, "Sylyon", $grey);
// Les fonctions imagesx et imagesy renvoient la largeur et la hauteur d'une image
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesy($destination);

//On defini la migniature de notre image source
$source_mini = imagecreatetruecolor($largeur_source/1.5, $hauteur_source/1.5);
$largeur_source_mini = imagesx($source_mini);
$hauteur_source_mini = imagesy($source_mini);
imagecopyresampled($source_mini, $source, 0, 0, 0, 0, $largeur_source_mini, $hauteur_source_mini, $largeur_source, $hauteur_source);

// On veut placer le logo en bas à droite, on calcule les coordonnées où on doit placer le logo sur la photo
$destination_x = $largeur_destination - $largeur_source_mini;
$destination_y =  $hauteur_destination - $hauteur_source_mini;

// On met le logo (source) dans l'image de destination (la photo)
imagecopymerge($destination, $source_mini, $destination_x, $destination_y, 0, 0, $largeur_source_mini, $hauteur_source_mini, 83);

// On affiche l'image de destination qui a été fusionnée avec le logo
imagejpeg($destination);
?>