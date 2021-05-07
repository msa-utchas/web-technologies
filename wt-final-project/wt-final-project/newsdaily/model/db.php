<?php
class db
{

    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "newsdb";
        $con = new mysqli($dbhost, $dbuser, $dbpass, $db);

        return $con;
    }

    function CloseCon($con)
    {
        $con->close();
    }

    function get_news($con)
    {
        $result = $con->query("SELECT * FROM  news where status = 'approved' ORDER BY id DESC");
        return $result;
    }
}
