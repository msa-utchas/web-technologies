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
    <title>Sent News</title>
    <link rel="stylesheet" href="../css/showsentfile.css">
    <link rel="stylesheet" href="../css/topnav.css">
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

    <div id="main-container">

        <div class="item-container">
            <a href="./home.php">Back to Home</a>


        </div>



    </div>


    <script src="..\js\getsentnews.js"></script>
    <script>
        MyAjaxFunc(<?php echo $id ?>);
    </script>



</body>

</html>