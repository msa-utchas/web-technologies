<?php
include('../model/db.php');


$error = "";

if (isset($_POST['update'])) {
    if (empty($_POST['firstname']) || empty($_POST['email']) || !isset($_POST['interests'])||empty($_POST['password'])|| empty($_POST['address'])) {
        $error = "input given is invalid";
    } else {
        $connection = new db();
        $conobj = $connection->OpenCon();

        $userQuery = $connection->UpdateUser($conobj, "student", $_SESSION["username"], $_POST['firstname'], $_POST['email'], $_POST['password'], $_POST['address'], $_POST['gender'], $_POST['dob'], $_POST['profession'], $_POST['interests']);
        if ($userQuery == TRUE) {
            echo "update successful";
        } else {
            echo "could not update";
        }
        $connection->CloseCon($conobj);
    }
}
