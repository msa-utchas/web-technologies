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

<?php
$n_id = $_GET['id'];
include('../controller/getNewsWithId.php');
if ($news_data->num_rows > "0") {
    while ($row = $news_data->fetch_assoc()) {
        $nid = $row['id'];
        $ntitle = $row['title'];
        $nbody = $row['body'];
        $nimages = $row['images'];
        $ncategory = $row['catagory'];
        $ndate = $row['date'];
        $nrid =  $row['rid'];
        $neid = $row['eid'];
        $nstatus = $row['status'];
        $nremark = $row['remark'];
    }
}
//$news_data
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
    <link rel="stylesheet" href="../css/viewNews.css">
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
        <a href="./home.php" class="link">Dashboard</a>
        <a href="./showAllNews.php" id="dashboard-link" class="link">News</a>
        <a href="./viewActiveAdmin.php" class="link">Admins</a>
        <a href="./viewActiveReporter.php" class="link">Reporters</a>
        <a href="./viewAllUser.php" class="link">Users</a>
        <a href="./viewActiveEditor.php" class="link">Editors</a>
        <a href="./profilesettings.php" class="link">Settings</a>
    </div>
    <section id="sum-info">
        <div class="news-grid-container">
            <p>News Id :</p>
            <p><?php echo $nid ?></p>
            <p>Reporter Id :</p>
            <p><?php echo $nrid ?></p>
            <p>Editor Id :</p>
            <p><?php echo $neid ?></p>
            <p>News Status :</p>
            <p><?php echo $nstatus ?></p>
            <p>Category :</p>
            <p><?php echo $ncategory ?></p>
            <p>Publish Date :</p>
            <p><?php echo $ndate ?></p>
            <img id="news-img" ; src="<?php echo $nimages ?>" alt="" srcset="">

            <p>News Title :</p>
            <p class="news-title"><?php echo $ntitle ?></p>
            <p>News Body :</p>
            <p class="news-title"><?php echo $nbody ?></p>

            <br></br>
            <a id="btn-goback" href="./showAllNews.php"> go back</a>
            <form action="../controller/verifysignup.php" method="post">
                <input type="hidden" name="id" value="<?php echo $nid ?>">
                <input type="hidden" name="table" value="news">
                <input type="hidden" name="redirect_path" value="../view/showAllNews.php">
                <input id="btn-remove" type="submit" name="remove" value="remove">
            </form>
        </div>

    </section>
</body>

</html>