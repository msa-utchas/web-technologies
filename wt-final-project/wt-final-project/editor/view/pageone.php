<?php
session_start();
if (empty($_SESSION["email"])) 
{
    header("Location: ../control/signin.php");
}
else
{
    $cookie_name = "user";
    $cookie_value = $_SESSION['email'];
    setcookie($cookie_name, $cookie_value, time() + (86400), "/"); 
}
?>

<!DOCTYPE html>
<html>
<body>

    <h2>Home</h2>
    <h3> Hi, <?php echo $_SESSION["email"]; ?></h3>
    <h3>WELCOME</h3>

    <a href="./profile.php">PROFILE INFO</a>

    <br />
    <h5>Do you want to <a href="../control/logout.php">logout</a></h5>

</body>
</html>