<?php
require('../model/db.php');
$con = new db();
$conobj = $con->openCon();
$newsdata = $con->getPendingNewsRequest($conobj, "news");
$con->closeCon($conobj);
$infoarray = array();
while($row = mysqli_fetch_assoc($newsdata))
{
    $infoarray[]=$row;
}
echo json_encode($infoarray);
?>