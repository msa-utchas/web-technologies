<?php
require_once('../model/db.php');

$connection = new db();
$conobj = $connection->openCon();
$editordata = $connection->getEditorData($conobj, "editor", $_SESSION["email"]);
$connection->closeCon($conobj);

$id = "";
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
$doj = "";

if ($editordata->num_rows > "0") {
    while ($row = $editordata->fetch_assoc()) {
        $id= $row['id'];
        $name = $row["name"];
        $email = $row["email"];
        $password = $row["password"];
        $gender = $row["gender"];
        $birthdate = $row["dob"];
        $phone = $row["phone"];

        $address = $row["address"];
        $add = explode('|', $address);
        $street = $add[0];
        $post = $add[1];
        $country = $add[2];
        
        $profile = $row["image"];
        $doj=$row["doj"];
    }
}
