<?php
require_once('../model/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$userdata = $connection->getPendingNewsRequest($conobj, "news");
$connection->CloseCon($conobj);
$emparray = array();
while ($row = mysqli_fetch_assoc($userdata)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
