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
                        <h1 class="h3 mb-0 text-gray-800">Conatct US Inbox</h1>                        
                    </div>

                   
                    <!-- Content Row -->
                    <div class="row">

                    </div>
                    <!-- Content Row -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Inbox</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Message<th>
                                            <!-- <th>Date</th> -->
                                            <th>View</th>
                                            <!-- <th>Select</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Message<th>
                                            <!-- <th>Date</th> -->
                                            <th>View</th>
                                            <!-- <th>Select</th> -->
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                                                                $sqlat="select * from contact_us";
                                                                                $que=mysqli_query($conn,$sqlat);
                                                                                while ($row = mysqli_fetch_assoc($que)) {
                                                                                    $contactus_id=$row['contactus_id'];
                                                                                    $contactus_name=$row['contactus_name'];
                                                                                    $contactus_email=$row['contactus_email'];
                                                                                    $contactus_message=$row['contactus_message'];
                                                                                    
                                                                                    $dt=$row['date_time'];
                                                                                   
                                                                                    
                                                                                echo'<tr>
                                                                                <td>'.$contactus_id.'</td>
                                                                                <td>'.$contactus_name.'</td>
                                                                                <td>'.$contactus_email.'<td>
                                                                                
                                                                                <td><a href="openinbox.php?cin='.$contactus_id.'"><button type="button" class="btn btn-info btn-sm">Open</button></a></td> 

                                                                                <td><a href="delad.php?cinid='.$contactus_id.'"><button type="button" name="delete'.$contactus_id.'"  class="btn btn-danger btn-sm">Delete</button></a></td> 

                                                                                
                                                                            </tr>';
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

   
    
