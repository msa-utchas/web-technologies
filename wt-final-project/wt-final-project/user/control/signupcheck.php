<?php
include('../model/db.php');
function checkUserExists($email)
{

    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkUserExist($conobj, "user", $email);
    $connection->closeCon($conobj);
    if ($userQuery->num_rows > 0) {
        return true;
    } else {
        return false;
    }
    
}
function insertUser($name, $email,$password,$gender,$dob,$phone,$address,$profile)
{
    $connection = new db();
    $conobj = $connection->openCon();
    $isInsert = $connection->addUser($conobj, "user", $name, $email,$password,$gender,$dob,$phone,$address,$profile);
    $connection->closeCon($conobj);

    return $isInsert;

}
