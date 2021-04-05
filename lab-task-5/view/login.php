<?php
include('../control/logincheck.php');

if (isset($_SESSION['email'])) {
    header("location: pageone.php");
}
?>
<!DOCTYPE html>
<html>

<body>

    <h2>Admin Login</h2>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <input type="password" name="password" placeholder="Enter your password">
        <input name="submit" type="submit" value="LOGIN">
    </form>
    <br>
    <?php echo $error; ?>
    <br>
    <br>
    <h3>Dont have an account?</h3>
    <a href="./signup.php"> sign up</a>
</body>

</html>