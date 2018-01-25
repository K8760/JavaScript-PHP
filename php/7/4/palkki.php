<?php
$pituus = $_GET['p'];
 
$im  = ImageCreate($pituus*3,15) or die("Errror");
$fed = ImageColorAllocate($im, 255, 255, 100);
header('Content-Type: image/png');
imagePNG($im);
?>