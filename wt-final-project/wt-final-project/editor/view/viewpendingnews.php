<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
}
require('../control/viewpendingnewscheck.php');
require('../control/geteditorinfo.php');
require('../control/getreporter.php');

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
    <link rel="stylesheet" href="../css/newsview.css">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/jquery.js"></script>
</head>

<body>
    <div class="dis-property">
        <div class="top-nav">
            <div class="logo ">
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
        <a href="./pendingnews.php" class="link" id="current-panel">Pending News</a>
        <!-- <a href="" class="link">Requests</a> -->
        <a href="./profile.php" class="link">Account Settings</a>
    </div>

    <section id="space-maintain">
        <div class="main-container">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="title">
                    <h4> REPORTER: </h4>
            </div>
            <div class="header-container">
            <div class="pic"><img src=<?php echo $rprofile?> alt="profile image"></div>
                <p id="id"><b>Id: <?php echo $rid ?></b></p>
                <p id="name">Name: <?php echo $rname ?></p>

            </div>

                <div class="title">
                    <h4> TITLE: </h4>
                    <textarea name="title" id="title" rows="2" cols="56"></textarea>
                </div>
                <br>

                <div class="body">
                    <h4> BODY: </h4>
                    <textarea name="body" id="body" rows="15" cols="56"></textarea>
                </div>



                <div class="image">
                    <h4>
                        Pictures
                    </h4>
                    <img id="image" src=""></img>
                    
                </div>

                <div class="small">

                </div>

                <div class="box accept small">
                    <input type="submit" value="accept" name="accept">
                </div>

                <div class="box update small">
                    <input id="view-btn" type="submit" value="update" name="update">
                </div>

                <div class="box reject small">
                    <input type="submit" value="reject" name="reject">
                </div>
                <script src="../js/getnews.js"></script>
                <script>
                    MyAjaxFunc();
                </script>


        </div>

    </section>
</body>

</html>