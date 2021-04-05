<?php
class db
{

    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "mydb";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db);

        return $con;
    }
    function CheckUser($con, $table, $email, $password, $type)
    {
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND password='" . $password . "'AND type='" . $type . "'");
        return $result;
    }
    function CheckUserexais($con, $table, $email, $type)
    {
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND type='" . $type . "'");
        return $result;
    }
    
    function addAdmin($con, $table, $name, $email,$password,$gender,$dob,$type)
    {
        $sql = "INSERT INTO ".$table." (name, email, password, gender, dob, type) VALUES ('".$name."','".$email."','".$password."','".$gender."','".$dob."','".$type."')";
        if ($con->query($sql) === TRUE) {
            return true;
          } else {
            return false;
          }
    }


    // function ShowAll($con, $table)
    // {
    //     $result = $con->query("SELECT * FROM  $table");
    //     return $result;
    // }


    function CloseCon($con)
    {
        $con->close();
    }
}
