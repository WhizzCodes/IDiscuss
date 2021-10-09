<?php session_start();?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <!-- <title>Page 1</title> -->
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/header.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
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
    <meta property="og:title" content="Page 1">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
      <header class="u-clearfix u-header u-header" id="sec-71fb"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="index.php" class="u-align-left u-image u-image-round u-logo u-image-1" data-image-width="768" data-image-height="768">
          <img src="images/Untitled56.jpg" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="index.php" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="forums.php" style="padding: 10px 20px;">Forum</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="articles.php" style="padding: 10px 20px;">Articles</a></li>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      $trimmed_str = trim($_SESSION['username']);
      echo'
      <li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="about.php" style="padding: 10px 20px;">About</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="contact.php" style="padding: 10px 20px;">Contact</a></li>
<li class="u-nav-item"><a href="#sec-04cb" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-dialog-link u-none u-text-palette-1-base u-btn-1">'.$trimmed_str.'</a></li>';
    
 }
else{
    echo'<li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="login.php" style="padding: 10px 20px;">Login</a>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="signup.php" style="padding: 10px 20px;">Signup</a>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="about.php" style="padding: 10px 20px;">About</a>
    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="contact.php" style="padding: 10px 20px;">Contact</a>
    </li>';
}
?>

</ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.php" style="padding: 10px 20px;">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="forums.php" style="padding: 10px 20px;">Forum</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="articles.php" style="padding: 10px 20px;">Articles</a></li>

<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      $trimmed_str = trim($_SESSION['username']);
      echo'
      <li class="u-nav-item"><a class="u-button-style u-nav-link" href="about.php" style="padding: 10px 20px;">About</a>
   </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="contact.php" style="padding: 10px 20px;">Contact</a>
      <hr>
<li class="u-nav-item">Loggedin - '.$trimmed_str.'</li>
<hr>
<li class="u-nav-item"><a class="u-button-style u-nav-link" href="index.html" style="padding: 10px 0px;">Profile</a></li>
<li class="u-nav-item"><a class="u-button-style u-nav-link" href="userdashboard.php" style="padding: 10px 0px;">Dashboard</a></li>
<li class="u-nav-item"><a class="u-button-style u-nav-link" href="aptestemonial.php" style="padding: 10px 0px;">Apply for Testemonials</a></li>
<li class="u-nav-item"><a class="u-button-style u-nav-link" href="_handleLogout.php" style="padding: 10px 0px;">Logout</a></li>'; 
 }
 
 else
 {
   echo' <li class="u-nav-item"><a class="u-button-style u-nav-link" href="login.php" style="padding: 10px 20px;">Login</a>
   </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="signup.php" style="padding: 10px 20px;">Signup</a>
   </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="about.php" style="padding: 10px 20px;">About</a>
   </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="contact.php" style="padding: 10px 20px;">Contact</a>
   </li>';
 }
 ?>
</ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header> 
    
    <section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-9" id="sec-04cb">
      <div class="u-align-left u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-valign-middle u-container-layout-1">
          <a href="profile.php" data-page-id="55416942" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-1">Profile</a>
          <a href="userdashboard.php" data-page-id="1058627031" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-2">Dashboard</a>
          <a href="aptestemonial.php" data-page-id="1058627031" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-2">Testemonial</a>

          <a href="_handleLogout.php" class="u-border-1 u-border-active-palette-2-base u-border-hover-palette-1-base u-btn u-button-style u-none u-text-palette-1-base u-btn-3">Logout</a>
        </div><button class="u-border-2 u-border-grey-25 u-dialog-close-button u-icon u-icon-circle u-spacing-7 u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6e8b"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-6e8b"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section><style>.u-section-9 {
  min-height: 826px;
}

.u-section-9 .u-dialog-1 {
  width: 270px;
  min-height: 295px;
  margin: 129px calc(((100% - 1140px) / 2)) 60px auto;
}

.u-section-9 .u-container-layout-1 {
  padding: 15px 4px 0;
}

.u-section-9 .u-btn-1 {
  border-style: none none solid;
  font-size: 1.5rem;
  margin: 0 auto;
  padding: 0;
}

.u-section-9 .u-btn-2 {
  border-style: none none solid;
  font-size: 1.5rem;
  margin: 16px auto 0;
  padding: 0;
}

.u-section-9 .u-btn-3 {
  border-style: none none solid;
  font-size: 1.5rem;
  margin: 30px auto 0;
  padding: 0;
}

.u-section-9 .u-icon-1 {
  width: 31px;
  height: 31px;
  background-image: none;
  left: auto;
  top: 20px;
  position: absolute;
  right: 20px;
}

@media (max-width: 1199px) {
  .u-section-9 .u-dialog-1 {
    height: auto;
    margin-right: calc(((100% - 940px) / 2));
  }
}

@media (max-width: 991px) {
  .u-section-9 .u-dialog-1 {
    margin-right: calc(((100% - 720px) / 2));
  }

  .u-section-9 .u-container-layout-1 {
    padding-top: 70px;
  }
}

@media (max-width: 767px) {
  .u-section-9 .u-dialog-1 {
    margin-right: calc(((100% - 540px) / 2));
  }

  .u-section-9 .u-container-layout-1 {
    padding-top: 65px;
    padding-left: 30px;
    padding-right: 30px;
  }
}

@media (max-width: 575px) {
  .u-section-9 .u-dialog-1 {
    margin-right: calc(((100% - 340px) / 2));
  }

  .u-section-9 .u-container-layout-1 {
    padding-left: 25px;
    padding-right: 25px;
  }
}</style>



  </body>
</html>