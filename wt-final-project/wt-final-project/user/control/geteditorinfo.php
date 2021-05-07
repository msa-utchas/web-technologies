<?php
require('../model/db.php');

$connection = new db();
$conobj = $connection->openCon();
$editordata = $connection->getUserData($conobj, "user", $_SESSION["email"]);
$connection->closeCon($conobj);

$name = "";
$email = "";
$password = "";
$confirmPassword = "";
$birthdate = "";
$gender="";
$phone = "";
$address = "";
$street = "";
$post = "";
$country = "";
$add = "";
$profile = "";

if ($editordata->num_rows > "0") {
    while ($row = $editordata->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $gender = $row["gender"];
        $birthdate = $row["dob"];
        $phone = $row["phone"];
        $address = $row["address"];
        $profile = $row["image"];
        $add = explode('|', $address);
        $street = $add[0];
        $post = $add[1];
        $country = $add[2];
    }
}
