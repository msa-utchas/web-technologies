<?php
require_once('../model/db.php');

$connection = new db();
$conobj = $connection->openCon();
$editordata = $connection->getReporter($conobj, "reporter", $_SESSION["rid"]);
$connection->closeCon($conobj);

$rid = "";
$rname = "";
$rprofile = "";

if ($editordata->num_rows > "0") {
    while ($row = $editordata->fetch_assoc()) {
        $rid= $row['id'];
        $rname = $row["name"];
        $rprofile = $row["image"];
        
    }
}
