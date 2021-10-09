<?php
session_start();
include 'Database/config.php';
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updateQuery=" update users set status ='Active' where token='$token'";
    $query=mysqli_query($conn,$updateQuery);
    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']="Account Verified Successfully";
            header('location: /IDiscuss/login.php?activate=Account Activated Successfully');
        }
        else{
            $_SESSION['msg']="You are Logged Out Please Login";
            header('location: /IDiscuss/login.php');
        }
    }
    else{
        $_SESSION['msg']="Account Not Verified";
        header('location: /IDiscuss/login.php');
    }
}
?>