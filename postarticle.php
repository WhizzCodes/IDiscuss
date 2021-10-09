<?php include 'database/config.php' ?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>postarticle</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/postarticle.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    
    <script src="ckeditor/ckeditor.js"></script>
    <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/dark.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="postarticle">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
  <?php include 'header.php'?>

    <section class="u-clearfix u-section-1" id="sec-63e6">
      <div class="u-clearfix u-sheet u-valign-top-md u-valign-top-sm u-valign-top-xs u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">Post Article</h5><br>
        <a href="#sec-4027" class="u-border-none u-btn u-button-style u-custom-color-1 u-dialog-link u-btn-1">View Demo Article Template</a><br>
        <div class="u-expanded-width u-form u-form-1">
          <form action="#" method="POST" enctype="multipart/form-data">
            <div class="u-form-group">
              <label for="name-e813" class="u-form-control-hidden u-label"></label>
              <input type="text" placeholder="Heading " id="name-e813" name="title" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
            </div>
            <br>
            <div class="u-form-group u-form-message">
              <label for="message-e813" class="u-form-control-hidden u-label"></label>
              <textarea name="content" required></textarea>
            </div>
            <br>
            <div class="u-form-group u-form-group-3">
              <label for="text-206f" class="u-form-control u-label">Picture (only jpg , jpeg extension allowed)</label><br><br>
              <input type="file" placeholder="Upload one Banner Image " id="text-206f" name="file" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-2">Post<br>
              </a>
              <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
            </div>
            <!-- <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse"> -->
          </form>
        </div>
      </div>
    </section>

    <script>       
        CKEDITOR.replace( 'content' );
    //     CKEDITOR.replace('content', {
    //     extraPlugins: 'codesnippet',
    //     codeSnippet_theme: 'monokai_sublime'
    // });
    </script>


<?php 
if(isset($_POST['submit'])){     
  $title=$_POST['title'];
  $content=$_POST['content'];

  $files=$_FILES['file'];
  $filename = $files['name'];
  $fileerror = $files['error'];
  $filetmp = $files['tmp_name'];
  
  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $fileextstored= array('jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $destinationfile = 'ArticleBannerPic/'.$filename;
    move_uploaded_file($filetmp,$destinationfile);

  $sno=$_SESSION['sno'];
  $sql="INSERT INTO `articles`(`art_title`, `art_content`,`art_banner_pic`,`art_by`, `date_time`) VALUES ('$title','$content','$destinationfile','$sno',CURRENT_TIMESTAMP)";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo"<center>Article Posted.</center><br><br>";
  }
  else{
    echo"<center>Article Not Posted.</center><br><br>";
  }

}
}
?>



    <?php include 'footer.php'?>

    
    
   
  <section class="u-align-center u-black u-clearfix u-container-style u-dialog-block u-opacity u-opacity-70 u-section-4" id="sec-4027">
      <div class="u-align-center u-container-style u-dialog u-white u-dialog-1">
        <div class="u-container-layout u-container-layout-1">
          <h3 class="u-text u-text-1">Technology the Future</h3>
          <img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="150" data-image-height="97" src="images/50600546-0.jpeg">
          <p class="u-align-center u-small-text u-text u-text-default u-text-variant u-text-2">Alex James | 2021-04-13 23:30:29&nbsp;| Comments (4)</p>
          <p class="u-align-left u-text u-text-default u-text-3">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div><button class="u-border-2 u-border-grey-25 u-dialog-close-button u-icon u-icon-circle u-spacing-7 u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6e8b"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 16 16" x="0px" y="0px" id="svg-6e8b"><rect x="7" y="0" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="2" height="16"></rect><rect x="0" y="7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -3.3138 8.0002)" width="16" height="2"></rect></svg></button>
      </div>
    </section><style>.u-section-4 {
  min-height: 826px;
}

.u-section-4 .u-dialog-1 {
  width: 498px;
  min-height: 623px;
  height: auto;
  margin: 46px calc(((100% - 1140px) / 2) + 279px) 60px auto;
}

.u-section-4 .u-container-layout-1 {
  padding: 24px 30px;
}

.u-section-4 .u-text-1 {
  font-weight: 700;
  font-size: 1.5rem;
  margin: 7px 0 0;
}

.u-section-4 .u-image-1 {
  height: 193px;
  margin-top: 24px;
  margin-bottom: 0;
}

.u-section-4 .u-text-2 {
  margin: 24px auto 0;
}

.u-section-4 .u-text-3 {
  font-size: 0.875rem;
  margin: 20px auto 0 0;
}

.u-section-4 .u-icon-1 {
  width: 31px;
  height: 31px;
  background-image: none;
  left: auto;
  top: 20px;
  position: absolute;
  right: 20px;
}

@media (max-width: 1199px) {
  .u-section-4 .u-dialog-1 {
    margin-right: calc(((100% - 940px) / 2) + 279px);
  }

  .u-section-4 .u-image-1 {
    height: 193px;
  }
}

@media (max-width: 991px) {
  .u-section-4 .u-dialog-1 {
    margin-right: calc(((100% - 720px) / 2) + 222px);
  }

  .u-section-4 .u-container-layout-1 {
    padding-top: 70px;
  }
}

@media (max-width: 767px) {
  .u-section-4 .u-dialog-1 {
    margin-right: calc(((100% - 540px) / 2) + 42px);
  }

  .u-section-4 .u-container-layout-1 {
    padding-top: 65px;
  }
}

@media (max-width: 575px) {
  .u-section-4 .u-dialog-1 {
    width: 340px;
    margin-right: calc(((100% - 340px) / 2));
  }

  .u-section-4 .u-container-layout-1 {
    padding-left: 25px;
    padding-right: 25px;
  }

  .u-section-4 .u-image-1 {
    margin-top: 7px;
  }
}</style></body>
</html>