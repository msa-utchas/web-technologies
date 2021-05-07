<?php
function checkReporterExists($email)
{
    $connection = new db();
    $conobj = $connection->openCon();
    $userQuery = $connection->checkReporterExist($conobj, "reporter", $email);
    $connection->closeCon($conobj);
    if ($userQuery->num_rows > 0 ) {
        return false;
    } else {
        return true;
    }
}

function updateReporterExists($name, $email, $password, $gender, $dob, $phone, $address, $profile)
{
    $connection = new db();
    $conobj = $connection->OpenCon();
    $reporterdata = $connection->updateReporterData($conobj, "reporter", $_SESSION["email"], $name, $email, $password, $gender, $dob, $phone, $address, $profile);
    $connection->closeCon($conobj);

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    header("Location: ../view/home.php");
}

function deleteThisReporter()
{
    $connection = new db();
    $conobj = $connection->openCon();
    $reporterdata = $connection->deleteReporter($conobj, "reporter", $_SESSION["email"]);
    $connection->closeCon($conobj);
    header("Location: ./logout.php");
}
