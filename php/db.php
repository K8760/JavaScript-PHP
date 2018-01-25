<?php
// mysql-pdo-v2.php
try {
    $db = new PDO('mysql:host=mysql.labranet.jamk.fi;dbname=K8760_3;charset=utf8',
                  'K8760', 'Odg0U4dEfidQbLynA9hVA23LFigSSeoK');
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    //$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

} catch(PDOException $ex) {
    echo "ErrMsg to enduser!<hr>\n";
    echo "CatchErrMsg: " . $ex->getMessage() . "<hr>\n";
    //logError($ex->getMessage());
}


?>