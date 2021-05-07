<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php"); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signuprequest.css">
    <title>Document</title>
</head>

<body>
    <h1>all signup requests</h1>

    <div id="main-container">

    </div>

    <script src="../js/signuprequest.js"></script>
    <script>
        MyAjaxFunc();
    </script>

    <a href="./home.php"> back to home </a>
</body>

</html>