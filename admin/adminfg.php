<?php    

include '../database/config.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Admin Login</title>
  </head>
  <body>
<div class="container" style="padding:50px">

<center><b>IDiscuss Admin Forgot Password</b><br><br>
<form method="POST">
  <div class="mb-3 col-md-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <?php 
             if(isset($_GET['adexist'])) {           
                echo'<br> <p class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-2">'.$_GET['adexist'].' !!!</p>';          
             }
              ?>     
  <button type="submit" name="submit" class="btn btn-primary">Next</button>
</form>
<br>
</center>
</div>
  

<?php
$showError="false";
if(isset($_POST['submit'])){

    $email=$_POST['email'];

   $sql="SELECT * FROM `admin` WHERE ad_email='$email'";
   $result=mysqli_query($conn,$sql); 
   $numRows=mysqli_num_rows($result);    
   if($numRows==0){
    $showError = "Admin with this Email Address Does not Exist"; 
    header("Location: /IDiscuss/admin/adminfg.php?adexist=$showError");
    exit;
   }
      if($numRows==1){
        while ($row = mysqli_fetch_assoc($result)){ 
        $adid=$row['ad_id'];           
        header("Location: /IDiscuss/admin/adminreset.php?adid=$adid");
        exit;                    
          
        }  
                  
   }
}
?>











    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>