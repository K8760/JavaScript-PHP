<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

<?php

$pisteet = 0;
$ens["Hauki on kala"] = 1;
$ens["Hauki on lintu"] = 0;
$ens["Hauki on kissa"] = 0;

$toi["Jyväskylä"] = -2;
$toi["Helsinki"] = 2;
$toi["Turku"] = -2;

$kol["Hirvi"] = 3;
$kol["Kirahvi"] = -3;
$kol["Karhu"] = 3;

$nel["Ruotsi"] = 3;
$nel["Saksa"] = -3;
$nel["Ranska"] = -3;

echo "<form action = 'miljonaari.php' method='get'>";
echo "<meta charset='UTF-8'>";

echo "<strong> Ensimmäinen kysymys:</strong><br>";
foreach($ens as $nimi => $koodi)
{
    echo "<input type='radio' name='eka' value='$koodi'> $nimi <br>";
}

echo "<br><strong> Toinen kysymys: </strong><br>";
echo "Suomen pääkaupunki on...<br>";
echo "<select name='toka' metod='get'>";
foreach($toi as $nimi => $koodi)
{
    echo "<option value=$koodi> $nimi </option>";
}
echo "</select>";

echo "<br><br><strong> Kolmas kysymys:</strong><br>";
echo "Suomessa asuvat...<br>";
foreach($kol as $nimi => $koodi)
{
    echo "<input type='checkbox' name='koka' value='$koodi'> $nimi <br>";
}

echo "<br><strong> Nelijäs kysymys:</strong><br>";
echo "Suomen naapuri-maat ovat...<br>";
foreach($nel as $nimi => $koodi)
{
    echo "<input type='checkbox' name='neka' value='$koodi'> $nimi <br>";
}


echo "<input type='submit' name='nappi' value='Valmis'> <br>";

if(isset($_GET['eka']))
{
    $pisteet = $pisteet + $_GET['eka'];   
}

if(isset($_GET['toka']))
{
    $pisteet = $pisteet + $_GET['toka'];
    
}

if(isset($_GET['koka']))
{
    $pisteet = $pisteet + $_GET['koka'];
    
}

if(isset($_GET['neka']))
{
    $pisteet = $pisteet + $_GET['neka'];
    
}

echo "<br>Sinun pisteet: <strong> $pisteet </strong>";

echo "</form>";

?>

