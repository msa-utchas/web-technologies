<?php
require('../model/db.php');
$connection = new db();
$conobj = $connection->OpenCon();
$userdata = $connection->get_news($conobj,);
$connection->CloseCon($conobj);
$emparray = array();
while ($row = mysqli_fetch_assoc($userdata)) {
    $emparray[] = $row;
}
echo json_encode($emparray);