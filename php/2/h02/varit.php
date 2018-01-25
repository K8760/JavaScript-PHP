<?php
$tvari = '';
$kvari = '';
if(isset($_GET['tvari']) && ($_GET['kvari']))
{
    $tvari = $_GET['tvari'];
    $kvari = $_GET['kvari'];
    
}
?>

<style>
    body {background-color: <?php echo $tvari?>;
          color:<?php echo $kvari?>;}
    td {border: solid black;}
    table {border-collapse: collapse;}
</style>


<?php
$taustavarit["Moccasin"] = "#FFE4B5";
$taustavarit["PaleTurquoise"] = "#AFEEEE";
$taustavarit["PaleGreen"] = "#98FB98";
$tekstivarit["Musta"] = "#000000";
$tekstivarit["Navy"] = "#000080";
$tekstivarit["DarkGreen"] = "#006400";
$tekstivarit["DarkRed"] = "#8B0000";

echo "<form action = 'varit.php' method='get'>";

echo "<table> <tr> <td> Taustevari: </td> <td>";
foreach($taustavarit as $nimi => $vkoodi)
{
    $valitu = '';
    if ($tvari == $vkoodi) $valitu = 'checked';
    echo "<input type='radio' name='tvari' value='$vkoodi' $valitu> $nimi <br>";
}
echo "</td> </tr><tr><td>Tekstivari</td><td>";
foreach($tekstivarit as $nimi => $vkoodi)
{
    $valitu = '';
    if ($kvari == $vkoodi) $valitu = 'checked';
    echo "<input type='radio' name='kvari' value='$vkoodi' $valitu> $nimi <br>";
}
echo "</td></tr></table>";
echo "<input type='submit' name='nappi' value='Varita'>";
echo "</form>";
        
?>