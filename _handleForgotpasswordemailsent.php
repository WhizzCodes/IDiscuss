<?php                                       
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'database/config.php';
        $send_mail=$_POST['sendmail'];

        $existSql = "select * from `users` where user_email = '$send_mail'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows==1){
        $token = bin2hex(random_bytes(15));
        $upsql=" update users set token='$token' where user_email='$send_mail'";
        $result2 = mysqli_query($conn, $upsql);

        $row=mysqli_fetch_assoc($result);
        $name=$row['user_name'];                                               
        $to_email = $send_mail;
        $subject = "Password Reset";
        $body = "Hello $name , Please click on this link to Reset Your Password - http://localhost/IDiscuss/resetpassword.php?token=$token";
        $headers = "From: Online Discussion Forum";
                    
          if(mail($to_email, $subject, $body, $headers)){
                 header("Location: /IDiscuss/forgotpassword.php?emailsent=Email Sent Successfully");
                 exit;                                                    
            }
            else{
                header("Location: /IDiscuss/forgotpassword.php?emailsent=Error sending in Email");
                exit;
            }
        }

        header("Location: /IDiscuss/forgotpassword.php?emailsent=No Such Email address is beign registered");
        exit;
       }                                       
?>
