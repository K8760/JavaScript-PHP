<?php
echo "<meta charset='UTF-8'>";
if (isset($_COOKIE['laskuri'])) {
    $laskuri = $_COOKIE['laskuri'];
    $laskuri++;
} else {
    $laskuri = 1;
}

setcookie ("laskuri", "$laskuri" ,time()+86400);
echo("Olet vieraillut täällä <tt> $laskuri </tt> kertaa!");
?>