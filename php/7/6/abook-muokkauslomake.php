<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php
include('navbar.php');

require_once('/home/K8760/php/db.php');

$tunnus = isset($_GET['tunnus']) ? $_GET['tunnus'] : '';
    
$stmt = haeRSS($db, $tunnus);
sqlResult2Html($stmt);

// 
function haeRSS($db, $tunnus) {
   $sql = <<<SQLEND
   SELECT tunnus, url, tilatieto
   FROM rss WHERE tunnus = :tunnus
SQLEND;

   $stmt = $db->prepare($sql);
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}

// SQL-kyselyn tulosjoukko HTML-taulukkoon.
function sqlResult2Html($stmt) {

$row = $stmt->fetch(PDO::FETCH_ASSOC);  
    
$forms = <<<endForm
    
<form method='post' action='abook-muokkaa.php'>
<table border='0' cellpadding='5'>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Tunnus</td>
  <td bgcolor='#dddddd'>{$row['tunnus']}<input type='hidden' name='tunnus' value='{$row['tunnus']}'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>URL</td>
  <td bgcolor='#dddddd'><input type='text' name='url' size='30' value='{$row['url']}'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Tilatieto</td>
  <td bgcolor='#dddddd'><input type='text' name='tilatieto' pattern='[0-1]' size='30' value='{$row['tilatieto']}'></td>
</tr>
</table>
<input type='submit' name='action' value='Tallenna muutokset' onclick="javascript: return confirm('Hyväksy muutokset?')">
</form>

<form method='post' action='abook-poista.php'>
<input type='hidden' name='tunnus' value='{$row['tunnus']}'>
<input type='submit' name='action' value='Poista' onclick="javascript: return confirm('Hyväksy poisto?')">
</form>

endForm;

echo $forms;
    
}
?>
