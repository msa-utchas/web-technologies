<?php
include('../model/db.php');
function chechUserExists($email)
{

    $connection = new db();
    $conobj = $connection->OpenCon();

    $userQuery = $connection->CheckUserexais($conobj, "users", $email, "admin");

    if ($userQuery->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    $connection->CloseCon($conobj);
}
function insertAdmin($name, $email,$password,$gender,$dob)
{
    $connection = new db();
    $conobj = $connection->OpenCon();

    $insertStatus = $connection->addAdmin($conobj, "users", $name, $email,$password,$gender,$dob,"admin");
    return $insertStatus;

}
