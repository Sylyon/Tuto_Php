<?php

header('Content-Type: image/png');

$im = imagecreate(192,108);

$gry = imagecolorallocate($im, 135, 135, 135);
$blue = imagecolorallocate($im, 0, 0, 255);
$black = imagecolorallocate($im, 0, 0, 0);

imagestring($im, 3, 0, 90, "coucou", $blue);
imagesetpixel($im, 42, 42, $black);
imageline($im, 12, 12, 15, 23, $blue);
imagecolortransparent($im,$gry);
imagepng($im);
imagedestroy($im);

$im = imagecreate(192,108);

$gry = imagecolorallocate($im, 135, 135, 135);
$blue = imagecolorallocate($im, 0, 0, 255);
$black = imagecolorallocate($im, 0, 0, 0);

imagestring($im, 3, 0, 90, "coucou", $blue);
imagesetpixel($im, 42, 42, $black);
imageline($im, 12, 12, 15, 23, $blue);
imagecolortransparent($im,$gry);
imagepng($im);
imagedestroy($im);



?>
