<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="tyyli.css">
<title>Blogi</title>

<div id='container'>
<?php include("config-navbar.php")?>
<h2>Blogi</h2>
    
<?php

$filename = $_GET['id'];
unlink($filename);
foreach (glob("images/*.*") as $kuva) {
    if (substr($filename, 6, strlen($filename)-4) == substr($kuva, 7, strlen($kuva)-4)) unlink($kuva);
}
unlink($kuva);
echo "Merkintä on poistettu: $filename <br>\n";
?>
    
    
</div>