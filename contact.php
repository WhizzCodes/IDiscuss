<?php include 'database/config.php' ?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Contact Us">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>contact</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/contact.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="contact">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php'?>
  
    <section class="u-clearfix u-white u-section-1" id="carousel_190c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <img src="images/tytyyty-min.jpg" alt="" class="u-expanded-width-xs u-image u-image-default u-image-1" data-image-width="1620" data-image-height="1080">
        <div class="u-align-center u-container-style u-expanded-width-xs u-group u-white u-group-1">
          <div class="u-container-layout u-valign-top-xs u-container-layout-1">
            <h1 class="u-text u-text-1">Contact Us</h1>
            <div class="u-align-center-sm u-align-center-xs u-align-left-lg u-align-left-md u-align-left-xl u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
              <form action="#" method="POST">
                <div class="u-form-group u-form-name u-form-group-1">
                  <label for="name-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Name</label>
                  <input type="text" placeholder="Enter your Name" id="name-5a14" name="name" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required><br>
                </div>
                <div class="u-form-email u-form-group u-form-group-2">
                  <label for="email-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Email</label>
                  <input type="email" placeholder="Enter a valid email address" id="email-5a14" name="email" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required><br>
                </div>
                <div class="u-form-group u-form-message u-form-group-3">
                  <label for="message-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Message</label>
                  <textarea placeholder="Enter your message" rows="4" cols="50" id="message-5a14" name="message" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required></textarea><br>
                </div>
                <div class="u-align-center u-form-group u-form-submit u-form-group-4">
                  <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Submit</a>
                  <input type="submit" name="submit" value="submit" class="u-form-control-hidden" wfd-invisible="true">
                </div>
                <!-- <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true"> -->
              </form>
              <?php 
if(isset($_POST['submit'])){     
  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];
  $sql = "INSERT INTO `contact_us`(`contactus_name`, `contactus_email`, `contactus_message`, `date_time`) VALUES ('$name','$email','$message',CURRENT_TIMESTAMP)";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo"<center>Your Concern Submitted.</center>";
  }
  else{
    echo"<center>Unsuccefull in Submitting data.</center>";
  }

}

?>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <?php include 'footer.php'?>
    
   
  </body>
</html>