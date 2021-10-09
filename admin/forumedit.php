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
                        <h1 class="h3 mb-0 text-gray-800">Edit Forum</h1>                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    <br>
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
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <!-- <th>Description</th> -->
                                            <th>Description</th>
                                            <th>Edit</th>
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
                                            $descs=substr($desc, 0,98);
                                            $date=$row['created'];
                                            echo"<tr>
                                            <td>$id</td>
                                            <td>$name</td>
                                            <td>$descs...<a href='adminlogout.php' data-toggle='modal' data-target='#logoutModal$id'>
                                    
                                            View
                                        </a></td>
                                        <td><a href='adminlogout.php' data-toggle='modal' data-target='#editModal$id'>
                                    
                                            Edit
                                        </a></td>
                                            <td>$date</td>
                                            
                                        </tr>";

                                        }
                                        
                                        ?>
                                        
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      

<!-- Logout Modal-->
<?php 
                                        
                                        $sqlat="select * from categories";
                                        $que=mysqli_query($conn,$sqlat);
                                        while ($row = mysqli_fetch_assoc($que)) {
                                            $id=$row['category_id']; 
                                            $name=$row['category_name'];                                           
                                            $desc=$row['category_description'];


echo' <div class="modal fade" id="editModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Forum</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
<form method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Forum Name</label>
                <input type="text" value="'.$name.'" name="fname"  class="form-control" id="exampleFormControlInput1" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" maxlength="242"  name="fdesc" id="exampleFormControlTextarea1" rows="6" required>'.$desc.'</textarea>
            </div>  
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>    
            <button type="submit" name="submit'.$id.'" class="btn btn-primary">Save changes</button>        
        </div>
</form>
    </div>
</div>
</div>';                                                                          
                                        }
                                            ?>
<!-- Logout Modal-->
<?php 
                                        
                                        $sqlat="select * from categories";
                                        $que=mysqli_query($conn,$sqlat);
                                        while ($row = mysqli_fetch_assoc($que)) {
                                            $id=$row['category_id']; 
                                            $name=$row['category_name'];                                           
                                            $desc=$row['category_description'];


echo' <div class="modal fade" id="logoutModal'.$id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">'.$name.' Description</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">'.$desc.'</div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>            
        </div>
    </div>
</div>
</div>';           

if(isset($_POST['submit'.$id.''])){
    $fname=$_POST['fname'];
    $fdesc=$_POST['fdesc'];

    $existSql = "select * from `categories` where category_name = '$fname'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $sql="UPDATE `categories` SET `category_description`='$fdesc' WHERE category_id=$id";
                $query=mysqli_query($conn,$sql);
                if($query){
                    echo"<center>Forum Updated</center><br>";
                }
                else{
                echo"<center>Forum Not Updated</center>";
                }
    }
    else{
        $sql="UPDATE `categories` SET `category_name` = '$fname' ,`category_description`='$fdesc' WHERE category_id=$id";
            $query=mysqli_query($conn,$sql);
            if($query){
                echo"<center>Forum Updated</center><br>";
            }
            else{
            echo"<center>Forum Not Updated</center>";
            }
    }
                  
 }
                                        }

                                      
                                       

                                            ?>

                                            

                    </div>
                    <!-- Content Row -->

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

   
    
