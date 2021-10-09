<?php 
session_start();
if(!isset($_SESSION['user_type']) || !isset($_SESSION['adsno']))
{
    header("Location: /IDiscuss/admin/adminlogin.php");
    return;
}
include '../database/config.php';
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

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Delete Admin</h1> 
            
     
           
        </div>

        <!-- Content Row -->
        <div class="row">

        </div>
        <form action="" method="post">
        <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search Admin by Names.."><br>
        <!-- <input class="btn btn-primary" type="reset" value="Reset"><br><br> -->
        </form>
        <!-- Content Row -->
                 <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Admin Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                       
                                        $sqlat="select * from admin";
                                        $que=mysqli_query($conn,$sqlat);
                                        while ($row = mysqli_fetch_assoc($que)) {
                                            $id=$row['ad_id'];
                                            $name=$row['ad_name'];
                                            $email=$row['ad_email'];
                                            $date=$row['date_time'];
                                            echo'<tr>
                                            <td>'.$id.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$date.'</td>';
                                            if($id==$_SESSION['adsno']){
                                                    echo'<td><a data-toggle="modal" data-target="#deleteModal'.$id.'"><button type="submit" name="submit" class="btn btn-warning btn-sm">Apply for Deletion</button></a></td>';                                        
                                            }
                                            else{
                                            echo'<td><a href="delad.php?adminid='.$id.'"><button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button></a></td> 
                                        </tr>';
                                    }

                                        echo'
                                        <div class="modal fade" id="deleteModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                               aria-hidden="true">
                                               <div class="modal-dialog" role="document">
                                                   <div class="modal-content">
                                                       <div class="modal-header">
                                                           <h5 class="modal-title" id="exampleModalLabel">Resign Confirmation</h5>
                                                           <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                               <span aria-hidden="true">×</span>
                                                           </button>
                                                       </div>
                                                       <div class="modal-body">Are you Sure you want to resign from Admins Post?<br><br>

                                                       </div>
                                                       
                                                       <div class="modal-footer">
                                                           <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                           <a class="btn btn-primary" href="addr.php?adminid='.$id.'">Confirm</a>
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

                    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>



    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>  