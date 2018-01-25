<?php

function __autoload($Websivu) {
       require_once 'websivu.class.php';
   }

$munkotisivu = new Websivu("Hieno otsikko", "Joku avainsana");
$munkotisivu->asetaBodyelementinSisalto("bla bla bla bla");
$munkotisivu->naytaSivu();

?>