<?php
include('../model/db.php');
session_start();

$error = "";
if (isset($_POST['submit'])) {
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $error = "Email or Password field is empty";
  } else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $connection = new db();
    $conobj = $connection->openCon();
    $editordata = $connection->checkEditor($conobj, "editor", $email, $password);

    if ($editordata->num_rows > "0") {
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['password'] = $_POST['password'];
      $_SESSION['nid'] ="";
      $_SESSION['rid'] = "";
      while ($row = $editordata->fetch_assoc()) {
        $_SESSION['id']= $row['id'];
      }

    } 
    else {
      $error = "Email or Password is invalid";
    }
    $connection->closeCon($conobj);
  }
} 