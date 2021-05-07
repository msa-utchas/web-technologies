<?php
session_start();
if (empty($_SESSION["email"])) {
    header("Location: ../control/login.php");
}

require('../control/profileupdatevalidation.php');
require('../control/geteditorinfo.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profilestyle.css">
    <link rel="stylesheet" href="../css/navigationstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />

    <title>Document</title>

    <script src="../js/profileupdatevalidation.js">
        var pass = <?php echo $_SESSION["password"]; ?>
    </script>
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
        <a href="./home.php"  class="link">Main Panel</a>
        <!-- <a href="" class="link">News</a> -->
        <a href="./pendingnews.php" class="link">Pending News</a>
        <!-- <a href="" class="link">Requests</a> -->
        <a href="./profile.php" id="current-panel" class="link">Account Settings</a>
    </div>
    <!-- content -->
    <section id="space-maintain">
    
    <div class="main-container">
        <div class="editor">
            <h1>YOUR PROFILE</h1>
        </div>

        <div class="box">
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">

                <fieldset>
                    <legend>NAME :</legend>
                    <div class="small">
                        <input type="text" name="name" id="name" value="<?php echo $name; ?>" placeholder="Enter your name" />
                        <p class="em"><?php echo $validateName; ?></p>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>EMAIL :</legend>
                    <div class="small">
                        <input type="text" name="email" id="email" value="<?php echo $email; ?>" placeholder="Enter your email address" />
                        <p class="em"><?php echo $validateEmail; ?></p>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>PASSWORD :</legend>
                    <div class="small">
                        <input type="password" name="password" id="password" value="<?php echo $password; ?>" placeholder="Enter at least 8 character password & contains at least one from (a-z), (A-Z), (0-9), (!@#$%^&*) each group" />
                        <p class="em"><?php echo $validPassword; ?></p>
                    </div>
                </fieldset>

                <fieldset>
                    <legend>PHONE :</legend>
                    <div class="small">
                        <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>" placeholder="Enter phone number" />
                        <p class="em"><?php echo $validatePhone; ?></p>
                    </div>
                </fieldset>
        </div>

        <fieldset>
            <legend>Gender:</legend>
            <div class="gender">
                <input type="radio" name="gender" id="male" value="male" <?php if ($gender === "male") {echo "checked";} ?> />
                <p>Male</p>
                <input type="radio" name="gender" id="female" value="female" <?php if ($gender === "female") {echo "checked";} ?> />
                <p> Female</p>
                <input type="radio" name="gender" id="other" value="other" <?php if ($gender === "others") {echo "checked";} ?> />
                <p> Other</p>
            </div>
            <p class="em" id="gem"><?php echo  $genderValidation; ?></p>
        </fieldset>

        <fieldset>
            <legend>Date of birth:</legend>
            <div class="dob">
                <input type="date" id="birthday" name="birthday" value="<?php echo $birthdate; ?>">
                <p class="em" id="date-validation"><?php echo $validDate; ?></p>
            </div>
        </fieldset>

        <fieldset class="fieldset">
            <legend>Address:</legend>
            <div class="box small">
                <input type="text" id="street" name="street" value="<?php echo $street; ?>" placeholder="Enter street" />
                <p class="em"><?php echo $validateStreet; ?></p>

                <input type="text" id="post" name="post" value="<?php echo $post; ?>" placeholder="Enter postal code/ city" />
                <p class="em"><?php echo $validatePost; ?></p>

                <input type="text" list="countrie" id="country" name="country" value="<?php echo $country; ?>" placeholder="Select your country">
                <datalist id="countrie">
                    <option> Bangladesh</option>
                    <option> India</option>
                    <option> England</option>
                    <option> America</option>
                    <option> Canada</option>
                </datalist>
                <p class="em"><?php echo $validateCountry; ?></p>
            </div>
        </fieldset>

        <fieldset>
            <legend>Profile Picture(Optional)</legend>
            <div class="small ppicture">
                <input type="file" id="image" name="image" accept="image/*" value="<?php echo $profile; ?>">
            </div>
        </fieldset>
        <br>

        <div class="box">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder=" Enter password to confirm it's you" />
            <p class="em"><?php echo $validConfirmPassword; ?></p>
        </div>

        <div class="btnupdate">
            <input type="submit" value="update" name="update">
        </div>
        
        
        <fieldset>
            <legend>Delete your account:</legend>
            <div class="btndelete">
                <input  type="submit" value="delete" name="delete">
            </div>
            
        </fieldset>

        
        

        </form>
    </section>
</body>

</html>