<?php
include('../model/db.php');
session_start();

$error = "";
//session data
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $error = "Email or Password is invalid";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkReporter($conobj, "reporter", $email, $password);

    if ($userQuery->num_rows > 0) {
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['password'];
    } else {
      $error = "Email or Password is invalid";
    }
    $connection->closeCon($conobj);
  }
}
