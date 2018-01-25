<?php
session_start();

$err = '';

if (isset($_GET['pelaa']))
{
    if (empty($_GET["panos"])) {
        $err =  "* Value is required!";
    } 
    else if (!is_numeric($_GET["panos"])) $err =  "* Wrong input!";
    else  $_SESSION['panos'] = $_GET['panos'];
    if ($_SESSION['saldo'] - $_SESSION['panos'] >= 0) $_SESSION['error'] = "";
}


$html_page = <<<EOD2
<form action=aseta-panos.php method=get>
    [<a href='rosvo.php'>TAKAISIN</a>] <hr>
    Aseta panos: <input type=text name=panos> <span style=color:red;> $err </span> <br>
    <input type=submit name=pelaa value=Aseta>
</from>
EOD2;

echo $html_page;

?>