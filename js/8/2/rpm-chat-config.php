<?php
// MIETI MITÄ PITÄÄ MUUTTAA?
error_reporting(E_ALL);
@session_start();

$site_path = realpath(dirname(__FILE__));
define ('__SITE_PATH', $site_path);

define ('__DBCONFIG_PATH', '/home/K8760/php/rpmchat-core');