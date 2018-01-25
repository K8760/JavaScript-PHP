<meta charset='UTF-8'>
<link type="text/css" rel="stylesheet" href="tyyli.css">
<title>Blogi</title>

<div id='container'>
<?php include("config-navbar.php")?>
<h2>Blogi</h2>
    
<?php

$filenames = array();
    
foreach (glob("$datadir/*.txt") as $filename) {
    $filenames[] = $filename;
}

if (count($filenames) > 0) rsort($filenames);
    
foreach ($filenames as $filename) {
    echo "<div class='merkinta'>\n";
    echo "<a href='blogi-merkinta.php?id=$filename'>$filename</a>\n";
    include("$filename");
    echo "</div>\n";
}
?>
    
    
</div>