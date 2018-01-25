<?php

$pal["www.google.fi"] = "Google";
$pal["www.facebook.com"] = "Facebook";
$pal["www.dropbox.com"] = "Dropbox";


echo "<form action = '1.php' method='get'>";
echo "<meta charset='UTF-8'>";
echo "<select name='ehto'>";
foreach($pal as $p => $koodi)
{
    echo "<option value=$p> $koodi </option>";
}
echo "</select>";
echo "<input type='submit' name='nappi' value='Go to'> <br>";
    
if(isset($_GET['ehto']))
{
    header("Location: http://" . $_GET['ehto']);
    exit;
}
?>
