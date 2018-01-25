<?php
// mysql-pdo-v1.php
require_once("/home/K8760/db.php");
$stmt = $db->query('SELECT * FROM henkilot');

echo "<table border='1'>\n";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr><td>{$row['sukunimi']}, {$row['etunimi']}</td></tr>\n";
}
echo "</table>\n";
?>