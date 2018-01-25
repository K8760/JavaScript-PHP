<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php

include('navbar.php');

require_once('/home/K8760/php/db.php');

$tunnus = isset($_POST['tunnus']) ? $_POST['tunnus'] : '';
    
$stmt = poistaHenkilo($db, $tunnus);
echo "Tietue $tunnus postettiin onnistuneesti";

// 
function poistaHenkilo($db, $tunnus) {
   $sql = <<<SQLEND
   DELETE FROM henkilot WHERE tunnus = :tunnus
SQLEND;

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

?>