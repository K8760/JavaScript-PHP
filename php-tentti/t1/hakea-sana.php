<?php

include('navbar.php');
echo "<meta charset='UTF-8'>";

require_once('/home/K8760/php/db.php');

$sana = isset($_POST['sana']) ? $_POST['sana'] : '';

$form = <<<endForm
    
<form method='post' action='hakea-sana.php'>
Etsi sanaa FISE sanakirjasta:
<input type='text' name='sana'>
<input type='submit' name='action' value='Hae!'">
</form>


endForm;

echo $form;

if (isset($_POST['action']))  {
    if ($sana != '') {
        $stmt = haeFI($db, $sana);
        if (is($stmt) == true) {
            $fi = true;
            tulosta($stmt, $fi);
        }
        else {
            $stmt = haeSE($db, $sana);
            $fi = false;
            if (is($stmt) == true) tulosta($stmt, $fi);
            else echo "Ei o tätä sanaa!";
        }
        //$stmt = haeSE($db, $sana);
        //tulosta($stmt);    
    }
    else echo "kirjota sana!";
}

function haeFI($db, $sana) {
   $sql = <<<SQLEND
   SELECT fi, se
   FROM sanakirja WHERE fi
   LIKE :sana
SQLEND;

   $stmt = $db->prepare("$sql");
   $stmt->bindValue(':sana', "%$sana%", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;
}

function haeSE($db, $sana) {
   $sql = <<<SQLEND
   SELECT fi, se
   FROM sanakirja WHERE se
   LIKE :sana
SQLEND;

   $stmt = $db->prepare("$sql");
   $stmt->bindValue(':sana', "%$sana%", PDO::PARAM_STR);
   $stmt->execute();
   return $stmt;
}

function is($stmt) {
    $row_count = $stmt->rowCount();
    if ($row_count != 0) return true;
    else return false;
}

function tulosta($stmt, $fi) {

    $row_count = $stmt->rowCount();
    $col_count  = $stmt->columnCount();

    $output = <<<OUTPUTEND
    <tr bgcolor='#ffeedd'>
    <td>FI</td><td>SE</td>
    </tr>
OUTPUTEND;
    echo $output;
if ($fi == true) {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output = <<<OUTPUTEND
        <tr>
        <td><strong>{$row['fi']}</strong></td><td>{$row['se']}</td>
       </tr>
OUTPUTEND;
        echo $output;
    }
    echo "</table>\n";
}
else {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $output = <<<OUTPUTEND
        <tr>
        <td>{$row['fi']}</td><td><strong>{$row['se']}</strong></td>
       </tr>
OUTPUTEND;
        echo $output;
    }
    echo "</table>\n";
}
    
  
}