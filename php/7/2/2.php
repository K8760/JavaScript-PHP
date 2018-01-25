

<?php

if (!isset($_GET['inp'])) $_GET['inp'] = '';
echo "<form method='get' action='2.php'>\n";
echo "<input type='text' name='inp' pattern='^([0-9]{1}|\+358 ?)([0-9]{2}) ?([0-9]{3}) ?([0-9]{3}) ?([0-9]{1})$'>\n";
echo "<input type='submit' name='nappi' value='GET'><br>\n";
echo $_GET['inp'];
echo "</form>\n";
?>