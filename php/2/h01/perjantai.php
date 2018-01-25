<?php
$on_vasy = "";
$on_kipu = "";
$pe = "";

if(isset($_GET['vasy'])) 
{
    $on_vasy = "checked";
    echo "<h3>Vasyttaa...</h3>";
}
if(isset($_GET['paakipi']))
{
    $on_kipu = "checked";
    echo "<h3>Tarvitsen laakkeetta</h3>";
}

if(isset($_GET['pe'])) 
{
    $pe = "checked";
    echo "<h3>YEEEEEEEE!!!</h3>";
}

$lomake = <<<EOForm
<form action="perjantai.php" metod="get">
<input type="checkbox" name="vasy" $on_vasy> Vasy <br>
<input type="checkbox" name="paakipi" $on_kipu> Paa kipia <br>
<input type="checkbox" name="pe" $pe> Perjantai <br>
<input type="submit" name="nappi" value="Tulosta tunne!">
</form>
EOForm;

echo $lomake;


?>