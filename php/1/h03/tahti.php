<title>Tahti.php</title>

<form method="get"
      action="<?php echo $_SERVER['PHP_SELF']?>">
Tahtien maara:<br><input type="text" name="amount"><br>
<input type="submit" value="Enter" name="nappi">
</form>

<?php
if (!isset($_GET['nappi'])) exit();
printing($_GET['amount']);
?>

<?php
function printing($n)
{
	for ($i = 0; $i < $n; $i++)
	{
	   echo "*";
	}
}
?>
