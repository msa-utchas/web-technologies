<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ../control/login.php");
}
?>
<?php
require('../control/reportinsert.php');
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
    <link rel="stylesheet" href="../css/reportinsert.css">
    <link rel="stylesheet" href="../css/topnav.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />



    <title>Add Report</title>
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



    <div class="news-grid-container">
       

        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">


            <div class="reporter">
                <h4> title: </h4>

            </div>

            <div class="block">


                <textarea name="title" rows="2" cols="56"></textarea>

                <?php echo $validateTitle ?>

            </div>

            <br>

            <div class="reporter">
                <h4> body: </h4>

            </div>

            <div class="block">

                <textarea name="body" rows="15" cols="56"></textarea>
                <?php echo $validateBody ?>


            </div>

            <fieldset>

                <div class="reporter">
                    <h4>
                        <legend> Picture </legend>
                    </h4>

                </div>

                <div class="small">
                    <input type="file" id="image" name="image" accept="image/*" value="<?php echo $image; ?>">
                </div>
            </fieldset>




            <div class="block button-catagory">
                <input type=text list=catagory name="catagory" placeholder="News Catagory">
                <datalist id=catagory>
                    <option> Bangladesh</option>
                    <option> International </option>
                    <option> Business</option>
                    <option> Politics</option>
                    <option> Tech</option>
                    <option> Health </option>
                    <option> Sports </option>
                    <option> Entertainment</option>

                </datalist>
                <p class="em"><?php echo $validateCatagory; ?></p>
            </div>


<input type="hidden" name="rid" value="<?php echo $id ?>">




            <div class="block button-signup">
                <input type="submit" value="Insert" name="Insert">
                <br>
            </div>
        </form>
        <h3><?php echo $success; ?></h3>

     
        <div class="reporter">
            <h3> <a href="./home.php"> Homepage </a></h3>

        </div>

        
        
    </div>






</body>

</html>