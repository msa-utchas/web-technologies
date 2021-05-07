<?php
require_once('../model/db.php');

if (isset($_POST['view'])) {

    viewNews();
    
}
if (isset($_POST['accept'])) {

     newsAccept($_SESSION['nid'],$_SESSION['id'],"");
}

if (isset($_POST['update'])) {

    newsUpdate($_SESSION['nid'],$_SESSION['id'],$_REQUEST['title'],$_REQUEST['body'],"updated");
}

if (isset($_POST['reject'])) {

     newsReject($_SESSION['nid'],$_SESSION['id'],"");
    
}

function newsAccept($id, $eid, $remark)
{
    if (isset($_POST['accept'])) {

        $connection = new db();
        $conobj = $connection->OpenCon();
        $editordata = $connection->updateNewsStatus($conobj, "news", $id, $eid, "approved", $remark);
        $connection->closeCon($conobj);
    
        header("Location: ../view/pendingnews.php");
    }
}

function newsUpdate($id, $eid,$title,$body, $remark)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $connection = new db();
        $conobj = $connection->OpenCon();
        $editordata = $connection->updateNewsData($conobj, "news", $id, $title, $body, $eid, "approved", $remark);
        $connection->closeCon($conobj);
    
        header("Location: ../view/pendingnews.php");
    }
}

function newsReject($id, $eid,$remark)
{
    if (isset($_POST['reject'])) {

        $connection = new db();
        $conobj = $connection->OpenCon();
        $editordata = $connection->updateNewsStatus($conobj, "news", $id, $eid, "reject", $remark);
        $connection->closeCon($conobj);
    
        header("Location: ../view/pendingnews.php");
    }
}

function viewNews(){
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
     
        $nid=$_REQUEST["id"];
        $rid=$_REQUEST["rid"];
        session_start();
            $_SESSION['nid']=$nid;
            $_SESSION['rid']=$rid;
            header("Location: ../view/viewpendingnews.php?nid=".$nid);
                
    }
}