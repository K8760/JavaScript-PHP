<?php
session_start();


if (isset($_SESSION['app1_islogged'])) {
    unset($_SESSION['saldo']);
    unset($_SESSION['app1_islogged']);
    session_destroy();
}
 
header("Location: http://" . $_SERVER['HTTP_HOST']
                           . dirname($_SERVER['PHP_SELF']) . '/'
                           . "login.php");
?>