<?php
function checkUserExists($email)
{
    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkUserExist($conobj, "user", $email);
    $connection->closeCon($conobj);
    if ($userQuery->num_rows > 0 ) {
        return false;
    } else {
        return true;
    }
}

function updateUserExists($name, $email, $password, $gender, $dob, $phone, $address, $profile)
{
    $connection = new db();
    $conobj = $connection->OpenCon();
    $editordata = $connection->updateUserData($conobj, "user", $_SESSION["email"], $name, $email, $password, $gender, $dob, $phone, $address, $profile);
    $connection->closeCon($conobj);

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: ../view/home.php");
}

function deleteThisUser()
{
    $connection = new db();
    $conobj = $connection->openCon();
    $userdata = $connection->deleteUser($conobj, "editor", $_SESSION["email"]);
    $connection->closeCon($conobj);
    header("Location: ./logout.php");
}
