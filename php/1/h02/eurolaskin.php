<title>Eurolaskin.php</title>

<form method="get"
      action="<?php echo $_SERVER['PHP_SELF']?>">
Euro:<br><input type="text" name="euro"><br>
<input type="submit" value="Count" name="nappi">
</form>

<?php
if (!isset($_GET['nappi'])) exit();
$markka = $_GET['euro'] * 5.94;
echo "Markka <strong>$markka</strong><p>";
?>