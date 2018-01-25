<?php

include('navbar.php');
echo "<meta charset='UTF-8'>";

require_once('/home/K8760/php/db.php');

$fisana = isset($_POST['fisana']) ? $_POST['fisana'] : '';
$sesana = isset($_POST['sesana']) ? $_POST['sesana'] : '';


$form = <<<endForm
    
<form method='post' action='lisata-sana.php'>
<table border='0' cellpadding='5'>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Suomi:</td>
  <td bgcolor='#dddddd'><input type='text' name='fisana' pattern='^[a-zA-ZäöäÄÖÅ]+$' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Ruotsi:</td>
  <td bgcolor='#dddddd'><input type='text' name='sesana' size='30'></td>
</tr>
</table>
<input type='submit' name='action' value='Lisää' onclick="javascript: return confirm('Hyväksy muutokset?')">
</form>


endForm;

echo $form;

$pattern = '/^[a-zA-ZäöäÄÖÅ]+$/';
if (isset($_POST['action'])) {
    $stmt = hae($db, $fisana);
    if (repeat($stmt) == true){
        if (preg_match($pattern, $_POST['fisana'], $matches)) {
            $stmt = lisataSana($db);
            echo "Tietue $fisana - $sesana lisaty";
        }
        else echo "Tiedot voi sisältää vain a-zA-ZäöäÄÖÅ ja ei voi olla tyhjä!";
    }
    else echo "Sana on jo sanakirjassa!";
}


// 
function lisataSana($db) {
   $sql = <<<SQLEND
   INSERT INTO sanakirja VALUES('$_POST[fisana]','$_POST[sesana]')
SQLEND;
   $stmt = $db->prepare($sql);
   $fisana = isset($_POST['fisana']) ? $_POST['fisana'] : '';
   $stmt->bindValue(':fi', "$fisana", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

// 
function hae($db, $fisana) {
   $sql = <<<SQLEND
   SELECT fi
   FROM sanakirja WHERE fi
   LIKE :fisana
SQLEND;

   $stmt = $db->prepare("$sql");
   $stmt->bindValue(':fisana', "%$fisana%", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;
}

function repeat($stmt) {
$row_count = $stmt->rowCount();
if ($row_count != 0) return false;
else return true;
    
}


?>