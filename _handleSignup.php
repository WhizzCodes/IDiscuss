<?php
            $showError = "false";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                include 'database/config.php';
                $user_name = $_POST['signupName'];
                $user_email = $_POST['signupEmail'];
                $pass = $_POST['signupPassword'];
                $cpass = $_POST['signupcPassword'];
            
                // Check whether this email exists
                $existSql = "select * from `users` where user_email = '$user_email'";
                $result = mysqli_query($conn, $existSql);
                $numRows = mysqli_num_rows($result);
                if($numRows>0){
                    $showError = "User with this Email already exist";
                }
                else{
                    if($pass == $cpass){
                        $hash = password_hash($pass, PASSWORD_DEFAULT);
                        $token = bin2hex(random_bytes(15));
                        $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_pass`, `token`,`status`,`profilepic`,`timestamp`) VALUES ( '$user_name','$user_email', '$hash','$token' ,'Inactive','UserProfilePic/userdefault.png',current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        
                        if($result){
                            $showAlert = true;                        
                            $to_email = $user_email;
                            $subject = "Email Verification";
                            $body = "Hello $user_name , Please click on this link to Verify Your Email Address - http://localhost/IDiscuss/_handleActivate.php?token=$token";
                            $headers = "From: Online Discussion Forum";

                            if(mail($to_email, $subject, $body, $headers)){
                                header("Location: /IDiscuss/signup.php?signupsuccess=$showError");
                            }
                            else{
                                header("Location: /IDiscuss/signup.php?email=Error sendind in Mail");
                                exit;
                            }

                            header("Location: /IDiscuss/signup.php?signupsuccess=Signup Successful");
                            exit();
                        }
            
                    }
                    else{
                        $showError = "Password and confirm Password does not match"; 
                        
                    }
                }

                header("Location: /IDiscuss/signup.php?signupsuccess=$showError");
            
            }
?>
