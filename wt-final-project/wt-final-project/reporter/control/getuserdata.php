<?php
require_once('../model/db.php');

$connection = new db();
$conobj = $connection->openCon();
$userdata = $connection->getReporterData($conobj, "reporter",$_SESSION["email"]);
$connection->closeCon($conobj);
?>