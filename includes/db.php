<?php error_reporting(E_ALL); ini_set('display_errors', 1); ?>


<?php

$db = new Database();
return $db->getConn();