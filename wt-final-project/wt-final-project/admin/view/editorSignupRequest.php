<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ./login.php");
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
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/signupRequest.css">
    <title>Document</title>
</head>

<body>
    <div class="dis-property">
        <div class="top-nav">
            <div class="logo item-1">
                <h3>news<span>DAILY</span></h3>
            </div>
            <div class="item-2">
                <p>Editor Signup Requests</p>
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
    <a href="./home.php" class="link">Dashboard</a>
        <a href="./showAllNews.php" class="link">News</a>
        <a href="./viewActiveAdmin.php" class="link">Admins</a>
        <a href="./viewActiveReporter.php" class="link">Reporters</a>
        <a href="./viewAllUser.php" class="link">Users</a>
        <a href="./viewActiveEditor.php" class="link">Editors</a>
        <a href="./profilesettings.php" class="link">Settings</a>
    </div>
    <section id="sum-info">
        
        <div id="main-container">
            <div class="grid-container-1">
                <div>
                    <p>Id</p>
                </div>
                <div>
                    <p>Name</p>
                </div>
                <div>
                    <p>Email</p>
                </div>
                <div>
                    <p>Gender</p>
                </div>
                <div>
                    <p>Birth date</p>
                </div>
                <div>
                    <p>Actions</p>
                </div>

            </div>

        </div>
    </section>
    <script src="../js/editorSignupRequest.Js"></script>
    <script>
        MyAjaxFunc();
    </script>
</body>

</html>