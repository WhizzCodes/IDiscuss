<?php
session_start();
include 'database/config.php';

if(isset($_POST['submit'])){
  $sno=$_SESSION['sno'];
  echo $sno;
  $uname=$_POST['uname'];
  $uphone=$_POST['uphone'];
  $udesignation=$_POST['udesignation'];
  // $uabout=$_POST['$uabout'];
  $updateQuery1="UPDATE `users` SET `user_name`='$uname',`phone`='$uphone',`designation`='$udesignation',`about`='$uabout' WHERE sno=$sno";
      $query1=mysqli_query($conn,$updateQuery1);
      
        $_SESSION['username']=$uname; 
        $_SESSION['useremail']=$uemail; 
        // $_SESSION['userprofilepic']=$destinationfile; 
        // header("Location: /IDiscuss/profile.php");              
  // $uabout=$_POST['uabout'];
  // $uemail=$_POST['uemail'];
  $files=$_FILES['file'];
  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];
  
  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $fileextstored= array('jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $destinationfile = 'UserProfilePic/'.$filename;
    move_uploaded_file($filetmp,$destinationfile);

      $updateQuery="UPDATE `users` SET `user_name`='$uname',`phone`='$uphone',`designation`='$udesignation',`about`='$uabout',`profilepic`='$destinationfile' WHERE sno=$sno";
      $query=mysqli_query($conn,$updateQuery);

      if($query){
        $_SESSION['username']=$uname; 
        $_SESSION['useremail']=$uemail; 
        $_SESSION['userprofilepic']=$destinationfile; 
        header("Location: /IDiscuss/profile.php");       
      }
      else{
        echo"Update not Saved";
      }  

}
header("Location: /IDiscuss/profile.php"); 

}

      



?>