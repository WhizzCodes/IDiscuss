<?php
include '../database/config.php';
if(isset($_GET['adminid'])){
    echo $_GET['adminid'];
    $id=$_GET['adminid'];
    $sql="INSERT INTO `ad_delete_requests`(`addr_ad_id`, `addr_ad_status`, `date_time`) VALUES ('$id','Delete Request',current_timestamp())";
    // $sql="DELETE FROM `admin` WHERE ad_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/admindelete.php");
    }
}
?>