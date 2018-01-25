<title>PHP-esimerkki: tulosta-tiedot2.php</title>

<form method="post"
      action="<?php echo $_SERVER['PHP_SELF']?>">
Nimi:<br><input type="text" name="kokonimi"><br>
Osoite:<br><input type="text" name="osoite"><br>
Svuosi:<br><input type="text" name="svuosi"><br>
<input type="submit" value="Lähetä" name="nappi">
</form>

<?php
if (!isset($_POST['nappi'])) exit();
$ika = 2017 - $_POST['svuosi'];
echo "Terve <strong>{$_POST['kokonimi']}</strong><br>";
echo "Osoitteesi on <strong>{$_POST['osoite']}</strong><p>";
echo "Ikäsi on <strong>$ika</strong><p>";
?>