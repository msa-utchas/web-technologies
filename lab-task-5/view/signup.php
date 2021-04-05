<?php
session_start();
if (!empty($_SESSION["email"])) {
    header("Location: ../control/login.php");
}
require('../control/signupformvalidation.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>admin registration page</title>
    <script src="../js//signupvalidation.js"></script>
</head>

<body>
    <h1>admin registration page</h1>
    <form name="signupform" form action="<?php echo $_SERVER["PHP_SELF"]; ?>" onsubmit="return validateForm()"  method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" id="name" /><?php echo $validateName; ?></td>
                <td></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="text" name="email" id="email" /><?php echo $validateEmail; ?></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" id="password"/><?php echo $validPassword; ?></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmPassword" id="confirmPassword"/></td>
            </tr>
        </table>
        Gender:
        <br>
        <input type="radio" name="gender" id="male" value="male" />
        Male
        <input type="radio" name="gender" id="female" value="female" />
        Female
        <input type="radio" name="gender" id="other" value="other" />
        other
        <br>
        <?php echo  $genderValidation; ?>
        <br>
        <br>
        Date of birth:
        <br>
        <input type="date" id="birthday" name="birthday"><?php echo $valiDate; ?>
        <br>
        <br>
        <input type="submit" value="submit">
        <input type="reset" value="reset">
    </form>
    <h1><?php echo $userExistsValidation ?></h1>
    <h1><?php echo $userAddingvalidation ?></h1>
    <a href="./login.php"> back to log in</a>
</body>

</html>