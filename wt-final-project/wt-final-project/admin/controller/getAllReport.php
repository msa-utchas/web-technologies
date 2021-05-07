<?php
require('../model/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$data = $connection->getreport($conobj, "reports");
$connection->CloseCon($conobj);
$emparray = array();
while ($row = mysqli_fetch_assoc($data)) {
    $emparray[] = $row;
}
echo json_encode($emparray);