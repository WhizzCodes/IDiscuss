<?php
session_start();
if(!isset($_SESSION['user_type']) || !isset($_SESSION['adsno']))
{
    header("Location: /IDiscuss/admin/adminlogin.php");
    return;
}

?>

<?php 
include '../database/config.php';
include('includes/header.php');
include('includes/navbar.php');
?>
<style>

.container {
    max-width: 950px
}

.card {
    border-radius: 1rem;
   
}

img {
    width: 6.2rem;
    border-radius: 5rem;
    margin: 1.3rem auto 1rem auto
}

.col-md-4 {
    padding: 0 0.5rem
}

.card-title {
    font-size: 1rem;
    margin-bottom: 0;
    font-weight: bold;
    font-family: 'IM Fell French Canon SC'
}

.card-text {
    text-align: center;
    padding: 1rem 2rem;
    font-size: 0.8rem;
    color: rgb(82, 81, 81);
    line-height: 1.4rem
}

.footer {
    border-top: none;
    text-align: center;
    line-height: 1.2rem;
    padding: 2rem 0 1.4rem 0;
    font-family: 'Varela Round'
}

#name {
    font-size: 0.8rem;
    font-weight: bold
}

#position {
    font-size: 0.7rem
}

a {
    color: rgb(151, 248, 6);
    font-weight: bold
}

a:hover {
    color: rgb(151, 248, 6)
}
    </style>
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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                       
                        <div class="topbar-divider d-none d-sm-block"></div>

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
                                <a class="dropdown-item" href="adminprofile.php">
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
                                <a class="dropdown-item" href="adminlogout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Select Testemonials</h1>                        
                    </div>

                    <?php 
                    
                    if(isset($_GET['spacefull']))  {
                        if($_GET['spacefull']=="3"){
                            echo'<div>
                            <p class=" mb-0 text-gray-800">3 Testmonials Already Selected</p>                        
                        </div><br>
    ';
                        }
                    }
?>
                    <!-- Content Row -->
                    <div class="row">

                    </div>
                    <!-- Content Row -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Review<th>
                                            <!-- <th>Date</th> -->
                                            <th>View</th>
                                            <th>Select</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Review<th>
                                            <!-- <th>Date</th> -->
                                            <th>View</th>
                                            <th>Select</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                                                                $sqlat="select * from testemonial where status='Applied'";
                                                                                $que=mysqli_query($conn,$sqlat);
                                                                                while ($row = mysqli_fetch_assoc($que)) {
                                                                                    $testemonial_id=$row['testemonial_id'];
                                                                                    $testemonial_user_sno=$row['testemonial_user_sno'];
                                                                                    $testemonial_content=$row['testemonial_content'];
                                                                                    
                                                                                    $dt=$row['date_time'];
                                                                                   
                                                                                    $sqlu="select * from users where sno=$testemonial_user_sno";
                                                                                    $res=mysqli_query($conn,$sqlu);
                                                                                    $row2=mysqli_fetch_assoc($res);
                                                                                    $date=$row['date_time'];
                                                                                echo'<tr>
                                                                                <td>'.$testemonial_id.'</td>
                                                                                <td>'.$row2['user_name'].'</td>
                                                                                <td>'.$testemonial_content.'<td>
                                                                                
                                                                                <td><a data-toggle="modal" data-target="#viewModal'.$testemonial_id.'"><button type="submit" name="submit" class="btn btn-info btn-sm">View</button></a></td> 
                                                                                <td><a href="delad.php?seltid='.$testemonial_id.'"><button type="button" name="select'.$testemonial_id.'" class="btn btn-success btn-sm">Select</button></a></td> 
                                                                                <td><a href="delad.php?deltid='.$testemonial_id.'"><button type="button" name="delete'.$testemonial_id.'"  class="btn btn-danger btn-sm">Delete</button></a></td> 

                                                                                
                                                                            </tr>';
                                                                            echo'   <div class="modal fade" id="viewModal'.$testemonial_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">View Review</h5>
                                                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">×</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body"><br><br><center>
                                                                                    <div class="col-md-4">
                                                                                    <div class="card d-flex mx-auto">
                                                                                        <div class="card-text">
                                                                                            <div class="card-title">'.$testemonial_content.'
                                                                                        <div class="card-image"> <img class="img-fluid d-flex mx-auto" style="border: 5px solid #ffb3cc;"src="../'.$row2['profilepic'].'"> </div>
                                                                        
                                                                                        <div class="footer"> <span id="name">'.$row2['user_name'].'<br></span> <span id="position">'.$row2['designation'].'</span> </div>
                                                                                    </div>
                                                                                </div>
                                                                               
                                                                                    </center>
                                                                                    <br>
                                                                                    <div class="modal-footer">
                                                                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>                                                         
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>';

                                                                        

                                                                                }
                                        
                                        ?>
                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             


    <?php 

include('includes/scripts.php');
include('includes/footer.php');

?>  

   
    
