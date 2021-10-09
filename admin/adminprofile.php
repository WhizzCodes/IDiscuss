<?php
session_start();
if(!isset($_SESSION['user_type']) || !isset($_SESSION['adsno']))
{
    header("Location: /IDiscuss/admin/adminlogin.php");
    return;
}

?>

<?php 
include('includes/header.php');
include('includes/navbar.php');
?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['adname']?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo $_SESSION['adprofilepic']?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                    <!-- End Topbar Navbar -->
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>                        
                    </div>
                    <!-- End Page Heading -->

                    <!-- Content Row -->
                    <div class="row">
                        
                    <div class="container rounded bg-white mt-5 mb-5">
                        <div class="row">
                            <div class="col-md-3 border-right">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="<?php echo $_SESSION['adprofilepic']?>"><br><span class="font-weight-bold"><?php echo $_SESSION['adname']?></span><span class="text-black-50"><?php echo $_SESSION['ademail']?></span><br><br><br><span><a href="removepic.php?adid=<?php echo $_SESSION['adsno']?>">Remove Profile Picture</a></span></div>
                            </div>
                           
                           
                            <div class="col border-right">
                                <div class="p-3 py-5">
                                <form method="POST" enctype="multipart/form-data">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="text-right">Edit Profile </h4>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12"><label class="labels">Name</label><input type="text" name="aname" class="form-control" placeholder="name" value="<?php echo $_SESSION['adname']?>" required></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels">Email ID</label><input type="text" name="aemail" class="form-control" placeholder="enter email id" value="<?php echo $_SESSION['ademail']?>" required></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12"><label class="labels">Profile Pic</label><input type="file" name="file" class="form-control" value=""></div>
                                        </div>                                    
                                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit" name="submit">Save Profile</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php

include '../database/config.php';
$adid=$_SESSION['adsno'];
 
if(isset($_POST['submit'])){
  
  $aname=$_POST['aname'];
  $aemail=$_POST['aemail'];

  $updateQuery1="UPDATE `admin` SET `ad_name`='$aname', `ad_email`='$aemail' WHERE ad_id=$adid";
  $query1=mysqli_query($conn,$updateQuery1);
  if($query1){
  $_SESSION['adname']=$aname; 
  $_SESSION['ademail']=$aemail; 
  echo("<script>location.href = 'adminprofile.php';</script>");
  }
        // $_SESSION['userprofilepic']=$destinationfile; 
        // header("Location: /IDiscuss/profile.php");              
//   // $uabout=$_POST['uabout'];
  
  $files=$_FILES['file'];
  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];
  
  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $fileextstored= array('jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $destinationfile = '../AdminProfilePic/'.$filename;
    move_uploaded_file($filetmp,$destinationfile);

    $updateQuery="UPDATE `admin` SET `ad_name`='$aname', `ad_email`='$aemail' , `ad_picture` = '$destinationfile' WHERE ad_id=$adid";
    $query=mysqli_query($conn,$updateQuery);

      if($query){
        $_SESSION['adname']=$aname; 
        $_SESSION['ademail']=$aemail; 
        $_SESSION['adprofilepic']=$destinationfile; 
        echo("<script>location.href = 'adminprofile.php';</script>");
        // header("Location: /IDiscuss/admin/adminprofile.php");             
      } 
}
// header("Location: /IDiscuss/admin/adminprofile.php");     

}


      



?>











                    </div>
                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
      
<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>  

   
    
