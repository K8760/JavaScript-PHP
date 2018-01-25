<script>    
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

<style>
    td {border: solid black;}
    table {border-collapse: collapse;}
</style>

<?php
$cities["Helsinki"] = 0;
$cities["Jyvaeskylae"] = 1;
$cities["Tampere"] = 2;
$cities["Rovaniemi"] = 3;
$country="FI";
$polku = '';

echo "<form action = 'saa.php' method='get'>";
echo "<meta charset='UTF-8'>";
foreach($cities as $nimi => $koodi)
{
    if ($koodi == 1)  echo " [ <a href='saa.php?link=$koodi' name='links'> Jyväskylä </a> ]";
    else echo "[ <a href='saa.php?link=$koodi' name='link'> $nimi </a> ]";
}
if(isset($_GET['link']))
{   
    foreach($cities as $nimi => $koodi)
    {
    if ($_GET['link'] == $koodi) 
    {
        $polku = "/data/2.5/weather?APPID=95983d94fe41bc5ebaa8e558b25e915f&q=".$nimi.",".$country."&units=metric&cnt=7&lang=en";
        if ($koodi == 1) echo "<br><br><p style='color:darkblue; font-weight:bold; font-size:18px;'> Sää nyt: Jyväskylä </p> <br>";
        else echo "<br><br><p style='color:darkblue; font-weight:bold; font-size:18px;'> Sää nyt: $nimi </p> <br>";
    }
    }
}
       

//info sivusta////////////////////////////////
$kohde_kone = "api.openweathermap.org";
$kohde_portti = 80;
$kohde_polku = $polku;
//$p = "http://".$kohde_kone.$kohde_polku;
//$json=file_get_contents($p);
//$data=json_decode($json,true);
$pyyntometodi = "GET";
$pyyntorivi = "$pyyntometodi $kohde_polku HTTP/1.1\r\n";
$otsakkeet  = "Host: $kohde_kone\r\n";
$otsakkeet .= "Connection: Close\r\n\r\n";
$http_vastaus = '';
$html_osuus   = FALSE;
/////////////////////////////////////////////


$fp = fsockopen($kohde_kone, $kohde_portti, $errno, $errstr, 30);
if (!$fp) {
   echo "$errstr ($errno)<br />\n";
} else {
   //Lähetetään HTTP-pyyntö ja otsakkeet
   fputs($fp, $pyyntorivi);
   fputs($fp, $otsakkeet);

   // Luetaan ja tulostetaan HTTP-vastaus
    while (!feof($fp)) {
        $http_vastaus .= fgets($fp, 2056);
    }

    fclose($fp);
}

// HTTP-vastaus riveittäin taulukkoon 
$http_vastaus = str_replace("\r", "", $http_vastaus);
$rivit = explode("\n", $http_vastaus);

// Otetaan HTTP-vastauksesta vain data-osan JSON-osuus, joka
// on yhdellä {-merkillä alkavalla rivillä
 
$json = "";
foreach ($rivit as $arvo)
{
    // Ensimmäinen tyhjä rivi erottaa HTTP-otsakkeet data-
    // osasta eli HTML-osuudesta
    if ($arvo == "")
        $html_osuus = TRUE;
  
    if ($html_osuus AND (substr($arvo,0, 1) == "{") )
        $json .= $arvo;
}
 
// JSON_datan jäsentäminen data-taulukkoon
$data=json_decode($json, true);

if(isset($_GET['link']))
{
    echo "<table> <tr><td> Lämpötila </td><td>";
    echo $data['main']['temp']." C </td></tr>";
    echo "<tr><td> Pilvisyys </td><td>";
    echo $data['clouds']['all']." % </td></tr>";
    echo "<tr><td> Tuuli </td><td>";
    echo $data['wind']['speed']." m/s </td></tr></table>";
    echo "Tiedot haettu: <br>";
    echo date("Y.m.d h:i:s");
}
else echo "<br><br><p style='color:red;'> Valitse paikkakunta!</p>";

?>