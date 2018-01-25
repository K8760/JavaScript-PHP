<?php

session_start();

$lexa = isset($_SESSION['n']['Lexa']) ? $_SESSION['n']['Lexa'] : 0;
$olli =isset($_SESSION['n']['Olli']) ? $_SESSION['n']['Olli'] : 0;
$tomi = isset($_SESSION['n']['Tomi']) ? $_SESSION['n']['Tomi'] : 0;
$kripe = isset($_SESSION['n']['Kripe']) ? $_SESSION['n']['Kripe'] : 0;
$plus = isset($_POST['plus']) ? $_POST['plus'] : '';
$minus = isset($_POST['minus']) ? $_POST['minus'] : '';

$a1 = isset($_SESSION['a1']) ? $_SESSION['a1'] : 0;
$a2 = isset($_SESSION['a2']) ? $_SESSION['a2'] : 0;
$a3 = isset($_SESSION['a3']) ? $_SESSION['a3'] : 0;
$a4 = isset($_SESSION['a4']) ? $_SESSION['a4'] : 0;

plus($lexa, $olli, $tomi, $kripe, $plus);
minus($lexa, $olli, $tomi, $kripe, $minus);
aseta($lexa, $olli, $tomi, $kripe);

$form = <<<endForm
    
<form method='post' action='t2.php'>
<table>
    <tr> <td> <input type='submit' name='plus' value='Lexa'></td> <td> <input type='submit' name='minus' value='Lexa'> </td> <td> $lexa </td> <td> <img src='prosenttia_tehty.php?percent=$pr1'> </td> </tr>
    <tr> <td> <input type='submit' name='plus' value='Olli'></td> <td> <input type='submit' name='minus' value='Olli'> </td> <td> $olli </td> <td> <img src='prosenttia_tehty.php?percent=$pr2'> </tr>
    <tr> <td> <input type='submit' name='plus' value='Tomi'></td> <td><input type='submit' name='minus' value='Tomi'> </td> <td> $tomi </td> <td> <img src='prosenttia_tehty.php?percent=$pr3'> </tr>
    <tr> <td> <input type='submit' name='plus' value='Kripe'></td><td> <input type='submit' name='minus' value='Kripe'> </td> <td> $kripe </td> <td> <img src='prosenttia_tehty.php?percent=$pr4'> </tr>
</table>
<input type='text' name='new'><input type='submit' name='add'>
</form>


endForm;
echo $form;

function aseta($lexa, $olli, $tomi, $kripe)
{
    $_SESSION['n']['Lexa'] = $lexa;
    $_SESSION['n']['Olli'] = $olli;
    $_SESSION['n']['Kripe'] = $tomi;
    $_SESSION['n']['Kripe'] = $kripe;
    $_SESSION['a1'] = $a1;
    $_SESSION['a1'] = $a2;
    $_SESSION['a1'] = $a3;
    $_SESSION['a1'] = $a4;
}

function plus(&$lexa, &$olli, &$tomi, &$kripe, $nappi)
{
    if (isset($nappi)) {
       if ($nappi == "Lexa") {
           $lexa++;
           $a1++;
           $pr1 = $lexa * 100 / $a1;
       }
       if ($nappi == "Olli") {
          $olli++;
          $a2++; 
          $pr2 = $olli * 100 / $a2;
       }
        if ($nappi == "Tomi") {
            $tomi++;
            $a3++;
            $pr3 = $tomi * 100 / $a3;
        }
        if ($nappi == "Kripe") {
            $kripe++;
            $a4++;
            $pr4 = $kripe * 100 / $a4;
        }
    }
}

function minus(&$lexa, &$olli, &$tomi, &$kripe, $nappi)
{
    if (isset($nappi)) {
       if ($nappi == "Lexa") {
           $lexa--;
           $a1++;
           $pr1 = $lexa * 100 / $a1;
       }
       if ($nappi == "Olli") {
          $olli--;
           $a2++;
       }
        if ($nappi == "Tomi") {
            $tomi--;
            $a3++;
        }
        if ($nappi == "Kripe") {
            $kripe--;
            $a4++;
        }
    }
}