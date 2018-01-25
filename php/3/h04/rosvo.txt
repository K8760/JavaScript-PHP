<?php
session_start();

echo "<meta charset='UTF-8'>";
if (!isset($_SESSION['saldo'])) $_SESSION['saldo'] = 1000;
if (!isset($_SESSION['panos'])) $_SESSION['panos'] = 100;
if (!isset($_SESSION['luku1'])) $_SESSION['luku1'] = "";
if (!isset($_SESSION['luku2'])) $_SESSION['luku2'] = "";
if (!isset($_SESSION['luku3'])) $_SESSION['luku3'] = "";
if (!isset($_SESSION['error'])) $_SESSION['error'] = "";

$peliteksti = <<<EOD
Voitit: {$_SESSION['voittosumma']} eur <span style=color:red;> {$_SESSION['error']} </span>
<hr>
<img src='{$_SESSION['luku1']}.jpg'>
<img src='{$_SESSION['luku2']}.jpg'>
<img src='{$_SESSION['luku3']}.jpg'>
EOD;

$html_page = <<<EOD2
[ <a href='aseta-panos.php'>Aseta panos </a> ] [ <a href='raha.php'> Lisätä rahaa </a> ] [ <a href='logout.php'> Kirjaidu ulos </a> ] <hr>
Terveluloa {$_SESSION['uid']}! <br><br>
Saldo: {$_SESSION['saldo']} eur <br>
Panos: {$_SESSION['panos']} eur <br>

<form action=pelaa.php method=post>
    <input type=submit name=pelaa value=Pelaa>
</form>
<hr>
$peliteksti

EOD2;

echo $html_page;

?>

