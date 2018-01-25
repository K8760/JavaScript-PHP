<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="tyyli.css">
<title>Blogi</title>

<div id='container'>
<?php include("config-navbar.php")?>
<h2>Blogi</h2>
    
<?php

$filename = $_GET['id'];
echo "<div class='merkinta'>\n";
echo "<a href='blogi-poista.php?id=$filename'>Poista</a>\n";
include($filename);
echo "</div>\n";
?>
    
    
</div>