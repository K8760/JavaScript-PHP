<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php
include('navbar.php');

require_once('/home/K8760/php/db.php');

$tunnus = isset($_POST['tunnus']) ? $_POST['tunnus'] : '';


$stmt = muokkaaRSS($db, $tunnus);
echo "Tietue $tunnus muokattu";


// 
function muokkaaRSS($db, $tunnus) {
   $sql = <<<SQLEND
   UPDATE rss SET url='$_POST[url]', tilatieto='$_POST[tilatieto]' WHERE tunnus = :tunnus
SQLEND;

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

?>