<?php
session_start();
if (!empty($_SESSION["email"])) {
    header("Location: ../control/login.php");
}
require('../control/signupformvalidation.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signupstyle.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet" />

    <title>EDITOR's SIGN UP</title>
    <script src="../js/signupformvalidation.js"></script>
</head>

<body>
    <div class="main-container">
        <div class="logo">
            <h3>news<span>DAILY</span></h3>
        </div>
        <div class="reporter">
            <h1> EDITOR </h1>
        </div>




        <div class="sign-bt">
            <p class="haa">Already have an account?</p>
            <a class="signin" href="./signin.php">sign in</a>
        </div>

        <div class="block">
            <form form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">

                <input type="text" name="name" id="name" placeholder="Enter your username" />
                <p class="em"><?php echo $validateName; ?></p>
        </div>

        <div class="block">
            <input type="text" name="email" id="email" placeholder="Enter your email address" />
            <p class="em"><?php echo $validateEmail; ?></p>
        </div>

        <div class="block">
            <input type="password" name="password" id="password" placeholder="Enter your password" />
            <p class="em"><?php echo $validPassword; ?></p>
        </div>

        <div class="block">
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="confirm your password" />
        </div>

        <fieldset>
            <legend>Gender:</legend>
            <div class="gender">
                <input type="radio" class="gender-input-block" name="gender" id="male" value="male" />
                <p>Male</p>
                <input type="radio" class="gender-inp" name="gender" id="female" value="female" />
                <p> Female</p>
                <input type="radio" class="gender-inp" name="gender" id="other" value="other" />
                <p> Other</p>
            </div>
            <p class="em" id="gem"><?php echo  $genderValidation; ?></p>
        </fieldset>

        <fieldset>
            <legend>Date of birth:</legend>
            <div class="dob">
                <input type="date" id="birthday" name="birthday">
                <p class="em" id="date-validation"><?php echo $validDate; ?></p>
            </div>
        </fieldset>

        <div class="block">
            <input type="text" id="phone" name="phone" placeholder="Enter phone number" />
            <p class="em"><?php echo $validatePhone; ?></p>
        </div>

        <fieldset class="fieldset">
            <legend>Address:</legend>

            <div class="block small">
                <input type="text" name="street" placeholder="Enter area name" />
                <p class="em"><?php echo $validateStreet; ?></p>
            </div>

            <div class="block small">
                <input type="text" name="post" placeholder="Enter post number" />
                <p class="em"><?php echo $validatePost; ?></p>
            </div>

            <div class="block small">
                <input type=text list=country name="country" placeholder="Select your country">
                <datalist id=country>
                    <option> Bangladesh</option>
                    <option> England</option>
                    <option> America</option>
                </datalist>
                <p class="em"><?php echo $validateCountry; ?></p>
            </div>
        </fieldset>

        <fieldset>
            <legend>Profile Picture(Optional)</legend>
            <div class="small">
                <input type="file" id="image" name="image" accept="image/*">
                <!-- <input type="submit" value="Upload" name="submit"> -->
            </div>
        </fieldset>


        <div class="button-signup">
            <input type="submit" value="sign up">
            <h1><?php echo $userAddingvalidation ?></h1>
            </form>
        </div>

        <p id="nameerror"></p>
        <p id="emailerror"></p>
        <p id="passworderror"></p>
        <p id="confirmpassworderror"></p>
        <p id="gendererror"></p>
        <p id="birthdayerror"></p>
        <p id="phoneerror"></p>
        <p id="streeterror"></p>
        <p id="posterror"></p>
        <p id="countryerror"></p>
    </div>

</body>

</html>