<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>
 
<?php
// abook-listaa.php
echo "<meta charset='UTF-8'>";
include ("navbar.php");

require_once('/home/K8760/php/db.php');
     
$stmt = haeRSS($db);
sqlResult2Html($stmt);
 
function haeRSS($db) {
   $sql = <<<SQLEND
   SELECT tunnus, url, tilatieto
   FROM rss
SQLEND;
 
   $stmt = $db->prepare($sql);
   $stmt->execute();
   return $stmt;    
}
 
// SQL-kyselyn tulosjoukko HTML-taulukkoon.
function sqlResult2Html($stmt) {
 
$row_count = $stmt->rowCount();
$col_count  = $stmt->columnCount();
 
echo "Hakutulokset:" . $row_count. " riviä:<br><br>\n";
echo "<hr>\n";
echo "<table border='0'>\n";  
$output = <<<OUTPUTEND
<tr bgcolor='#ffeedd'>
<td>Tunnus</td><td>URL</td><td>Tilatieto</td>
</tr>
OUTPUTEND;
echo $output;
 
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $output = <<<OUTPUTEND
    <tr>
    <td><a href='abook-muokkauslomake.php?tunnus={$row['tunnus']}'>{$row['tunnus']}</a></td><td>{$row['url']}</td><td>{$row['tilatieto']}</td>
   </tr>
OUTPUTEND;
    echo $output;
}
echo "</table>\n";
}
 
?>