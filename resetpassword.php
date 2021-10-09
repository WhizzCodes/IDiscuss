<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Reset Password">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>resetpassword</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/resetpassword.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="resetpassword">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">


  <?php include 'header.php'?>


    <section class="u-clearfix u-section-1" id="sec-4eef">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-7 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-custom-color-7 u-shape u-shape-rectangle u-shape-2"></div>
        <img class="u-flip-horizontal u-image u-image-default u-image-1" src="images/4cc5482894f663d659138ba5a4bfb55a136de1c1871a0c45e152585b0b2ad8ee5d2f019303ba8a4cd46b15dfcef53b81b97c56c97e8e8d7db8dc37_1280.jpg" alt="" data-image-width="1280" data-image-height="853">
        <div class="u-align-center u-container-style u-expanded-width-sm u-expanded-width-xs u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-custom-font u-font-pt-sans u-text u-text-1" data-animation-name="zoomIn" data-animation-duration="500" data-animation-delay="0" data-animation-direction=""> Reset Password&nbsp;<br>
            </h1>
            <div class="u-align-left u-expanded-width-xs u-form u-form-1">
              <form action="" method="POST">
                <div class="u-form-group u-form-group-1">
                  <label for="text-d528" class="u-form-control-hidden u-label"></label>
                  <input type="password" placeholder="New Password" id="text-d528" name="npass" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-2">
                  <label for="text-d314" class="u-form-control-hidden u-label"></label>
                  <input type="password" placeholder="Confirm New Password" id="text-d314" name="cpass" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                </div>
                <div class="u-form-group u-form-group-2">
                  <label for="text-d314" class="u-form-control-hidden u-label"></label>
                  <input type="hidden" placeholder="" id="text-d314" name="gettoken" value="<?php echo $_GET['token']?>" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white">
                </div>
                <div class="u-align-center u-form-group u-form-submit u-form-group-3">
                  <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Reset Password<br>
                  </a>
                  <input type="submit" value="submit" class="u-form-control-hidden" wfd-invisible="true">
                </div>
                <!-- <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true"> -->
              </form>
              <?php
                                            if($_SERVER["REQUEST_METHOD"] == "POST"){ 
                                              include 'database/config.php';                                                                                  
                                            $token = $_POST['gettoken'];
                                            $npass = $_POST['npass'];
                                            $cpass = $_POST['cpass'];
                                            // echo $token;
                                            if($npass == $cpass){     

                                              $sql2="SELECT * FROM users WHERE token='$token'";
                                                        $result2=mysqli_query($conn,$sql2); 
                                                        $numRows2=mysqli_num_rows($result2);     
                                                           if($numRows2==0){
                                                               $row=mysqli_fetch_assoc($result2);
                                                               echo '<center><p class="u-text u-text-2" data-animation-name="zoomIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                                               <span class="u-text-custom-color-8">Invalid Token, Please Request For a fresh token again.</span>
                                                               <br></p></center>';                  
                                                              exit;  
                                                        } 

                                                        $hash = password_hash($npass, PASSWORD_DEFAULT);
                                                        $updateQuery=" update users set user_pass ='$hash' where token='$token'";
                                                        $query=mysqli_query($conn,$updateQuery);
                                                        if($query){     
                                                          $token2 = bin2hex(random_bytes(15));
                                                          $updateQuery2=" update users set token ='$token2' where token='$token'";
                                                          $query2=mysqli_query($conn,$updateQuery2);
                                                           echo '<center><p class="u-text u-text-2" data-animation-name="zoomIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                                           <span class="u-text-custom-color-1">Password Reset Successfully</span>
                                                           <br></p></center>';                  
                                                          exit;     
                                                        }
                                                        
            

                                                               
                                                        }
                                                      
                                                    

                                                    else{
                                                       echo' <center><p class="u-text u-text-2" data-animation-name="zoomIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
                                                       <span class="u-text-custom-color-8">Passwords Does Not Match</span>
                                                       <br>
                                                     </p></center>';
                                                      exit;
                                                    }
                                       }                                           
                                    ?>
            </div>
            <!-- <p class="u-text u-text-2" data-animation-name="zoomIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
              <span class="u-text-custom-color-8">Passwords Does not Match</span> -->
              <br>
            </p>
          </div>
        </div>
      </div>
    </section>
    
    <?php include 'footer.php'?>
    
    
   
  </body>
</html>