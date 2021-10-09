<?php
include '../database/config.php';
session_start();

if(isset($_GET['adid'])){
    echo $_GET['adid'];
    $adid=$_GET['adid'];
    $updateQuery='UPDATE `admin` SET `ad_picture` = "../AdminProfilePic/userdefault.png" WHERE ad_id='.$adid.'';
    $query=mysqli_query($conn,$updateQuery);
    if($query){
        $_SESSION['adprofilepic']="../AdminProfilePic/userdefault.png";
        header("Location: /IDiscuss/admin/adminprofile.php");
     }
  }
    
?>