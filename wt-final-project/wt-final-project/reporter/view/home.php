<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ../control/signin.php");
} else {
    $cookie_name = "user";
    $cookie_value = $_SESSION['email'];
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
}
?>

<?php
include('../control/getuserdata.php');

if ($userdata->num_rows > "0") {
    while ($row = $userdata->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $image = $row['image'];
        $doj = $row['doj'];
        
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="stylesheet" href="../css/homestyle.css">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
    

</head>

<body>
    <div class="top-nav">
        <div class="logo item-1">
            <h3>news<span>DAILY</span></h3>
        </div>
        <div class="item-2">
            <p> Reporter Dashboard </p>
        </div>
        <div class="item-3">
            <div class="profile-info">
                <div class="pic-area"><img src="<?php echo $image ?>" alt="profile image"></div>
                <div class="a2">
                    <p class="u-name"><?php echo $name ?></p>
                </div>
                <div class="a3">
                    <p>reporter</p>
                </div>

            </div>
            <div class="btn-logout">
                <a href="../control/logout.php">Sign Out</a>
            </div>
        </div>

    </div>


    <br>
    <br>
    <div class="item-container">

        <a id="pu-btn" href="./profile.php">Profile</a>

        <a class="btn5" href="./report.php">Insert Report</a>

        <a class="btn5" href="./sentnews.php">Show sent news</a>

    </div>


</body>

</html>