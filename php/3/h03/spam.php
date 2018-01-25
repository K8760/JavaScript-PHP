<?php

$har["1"] = array("MTV Sport"=>"https://www.mtv.fi/sport", "yle.fi/urheilu/"=>"https://yle.fi/urheilu");
$har["2"] = array("Voice"=>"https://www.voice.fi/musiikki", "Ylilaita"=>"https://ylilauta.org/musiikki/");
$har["3"] = array("Suomen evankelis-luterilainen kirkko"=>"https://evl.fi/etusivu/", "Suomen ortodoksinen kirkko"=>"https://ort.fi/");
$har["4"] = array("MHalvat kirjat"=>"https://www.booky.fi/", "Top 100"=>"https://www.adlibris.com/fi/kampanja/top100-kirjat/");
$har["5"] = array("Suomen tanssipalvelut"=>"http://tanssi.net/", "Tanssit revontuli"=>"http://www.revontuli.fi/viihde/tanssit/");

if ($_SESSION['nimi'] != "")
{
    echo "Hei <strong>{$_SESSION['nimi']}</strong> tässä muutama linkki, jotka saattavat kiinnostaa sinua: <br>";
    $n = $_SESSION['harrastus'];
    foreach($har[$n] as $nimi => $koodi)
    {
        echo "<a href='$koodi'> $koodi </a> <br>";
    }
}

?>