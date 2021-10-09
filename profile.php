<?php 
include 'database/config.php';
?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Profile">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>profile</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/profile.css" media="screen">
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
    <meta property="og:title" content="profile">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php' ;
  // echo $_SESSION['userprofilepic'];
  ?>
<?php   
            $uid=$_SESSION['sno'];         
            $sqld="select * from users where sno=$uid";
            $res=mysqli_query($conn,$sqld); 
            $row=mysqli_fetch_assoc($res);           
              // while($row=mysqli_fetch_assoc($res)){
              //   echo $row['user_name'];
              // }
            ?>

    <section class="u-align-center u-clearfix u-grey-5 u-valign-middle-lg u-valign-middle-md u-valign-middle-xl u-valign-middle-xs u-section-1" id="carousel_3b63">
      <div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-gutter-0 u-layout-wrap u-layout-wrap-1">
        <div class="u-layout">
          <div class="u-layout-row">
            <div class="u-align-left u-container-style u-layout-cell u-left-cell u-size-30 u-white u-layout-cell-1">
              <div class="u-container-layout u-valign-top-sm u-container-layout-1">
                <img src="<?php echo $_SESSION['userprofilepic']?>" height="100px" width="100px">
                <!-- <div class="u-image u-image-circle u-preserve-proportions u-image-1" alt="" data-image-width="197" data-image-height="197"><img src="<?php echo $_SESSION['userprofilepic']?>"></div> -->
                <h4 class="u-text u-text-grey-75 u-text-1"><?php echo $row['user_name']?></h4>
                <h5 class="u-text u-text-grey-70 u-text-2"><?php echo $row['designation']?></h5><br><br>
                <!-- <p class="u-text u-text-palette-4-dark-2 u-text-3">Name :&nbsp; <?php echo $_SESSION['username']?></p> -->
                <p class="u-text u-text-palette-4-dark-2 u-text-4"><u>Phone</u> :&nbsp;<?php echo $row['phone']?></p>
                <p class="u-text u-text-palette-4-dark-2 u-text-4"><u>Email</u> :&nbsp;<?php echo $row['user_email']?></p>
                <!-- <p class="u-text u-text-palette-4-dark-2 u-text-4"><u>About</u> :&nbsp;<?php echo $row['about']?></p> -->

                <!-- <p class="u-text u-text-palette-4-dark-2 u-text-5">About :&nbsp;</p> -->
              </div>
            </div>
            
            <div class="u-align-left u-container-style u-layout-cell u-right-cell u-size-30 u-white u-layout-cell-2">
              <div class="u-container-layout u-container-layout-2">
                <h2 class="u-align-center u-custom-font u-font-pt-sans u-text u-text-6">Edit Profile</h2>
                <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-form u-form-1">
                  <form action="_handleProfile.php" method="POST" enctype="multipart/form-data">           
                    <div class="u-form-group u-form-name">
                      <label for="name-f0d0" class="u-form-control u-label" wfd-invisible="true">Name</label>
                      <input type="text" value="<?php echo $row['user_name'];?>" name="uname" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-2" required>
                    </div>
                    <div class="u-form-group u-form-name">
                      <label for="name-f0d0" class="u-form-control u-label" wfd-invisible="true">Phone</label>
                      <input type="tel" maxlength="10" minlength="10" value="<?php echo $row['phone'];?>" name="uphone" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-2">
                    </div>
                    <div class="u-form-group u-form-name">
                      <label for="name-f0d0" class="u-form-control u-label" wfd-invisible="true">Designation</label>
                      <input type="text" value="<?php echo $row['designation'];?>" name="udesignation" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-2">
                    </div>
                    
                    <!-- <div class="u-form-group u-form-name">
                      <label for="name-f0d0" class="u-form-control u-label" wfd-invisible="true">Email</label>
                      <input type="email" value="<?php echo $row['user_email'];?>" name="uemail" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-2" required>
                    </div> -->

                    <!-- <div class="u-form-group u-form-textarea">
                      <label for="textarea-6338" class="u-form-control u-label">About</label>
                      <textarea rows="4" cols="50" name="uabout" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-3"></textarea>
                    </div> -->
                    
                    <div class="u-form-group u-form-group-4">
                      <label for="text-06ea" class="u-form-control u-label">Profile Picture (only jpg , jpeg extension allowed)</label>
                      <input type="file" id="file" name="file" class="u-border-1 u-border-black u-input u-input-rectangle u-radius-7 u-white u-input-4" placeholder="Profile Picture">
                    </div>
                    <div class="u-align-center u-form-group u-form-submit">
                      <a href="#" class="u-border-1 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Save<br>
                      </a>
                      <input type="submit" value="submit" name= "submit" class="u-form-control-hidden" wfd-invisible="true">
                    </div>
                    <!-- <div class="u-form-send-message u-form-send-success" wfd-invisible="true"> Thank you! Your message has been sent. </div>
                    <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Unable to send your message. Please fix errors then try again. </div>
                    <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true"> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
   
   
    <?php include 'footer.php'?>
    
   
  </body>
</html>