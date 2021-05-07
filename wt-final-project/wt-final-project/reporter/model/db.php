<?php

class db
{
    function openCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "newsdb";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db);

        return $con;
    }
    function checkReporter($con, $table, $email, $password)
    {
        //$status = "approved";
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND password='" . $password . "' AND status = 'approved'");
        return $result;
    }
    function checkReporterExist($con, $table, $email)
    {
        $result = $con->query("SELECT * FROM " . $table . " WHERE email='" . $email . "'");
        return $result;
    }

    function addReporter($con, $table, $name, $email, $password, $gender, $dob,$phone,$address,$profile)
    {
        $sql = "INSERT INTO " . $table . " (name, email, password, gender, dob, phone, address, image, status) VALUES ('" . $name . "','" . $email . "','" . $password . "','" . $gender . "','" . $dob . "','" . $phone . "','" . $address . "','" . $profile . "','pending')";
        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function updateReporterData($con,$table,$session_mail,$name, $email, $password, $gender, $dob,$phone,$address,$profile)
    {
        $sql ="UPDATE $table set name = '".$name."', email='".$email."', password='".$password."', gender='".$gender."', dob='".$dob."', phone='".$phone."', address='".$address."', image='".$profile."' where email = '".$session_mail."'";
        echo $sql;
        $result = $con->query($sql);
    }

    function getReporterData($con,$table,$email)
    {
        $result = $con->query("SELECT * FROM  $table where email = '".$email."'");
        return $result;
    }

    function deleteReporter($con,$table,$email)
    {
        $sql ="DELETE  from ".$table." where email = '".$email."'";
        $result = $con->query($sql);
        
    }
    
    function getPendingNewsRequest($con,$table)
    {
        $result = $con->query("SELECT * FROM  $table where status = 'pending'"); 
        return $result;
    }
    function update_news_status($con,$table,$id,$status)
    {
        $sql ="update ".$table." set status = '".$status."' where id = '".$id."'";  //delete
        $result = $con->query($sql);
    }

    function insertNews($con, $table, $title,$body,$image,$catagory,$reid)
    {
        $sql = "INSERT INTO " . $table . " (title,body,images,catagory,rid) VALUES ('" . $title . "','" . $body . "','" . $image . "','" . $catagory . "','" . $reid . "')";
        if ($con->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getsentnews($con, $id)
    {
        $result = $con->query("SELECT * FROM news WHERE rid =" . $id . "");
        return $result;
    }

    function closeCon($con)
    {
        $con->close();
    }
}