

<?php

if (!isset($_GET['inp'])) $_GET['inp'] = '';
echo "<form method='get' action='1.php'>\n";
echo "<input type='text' name='inp' pattern='^[0-9]{5}(-[0-9]{4})?$'>\n";
echo "<input type='submit' name='nappi' value='GET'><br>\n";
echo $_GET['inp'];
echo "</form>\n";
?>