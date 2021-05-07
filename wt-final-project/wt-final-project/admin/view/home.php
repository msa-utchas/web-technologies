<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
} else {
    $cookie_name = "user";
    $cookie_value = $_SESSION['email'];
    setcookie($cookie_name, $cookie_value, time() + (86400), "/");
}
?>
<?php
require('../controller/getprofiledata.php');
if ($userdata->num_rows > "0") {
    while ($row = $userdata->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
        $gender = $row['gender'];
        $dob = $row['dob'];
        $image =  $row['image'];
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
    <link rel="stylesheet" href="../css/home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/home.css">
    <title>Document</title>
</head>

<body>
    <div class="dis-property">
        <div class="top-nav">
            <div class="logo item-1">
                <h3>news<span>DAILY</span></h3>
            </div>
            <div class="item-2">
                <p>Admin Dashboard</p>
            </div>
            <div class="item-3">
                <div class="profile-info">
                    <div class="pic-area"><img src="<?php echo $image ?>" alt="profile image"></div>
                    <div class="a2">
                        <p class="u-name"><?php echo $name ?></p>
                    </div>
                    <div class="a3">
                        <p>System Admin</p>
                    </div>

                </div>
                <div class="btn-logout">
                    <a href="../controller/logout.php">Sign Out</a>
                </div>
            </div>

        </div>

    </div>
    <div class="nav-left">
        <a href="./home.php" id="dashboard-link" class="link">Dashboard</a>
        <a href="./showAllNews.php" class="link">News</a>
        <a href="./viewActiveAdmin.php" class="link">Admins</a>
        <a href="./viewActiveReporter.php" class="link">Reporters</a>
        <a href="./viewAllUser.php" class="link">Users</a>
        <a href="./viewActiveEditor.php" class="link">Editors</a>
        <a href="./profilesettings.php" class="link">Settings</a>
    </div>
    <section id="sum-info">

        <div class="u-count" id="reporter-req">
            <p>Reporter signup requests</p>
            <a href="./reporterSignupRequest.php">view all</a>
            <br>
            <p id="reporter-req-count">0</p>
        </div>

        <div class="u-count" id="editor-req">
            <p>Editor signup requests</p>
            <a href="./editorSignupRequest.php">view all</a>
            <br>
            <p id="editor-req-count">0</p>
        </div>

        <div class="u-count">
            <p>Total User</p>
            <a href="./viewAllUser.php">view all</a>
            <br>
            <p id="user-count">0</p>
        </div>

        <div class="u-count" id="r-count">
            <p>Total Active Admin</p>
            <a href="./viewActiveAdmin.php">view all</a>
            <br>
            <p id="ac-admin-c">0</p>
        </div>

        <div class="u-count" id="n-count">
            <p>Total News Count</p>
            <a href="./showAllNews.php">view all</a>
            <br>
            <p id="total-news-count">0</p>
        </div>
        <!-- <div class="u-count" id="r-count">
            <p>Total Report Count</p>
            <a href="./viewReport.php">view all</a>
            <br>
            <p id="total-report-count">0</p>
        </div> -->

        <div class="u-count" id="r-count">
            <p>Total Active Editor</p>
            <a href="./viewActiveEditor.php">view all</a>
            <br>
            <p id="ac-editor-count">0</p>
        </div>

        <div class="u-count" id="reporter-count">
            <p>Total Active Reporter</p>
            <a href="./viewActiveReporter.php">view all</a>
            <br>
            <p id="ac-reporter-count">0</p>
        </div>



        <div class="u-count" id="admin-req">

            <p>Admin signup requests</p>
            <a href="./adminSignupRequest.php">view all</a>
            <br>
            <p id="admin-req-count">0</p>
        </div>


    </section>
    <script src="../js/getdatacount.js"></script>
    <script>
        MyAjaxFunc();
    </script>

</body>

</html>