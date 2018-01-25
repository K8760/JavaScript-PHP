<?php
// evaste-v1.php

if (isset($_COOKIE['laskuri'])) {
   $laskuri = $_COOKIE['laskuri'];
   $laskuri++;
} else {
   $laskuri = 1;
}

setcookie ("laskuri", "$laskuri" ,time()+86400);
echo "Olet vieraillut <tt>$laskuri</tt> kertaa!";
?>