<title>PHP-esimerkki: tulosta-tiedot.php</title>
<?php
$ika = 2017 - $_GET['svuosi'];
echo "Terve <strong>{$_GET['kokonimi']}</strong><br>";
echo "Osoitteesi on <strong>{$_GET['osoite']}</strong><p>";
echo "Ikäsi on <strong>$ika</strong><p>";
?>