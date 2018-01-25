<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php
include('navbar.php');
echo "<meta charset='UTF-8'>";

require_once('/home/K8760/php/db.php');
$tunnus = isset($_POST['tunnus']) ? $_POST['tunnus'] : '';


$form = <<<endForm
    
<form method='post' action='abook-tyhjalomake.php'>
<table border='0' cellpadding='5'>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Tunnus</td>
  <td bgcolor='#dddddd'><input type='text' name='tunnus' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>URL</td>
  <td bgcolor='#dddddd'><input type='text' name='url' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Tilatieto</td>
  <td bgcolor='#dddddd'><input type='text' name='tilatieto' size='30' pattern='[0-1]'></td>
</tr>
</table>
<input type='submit' name='action' value='Tallenna tiedot' onclick="javascript: return confirm('Hyväksy muutokset?')">
</form>


endForm;

echo $form;



if ($tunnus != '') {
    $stmt = lisataRSS($db);
    echo "Tietue $tunnus lisaty";
}
else echo "Kirjota tiedot!";



// 
function lisataRSS($db) {
   $sql = <<<SQLEND
   INSERT INTO rss VALUES('$_POST[tunnus]','$_POST[url]', '$_POST[tilatieto]')
SQLEND;
   $stmt = $db->prepare($sql);
   $tunnus = $_POST['tunnus'];
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}


?>