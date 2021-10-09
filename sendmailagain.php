<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="​Forgot Password">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Send Verification Mail</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/forgotpassword.css" media="screen">
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
    <meta property="og:title" content="forgotpassword">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php'?>

    <section class="u-clearfix u-section-1" id="carousel_9048">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-1 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-custom-color-1 u-shape u-shape-rectangle u-shape-2"></div>
        <img src="images/aa49e5bbcb321c65e1d4ba4d4afa599b2.png" alt="" class="u-image u-image-default u-opacity u-opacity-55 u-image-1" data-image-width="817" data-image-height="799">
        <img src="images/banner11.jpg" alt="" class="u-image u-image-default u-image-2" data-image-width="770" data-image-height="400">
        <div class="u-align-center u-container-style u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-custom-font u-font-pt-sans u-text u-text-1" data-animation-name="zoomIn" data-animation-duration="500" data-animation-delay="0" data-animation-direction=""> Send Verfication Email&nbsp;<br>
            </h1>
            <!-- <p class="u-text u-text-2" data-animation-name="zoomIn" data-animation-duration="750" data-animation-delay="0" data-animation-direction=""> We&nbsp;cannot&nbsp;simply&nbsp;send&nbsp;you option to reset your password&nbsp; A&nbsp;unique&nbsp;link&nbsp;to&nbsp;reset&nbsp;your&nbsp;password&nbsp;is&nbsp;will&nbsp;sent&nbsp;to&nbsp;your&nbsp;email.</p> -->
            <div class="u-align-left u-expanded-width-xs u-form u-form-1">
              <form action="_handlesendmailagain.php" method="POST" >
                <div class="u-form-email u-form-group u-form-group-1">
                  <label for="email-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Email</label>
                  <input type="email" placeholder="Enter a valid email address" id="email-5a14" name="sendmail" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-align-center u-form-group u-form-submit u-form-group-2">
                  <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Send Email<br>
                  </a>
                  <input type="submit" value="submit" class="u-form-control-hidden" wfd-invisible="true">
                </div>
                <!-- <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
                <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true"> -->
              </form>
            </div>
            <?php 
             if(isset($_GET['emailsent'])) {
              if($_GET['emailsent']=="Error sending in Email"){
               echo' <span class="u-text-custom-color-3">'.$_GET['emailsent'].', Please try again later </span>';
              }
              if($_GET['emailsent']=="Email Sent Successfully"){
                echo' <span class="u-text-custom-color-1">'.$_GET['emailsent'].', Please Check your Email Address </span>';
  
                }    
              if($_GET['emailsent']=="No Such Email address is beign registered"){
                echo' <span class="u-text-custom-color-3">'.$_GET['emailsent'].' !!!</span>';
               }
              }
           
            ?>           
              <br>
            <!-- <p class="u-text u-text-3" data-animation-name="zoomIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
              <span class="u-text-custom-color-3">No Registration with this Email Address Found</span> -->
              <br>
            </p>
          </div>
        </div>
      </div>
    </section>
    
    <?php include 'footer.php'?>
    
    
   
  </body>
</html>