<?php

$im = imagecreatetruecolor(1920,1080);
imagepng($im,"images/monImage.png");
imagedestroy($im);
?>
<?php include("layout.php"); ?>