<?php
include('../control/signincheck.php');

if (isset($_SESSION['email'])) {
    header("location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/signinstyle.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <title>Sign In To newsDAILY</title>
</head>

<body>
    <form action="" method="post">
        <div class="grid-container">
            <div class="style1">
                <h3>news<span>DAILY</span></h3>
            </div>

            <div class="style2">
                <p>EDITOR</p>
            </div>
            <div class="style3">
                <input type="text" name="email" placeholder="Enter your email" />
            </div>
            <div class="style4">
                <input type="password" name="password" placeholder="Enter your password" />
                <p class="text-error"> <?php echo $error; ?></p>
            </div>

            <div class="style5">
                <input id="submit-btn" name="submit" type="submit" value="sign in">
            </div>

            <div id="sign-up-btn"> <a href="./signup.php"> sign up</a></div>

            <div class="style6">
                <!-- <a href="">Forgotten password?</a> -->
            </div>
    </form>

    </div>
</body>

</html>