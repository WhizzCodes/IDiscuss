<?php
include '../database/config.php';
session_start();
$id=$_SESSION['adsno'];
if($id==$_SESSION['adsno']){

$sqlat1="SELECT `addr_ad_id` FROM `ad_delete_requests` WHERE addr_ad_id=$id";
 $que1=mysqli_query($conn,$sqlat1);
 if($que1){
    echo'<a>Apply for Deletion</a>';                                            
 }
 else{
    echo'<a data-toggle="modal" data-target="#deleteModal'.$id.'"><button type="submit" name="submit" class="btn btn-warning btn-sm">Apply for Deletion</button></a>';                                            

 }
}
?>