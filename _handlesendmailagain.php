<?php                                       
     if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'database/config.php';
        $send_mail=$_POST['sendmail'];

        $existSql = "select * from `users` where user_email = '$send_mail'";
        $result = mysqli_query($conn, $existSql);
        $numRows = mysqli_num_rows($result);
        if($numRows==1){
        
        $row=mysqli_fetch_assoc($result);
        $name=$row['user_name']; 
        $token=$row['token'];                                              
        $to_email = $send_mail;
        $subject = "Email Verification";
        $body = "Hello $name , Please click on this link to Verify Your Email Address - http://localhost/IDiscuss/_handleActivate.php?token=$token";
            $headers = "From: Online Discussion Forum";
                    
          if(mail($to_email, $subject, $body, $headers)){
                 header("Location: /IDiscuss/sendmailagain.php?emailsent=Email Sent Successfully");
                 exit;                                                    
            }
            else{
                header("Location: /IDiscuss/sendmailagain.php?emailsent=Error sending in Email");
                exit;
            }
        }

        header("Location: /IDiscuss/sendmailagain.php?emailsent=No Such Email address is beign registered");
        exit;
       }                                       
?>
