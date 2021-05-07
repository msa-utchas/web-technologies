<?php
require('signupcheck.php');

$validateName = "";
$validateEmail = "";
$genderValidation = "";
$validPassword = "";
$validDate = "";
$validatePhone = "";
$validateStreet="";
$validatePost="";
$validateCountry="";

$path="../../resources/profile/";
$profile="";

$userExistsValidation = "";
$userAddingvalidation = "";

$flag = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];
    $confirmPassword = $_REQUEST["confirmPassword"];
    $date = $_REQUEST["birthday"];
    $phone = $_REQUEST["phone"];
    $street = $_REQUEST["street"];
    $post = $_REQUEST["post"];
    $country = $_REQUEST["country"];
    $random = rand();

    if($_FILES["image"]["size"] > 1000)
    {
        $profile= $path.$random.basename($_FILES["image"]["name"]);
        if(file_exists($profile))
        {
            $random = rand();
            $profile= $path.$random.basename($_FILES["image"]["name"]);
        }
        if(move_uploaded_file($_FILES["image"]["tmp_name"], "../../resources/profile/".$random.$_FILES["image"]["name"]))
        {
            echo "Image uploaded successfully";
        }
    }
    else{
        $profile= "../../resources/profile/default.png";
    }
    
    if (empty($name)) {
        $validateName = "Empty name field";
        $flag = 0;
    } elseif(strlen($name) < 5){
        $validateName = "Name must be at least 5 characters";
        $flag = 0;
    } elseif(!preg_match("/^[a-zA-Z-'\. ]*$/", $name)){
        $validateName = "you can only use (a-z), (A-Z), '-', ', '.' at your name";
        $flag = 0;
    } else {
        $validateName = "your name is " . $name;
    }

    if (empty($email)) {
        $validateEmail = "Empty email field";
        $flag = 0;
    }
    elseif(!preg_match("/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/", $email)){
        $validateEmail = "Email can have (a-z), (0-9), (._-) and must have one '@' after that one '.' 2 to 6 index from last";
        $flag = 0;
    } else {
        $validateEmail = "your email is " . $email;
    }

    if (empty($password) || empty($confirmPassword)) {
        $validPassword = "Empty password field.";
        $flag = 0;
    } elseif ($password != $confirmPassword) {
        $validPassword = "password not match";
        $flag = 0;
    } elseif (strlen($password) < 8) {
        $validPassword = "password must contain at least 8 characters";
        $flag = 0;
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/", $password)) {
        $validPassword = "Password must have at least one character from (a-z), (A-Z), (0-9), (!@#$%^&*) each group";
        $flag = 0;
    } else {
        $validPassword = "password correct";
    }

    if (!isset($_REQUEST["gender"])) {
        $genderValidation = "Select your gender";
        $flag = 0;
    } else {
        $gender = $_REQUEST["gender"];
        $genderValidation = "your gender is " . $gender;
    }

    if (empty($date)) {

        $validDate = "Enter your birthdate";
        $flag = 0;
    } else {
        $validDate = "Your  birthdate is " . $date;
    }

    if (empty($phone)) {
        $validatePhone = "Empty phone field";
        $flag = 0;
    } elseif(!preg_match("/^\+?[0-9-]{7,15}$/", $phone)){
        $validatePhone = "(0-9),'-' can use only from this group and + at beginning. Not less than 7 or more than 15 digit";
        $flag = 0;
    } else {
        $validatePhone = "your phone number is " . $phone;
    }

    if (empty($street)) {
        $validateStreet = "Empty street field";
        $flag = 0;
    }
    else if(!preg_match("/^([A-Za-z0-9#]+)([\d\w\-#`.\s',]*)$/", $street)){
        $validateStreet = "you can only use alphanumeric characters and (-#`./,)";
        $flag = 0;
    } else {
        $validateStreet = "your street is " . $street;
    }

    if (empty($post)) {
        $validatePost = "you must enter your phone ";
        $flag = 0;
    } elseif(!preg_match("/^[0-9A-Za-z\-\s,\/]+$/", $post)){
        $validatePost = "you must enter digit(0-9) or (a-z,'-','/')";
        $flag = 0;
    } else {
        $validatePost = "your post/city code is " . $post;
    }

    if (empty($country)) {
        $validateCountry = "Select your country";
        $flag = 0;
    } else {
        $validateCountry = "your country is " . $country;
    }

    if ($flag == 1) {
        if (checkEditorExists($email)) {
            $validateEmail = "Already has an editor with this email";
        } else {
            $address= $street."|".$post."|".$country;
            $flag=insertEditor($name, $email,$password,$gender,$date,$phone,$address,$profile);
            if($flag)
            {
                header("Location: ../view/signin.php");
            }
            else
            {
                $userAddingvalidation="something went wrong. try again later";
            }
        }
    }
}
