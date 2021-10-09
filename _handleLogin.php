<?php
$showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){

   include 'database/config.php';
   $email=$_POST['loginEmail'];
   $pass=$_POST['loginPass'];

   $sql="SELECT * FROM users WHERE user_email='$email' and status = 'Active'";
   $result=mysqli_query($conn,$sql); 
   $numRows=mysqli_num_rows($result);     
      if($numRows==1){
          $row=mysqli_fetch_assoc($result);
                if(password_verify($pass,$row['user_pass'])){
                        session_start();
                        $showError="Login Successful";
                        $_SESSION['loggedin']=true;
                        $_SESSION['sno']=$row['sno'];
                        $_SESSION['useremail']=$email; 
                        $_SESSION['username']=$row['user_name']; 
                        $_SESSION['userprofilepic']=$row['profilepic']; 
                                               
                        // if(isset($_SESSION['url'])) {
                        // $url = $_SESSION['url']; }
                        // else { 
                        // $url = "index.php"; 
                        //   }
                        // header("Location: /Try/$url"); // perform correct redirect.                                                          
                        header("Location: /IDiscuss/index.php?login=$showError");
                        exit;
                }
                else{
                    $showError = "Password Incorrect"; 
                    header("Location: /IDiscuss/login.php?login=$showError");
                }                            
          }
                        $sql1="SELECT * FROM users WHERE user_email='$email' and status = 'Inactive'";
                        $result1=mysqli_query($conn,$sql1); 
                        $numRows1=mysqli_num_rows($result1);     
                        if($numRows1==1){
                                $row=mysqli_fetch_assoc($result);
                                $showError = "Account Inactive";
                                header("Location: /IDiscuss/login.php?login=$showError");
                                        exit;
                                } 
                       
                       $sql2="SELECT * FROM users WHERE user_email='$email'";
                       $result2=mysqli_query($conn,$sql2); 
                       $numRows2=mysqli_num_rows($result2);     
                          if($numRows2==0){
                              $row=mysqli_fetch_assoc($result);
                                    $showError = "Account Does not Exist";
                                    header("Location: /IDiscuss/login.php?login=$showError");
                                            exit;
                                    }      
   }

?>