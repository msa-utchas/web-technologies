<?php
include_once('../model/db.php');
$connection = new db();
$conobj = $connection->OpenCon();

$news_data = $connection->getNewsWithId($conobj, "news", $n_id);
$connection->CloseCon($conobj);