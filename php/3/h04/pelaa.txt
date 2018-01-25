<?php
session_start();

$_SESSION['voittosumma'] = 0; //oletus: ei voittoa

if (isset($_POST['pelaa']))
{
    if ($_SESSION['saldo'] - $_SESSION['panos'] >= 0)
    {
        
        $_SESSION['saldo'] = $_SESSION['saldo'] - $_SESSION['panos'];

        $_SESSION['luku1'] = rand(1,3);
        $_SESSION['luku2'] = rand(1,3);
        $_SESSION['luku3'] = rand(1,3);


        if ($_SESSION['luku1'] == $_SESSION['luku2'] AND $_SESSION['luku1'] == $_SESSION['luku3'])
        {
            $_SESSION['voittosumma'] = $_SESSION['panos'] * 5;
            $_SESSION['saldo'] = $_SESSION['saldo'] + $_SESSION['voittosumma'];
        }
    }
    else $_SESSION['error'] = "Ei riitä rahaa! Lisää rahaa tai vähentä panoksen!";
}




header("Location: https://" . $_SERVER['HTTP_HOST']
                            . dirname($_SERVER['PHP_SELF']) . '/'
                            . "rosvo.php");


?>