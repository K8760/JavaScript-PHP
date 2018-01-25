<form action = '2.php' method='get'>
    
</form>

<?php

$pal["www.google.fi"] = "Google";
$pal["www.duckduckgo.com"] = "DuckDuckGo";
$pal["www.bing.com"] = "Bing";


echo "<form action = '2.php' method='get'>";
echo "<meta charset='UTF-8'>";
echo "<h1>Metahalupalvelu</h1>";
echo "<input type='text' name='indata'><input type='submit' value='Etsi'><br>";
echo "<select name='ehto'>";
foreach($pal as $p => $koodi)
{
    echo "<option value=$p> $koodi </option>";
}
echo "</select>";
    
if(isset($_GET['ehto']))
{
    //echo "Location: http://" . $_GET['ehto'] . "/search?q=". $_GET['indata'];
    if ($_GET['ehto'] == 'www.duckduckgo.com') header("Location: http://" . $_GET['ehto'] . "/?q=". stripslashes(urlencode($_GET['indata'])));
    else header("Location: http://" . $_GET['ehto'] . "/search?q=". urlencode($_GET['indata']));
    exit;
}
?>