<?php
require('../model/db.php');
$userid=$_GET["id"];
$connection = new db();
$conobj = $connection->OpenCon();
$data = $connection->getsentnews($conobj, $userid);
$connection->CloseCon($conobj);
$emparray = array();
while ($row = mysqli_fetch_assoc($data)) {
    $emparray[] = $row;
}
echo json_encode($emparray);
