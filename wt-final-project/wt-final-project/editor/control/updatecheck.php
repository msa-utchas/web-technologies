<?php
function checkEditorExists($email)
{
    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkEditorExist($conobj, "editor", $email);
    $connection->closeCon($conobj);
    if ($userQuery->num_rows > 0 ) {
        return false;
    } else {
        return true;
    }
}

function updateEditorExists($name, $email, $password, $gender, $dob, $phone, $address, $profile)
{
    $connection = new db();
    $conobj = $connection->OpenCon();
    $editordata = $connection->updateEditorData($conobj, "editor", $_SESSION["email"], $name, $email, $password, $gender, $dob, $phone, $address, $profile);
    $connection->closeCon($conobj);

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: ../view/home.php");
}

function deleteThisEditor()
{
    $connection = new db();
    $conobj = $connection->openCon();
    $editordata = $connection->deleteEditor($conobj, "editor", $_SESSION["email"]);
    $connection->closeCon($conobj);
    header("Location: ./logout.php");
}
