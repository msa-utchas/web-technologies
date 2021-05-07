<?php
include('../model/db.php');
function checkReporterExists($email)
{

    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkReporterExist($conobj, "reporter", $email);

    if ($userQuery->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $connection->closeCon($conobj);
}
function insertReporter($name, $email,$password,$gender,$dob,$phone,$address,$profile)
{
    $connection = new db();
    $conobj = $connection->openCon();
    $isInsert = $connection->addReporter($conobj, "reporter", $name, $email,$password,$gender,$dob,$phone,$address,$profile);
    $connection->closeCon($conobj);

    return $isInsert;

}
