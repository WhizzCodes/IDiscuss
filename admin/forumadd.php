<?php
session_start();
if(!isset($_SESSION['user_type']) || !isset($_SESSION['adsno']))
{
    header("Location: /IDiscuss/admin/adminlogin.php");
    return;
}

?>

<?php 
include('../database/config.php');
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
                        <h1 class="h3 mb-0 text-gray-800">Add Forum</h1>                        
                    </div>
                    <!-- End Page Heading -->

                    <!-- Content Row -->
                    <div class="row">
                      
                    </div>
                    <!-- Content Row -->

                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Admin Table</h6>
                        </div> -->
                        <br>
                        <div class="container">
                            <form method="post">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Forum Name</label>
                                    <input type="text" class="form-control" name="fname" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Forum Description</label>
                                    <textarea class="form-control" maxlength="242" name="desc" rows="3" required></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary" value="Add" name="submit">
                                <br>
                                <br><br>
                            </form>
                        </div>                         
                    </div>

                    <?php 
                     if(isset($_POST['submit'])){
                         $name=$_POST['fname'];
                         $desc=$_POST['desc'];

                         $existSql = "select * from `categories` where category_name = '$name'";
                $result = mysqli_query($conn, $existSql);
                $numRows = mysqli_num_rows($result);
                if($numRows>0){
                        echo "<center>$name Forum already exist</center>";
                }
                else{
                    $sql="INSERT INTO `categories`(`category_name`, `category_description`, `created`) VALUES ('$name','$desc',current_timestamp())";
                         $query=mysqli_query($conn,$sql);
                         if($query){
                             echo"<center>Forum created</center>";
                         }
                         else{
                            echo"<center>Forum Not created</center>";
                         }
                }                               
                     }
                    ?>
                      <br>
 <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search Admin by Names..">
        <br>
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Forum Table</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <!-- <th>Description</th> -->
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <!-- <th>Description</th> -->
                                            <th>Date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        
                                        $sqlat="select * from categories";
                                        $que=mysqli_query($conn,$sqlat);
                                        while ($row = mysqli_fetch_assoc($que)) {
                                            $id=$row['category_id'];
                                            $name=$row['category_name'];
                                            $desc=$row['category_description'];
                                            $descs=substr($desc, 0,100);
                                            $date=$row['created'];
                                            echo"<tr>
                                            <td>$id</td>
                                            <td>$name</td>
                                           
                                    
                                            
                                            <td>$date</td>
                                            
                                        </tr>";

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

   
    
