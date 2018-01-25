<style type='text/css'>
tr:nth-child(odd) {background: #f1f1f1}
tr:nth-child(even) {background: #ffffff}
tr:nth-child(1) {background: #ffeedd}
</style>

<?php

include('navbar.php');

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
  <td align='right' bgcolor='#ffeedd'>Sukunimi</td>
  <td bgcolor='#dddddd'><input type='text' name='sukunimi' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Etunimi</td>
  <td bgcolor='#dddddd'><input type='text' name='etunimi' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Osoite</td>
  <td bgcolor='#dddddd'><input type='text' name='osoite' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Puhnro</td>
  <td bgcolor='#dddddd'><input type='text' name='puhnro' size='30'></td>
</tr>
<tr valign='top'>
  <td align='right' bgcolor='#ffeedd'>Email</td>
  <td bgcolor='#dddddd'><input type='text' name='email' size='30'></td>
</tr>
</table>
<input type='submit' name='action' value='Tallenna tiedot' onclick="javascript: return confirm('Hyväksy muutokset?')">
</form>


endForm;

echo $form;


if (isset($_POST['action'])) {
    if ($tunnus != '') {
        $stmt = lisataHenkilo($db);
        echo "Tietue $tunnus lisaty";
    }
    else echo "Kirjota tiedot!";
}


// 
function lisataHenkilo($db) {
   $sql = <<<SQLEND
   INSERT INTO henkilot VALUES('$_POST[tunnus]','$_POST[sukunimi]', '$_POST[etunimi]', '$_POST[osoite]', '$_POST[puhnro]', '$_POST[email]')
SQLEND;
   $stmt = $db->prepare($sql);
   $stmt->bindValue(':tunnus', "$tunnus", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;    
}


?>