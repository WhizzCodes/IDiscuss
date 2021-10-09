<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Contact Us">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>signup</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/signup.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>

<script>
function relocate_home()
{
     location.href = "signup.php";
} 


</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="signup">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php'?>

  <?php 
             if(isset($_GET['signupsuccess']))  {
                if($_GET['signupsuccess']=="Signup Successful"){
                    echo'<div class="container"><div class="alert alert-success alert-dismissible fade show my-0" role="alert">
                    <strong>'.$_GET['signupsuccess'].' !!!</strong> Please Check Your Email to Verify your Account..
                    <button type="button" class="btn-close" onclick=" relocate_home()" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><div><br>';
                }
            }
           
?>

    <section class="u-clearfix u-section-1" id="carousel_125b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-custom-color-1 u-shape u-shape-rectangle u-shape-1"></div>
        <div class="u-custom-color-1 u-shape u-shape-rectangle u-shape-2"></div>
        <img src="images/aa49e5bbcb321c65e1d4ba4d4afa599b.png" alt="" class="u-image u-image-default u-opacity u-opacity-55 u-image-1" data-image-width="817" data-image-height="799">
        <img src="images/hhh.jpg" alt="" class="u-image u-image-default u-image-2" data-image-width="1200" data-image-height="800" data-animation-name="fadeIn" data-animation-duration="1000" data-animation-delay="0" data-animation-direction="">
        <div class="u-container-style u-expanded-width-xs u-group u-white u-group-1">
          <div class="u-container-layout u-container-layout-1">
            <h1 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-1" data-animation-name="fadeIn" data-animation-duration="750" data-animation-delay="0" data-animation-direction="">Sign Up</h1>
            <div class="u-align-left u-expanded-width-xs u-form u-form-1">
              <form action="_handleSignup.php" method="POST" class="u-clearfix u-form-custom-backend u-form-spacing-28 u-form-vertical u-inner-form" style="padding: 10px" source="custom" name="form" redirect="true" redirect-url="1074722187" redirect-address="login.html">
                <div class="u-form-group u-form-name u-form-group-1">
                  <label for="name-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Name</label>
                  <input type="text" placeholder="Enter your Full Name" id="name-5a14" name="signupName" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-email u-form-group u-form-group-2">
                  <label for="email-5a14" class="u-form-control-hidden u-label" wfd-invisible="true">Email</label>
                  <input type="email" placeholder="Enter a valid email address" id="email-5a14" name="signupEmail" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="">
                </div>
                <div class="u-form-group u-form-group-3">
                  <label for="text-f902" class="u-form-control-hidden u-label"></label>
                  <input type="password" placeholder="Create Password" id="text-f902" name="signupPassword" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                </div>
                <div class="u-form-group u-form-group-4">
                  <label for="text-d651" class="u-form-control-hidden u-label"></label>
                  <input type="password" placeholder="Confrim Password" id="text-d651" name="signupcPassword" class="u-border-2 u-border-black u-border-no-left u-border-no-right u-border-no-top u-input u-input-rectangle u-white" required="required">
                </div>

                <?php 
             if(isset($_GET['signupsuccess'])) {        
              if($_GET['signupsuccess']=="Password and confirm Password does not match"){
                echo'<br><p style="padding-left: 70px;" class=" active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-2">'.$_GET['signupsuccess'].' !!!</p>';
              }         
              if($_GET['signupsuccess']=="User with this Email already exist"){
                echo'<br><p style="padding-left: 100px;" class="active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-2">'.$_GET['signupsuccess'].',<a href="login.php"> Login </a>!!!</p>';
              }           
             }
             
              ?> 

                <div class="u-align-center u-form-group u-form-submit u-form-group-5">
                  <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Submit</a>
                  <input type="submit" value="submit" class="u-form-control-hidden" wfd-invisible="true">
                </div>
                <!-- <div class="u-form-send-message u-form-send-success" wfd-invisible="true">Thank you! Your message has been sent.</div>
                <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true"> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    
    
    
    <?php include 'footer.php'?>
  </body>
</html>