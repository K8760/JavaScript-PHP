<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

<?php

$ur["MTV Sport"] = "https://www.mtv.fi/sport";
$ur["yle.fi/urheilu/"] = "https://yle.fi/urheilu";
$mu["Voice"] = "https://www.voice.fi/musiikki";
$mu["Ylilaita"] = "https://ylilauta.org/musiikki/";
$ki["Suomen evankelis-luterilainen kirkko"] = "https://evl.fi/etusivu";
$ki["Suomen ortodoksinen kirkko"] = "https://ort.fi/";

$harrastus[] = "Urheilu";
$harrastus[] = "Musiikki";
$harrastus[] = "Kirkko";

echo "<form action = 'combo.php' method='get'>";
echo "<meta charset='UTF-8'>";
echo "<select name='ehto[]' multiple metod='get'>";
foreach($harrastus as $nimi)
{
    echo "<option value=$nimi> $nimi </option>";
}
echo "</select>";
echo "<input type='submit' name='nappi' value='Tulosta linkit'> <br>";
    
if(isset($_GET['ehto']))
{
    foreach ($_GET['ehto'] as $option => $value) {
        if ($value == "Urheilu")
        {
            echo "Päivää urheilun ystävä, tässäpä muutama linkki <br>";
            foreach($ur as $nimi => $vkoodi)
            {
                echo "<a href='$vkoodi'> $nimi </a> <br>";
            }
        }
        if ($value == "Musiikki")
        {
            echo "Päivää musiikin ystävä, tässäpä muutama linkki <br>";
            foreach($mu as $nimi => $vkoodi)
            {
                echo "<a href='$vkoodi'> $nimi </a> <br>";
            }
        }
        if ($value == "Kirkko")
        {
            echo "Päivää kirkon ystävä, tässäpä muutama linkki <br>";
            foreach($ki as $nimi => $vkoodi)
            {
                echo "<a href='$vkoodi'> $nimi </a> <br>";
            }
        }
	} 
}
?>
