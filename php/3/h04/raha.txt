<?php
session_start();

echo "<meta charset='UTF-8'>";

$err = '';

if (isset($_GET['pelaa']))
{
    if (empty($_GET["raha"])) {
        $err =  "* Value is required!";
    } 
    else if (!is_numeric($_GET["raha"])) $err =  "* Wrong input!";
    else  $_SESSION['saldo'] = $_SESSION['saldo'] + $_GET['raha'];
    if ($_SESSION['saldo'] - $_SESSION['panos'] >= 0) $_SESSION['error'] = "";
}


$html_page = <<<EOD2
<form action=raha.php method=get>
    [<a href='rosvo.php'>TAKAISIN!</a>] <hr>
    Rahan määrä: <input type=text name=raha> <span style=color:red;> $err </span> <br>
    <input type=submit name=pelaa value=Lisätä>
</from>
EOD2;

echo $html_page;

?>