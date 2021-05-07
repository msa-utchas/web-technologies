<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
require('../control/geteditorinfo.php');
require('../control/viewpendingnewscheck.php');
//require('../control/verifynewscheck.php');
?>
<!-- $dob,$image -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/navigationstyle.css">
    <link rel="stylesheet" href="../css/pendingnews.css">
    <title>Document</title>
</head>

<body>
    <div class="dis-property">
        <div class="top-nav">
            <div class="logo item-1">
                <h3>news<span>DAILY</span></h3>
            </div>
            <div class="editor">
                <p>Editor's Panel</p>
            </div>
            <div class="item-3">
                <div class="profile-info">
                    <div class="pic-area"><img src="<?php echo $profile ?>" alt="profile image"></div>
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
        <a href="./home.php" class="link">Main Panel</a>
        <!-- <a href="" class="link">News</a> -->
        <a href="" class="link" id="current-panel">Pending News</a>
        <!-- <a href="" class="link">Requests</a> -->
        <a href="./profile.php" class="link">Account Settings</a>
    </div>

    <section id="space-maintain">
        <div id="main-container">
            <div class="p-container">
                <div>
                    <p>ID </p>
                </div>
                <div>
                    <p>REPORTER</p>
                </div>
                <div>
                    <p>TITLE </p>
                </div>
                <div>
                    <p>CATAGORY</p>
                </div>
                <div>
                    <p>VIEW</p>
                </div>
                
            </div>

            <script src="../js/getpendingnews.js"></script>
            <script>
                MyAjaxFunc();
            </script>
        </div>
    </section>

</body>

</html>