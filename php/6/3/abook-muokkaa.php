<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php
session_start();
include('navbar.php');

require_once('/home/K8760/php/db.php');

$tunnus = isset($_POST['tunnus']) ? $_POST['tunnus'] : '';

if (isset($_POST['action'])) {
    if ($_SESSION['uid'] != 'admin' && $_SESSION['uid'] != $tunnus) echo "Et voi muokata tiedot!\n";
    else {
        $stmt = muokkaaHenkilo($db, $tunnus);
        echo "Tietue $tunnus muokattu";
    }
}

// 
function muokkaaHenkilo($db, $tunnus) {
   $sql = <<<SQLEND
   UPDATE henkilotpwds SET sukunimi='$_POST[sukunimi]', etunimi='$_POST[etunimi]', osoite='$_POST[osoite]', puhnro='$_POST[puhnro]', email='$_POST[email]' WHERE tunnus = :tunnus
SQLEND;

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

?>