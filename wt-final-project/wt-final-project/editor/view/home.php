<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
else {
    $cookie_name = "user";
    $cookie_value = $_SESSION['email'];
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
}
require('../control/geteditorinfo.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homestyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/navigationstyle.css">
    <link rel="stylesheet" href="../css/homestyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="dis-property">
        <div class="top-nav">
            <div class="logo">
                <h3>news<span>DAILY</span></h3>
            </div>
            <div class="editor">
                <p>Editor's Panel</p>
            </div>
            <div class="item-3">
                <div class="profile-info">
                    <div class="pic-area"><img src="<?php echo $profile ?>" alt="..\..\resources\profile\default.png"></div>
                    <div class="a2">
                        <p class="u-name"><?php echo $name ?></p>
                    </div>
                    <div class="a3">
                        <p>Editor</p>
                    </div>

                </div>
                <div class="btn-logout">
                    <a href="../control/logout.php">Sign Out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-left">
        <a href="./home.php" id="current-panel" class="link">Main Panel</a>
        <!-- <a href="" class="link">News</a> -->
        <a href="./pendingnews.php" class="link">Pending News</a>
        <!-- <a href="" class="link">Requests</a> -->
        <a href="./profile.php" class="link">Account Settings</a>
    </div>
    <!-- content -->
    <section id="space-maintain">

        <div class="u-count" id="n-count">
            <p>Total News Count</p>
            <br>
            <p id="total-news-count">0</p>
        </div>

        <div class="u-count" id="r-count">
            <p>Total Active Editor</p>
            <br>
            <p id="ac-editor-count">0</p>
        </div>

        <div class="u-count" id="reporter-count">
            <p>Total Active Reporter</p>
            <br>
            <p id="ac-reporter-count">0</p>
        </div>

        <div class="u-count" id="admin-req">
            
            <p>Pending News count</p>
            <a id="view-btn" href="./pendingnews.php">view all</a>
            <br>
            <p id="pendingnews-count">0</p>
        </div>


    </section>
    <script src="../js/getpanelinfo.js"></script>
    <script>
        MyAjaxFunc();
    </script>

</body>

</html>