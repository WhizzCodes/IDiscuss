<?php include 'database/config.php'?>
<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>editanswer</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/editanswer.css" media="screen">
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
    <meta property="og:title" content="editanswer">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
  <?php include 'header.php'?>
  <?php   
  if(isset($_GET['cid'])){

  
            $cid=$_GET['cid'];         
            $sqld="select * from comments where comment_id=$cid";
            $res=mysqli_query($conn,$sqld); 
            $row=mysqli_fetch_assoc($res);           
              // while($row=mysqli_fetch_assoc($res)){
              //   echo $row['user_name'];
              // }
  }
  ?>
    <section class="u-clearfix u-section-1" id="sec-6a7d">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">Edit Answer</h5>
        <div class="u-form u-form-1">
          <form action="#" method="POST">
            <div class="u-form-group u-form-name">
              <!-- <label for="name-b0ba" class="u-label">ID</label> -->
              <input type="hidden" id="name-b0ba" value="<?php if(isset($row['comment_id'])) {echo $row['comment_id'];}?>" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div>
            <!-- <div class="u-form-group u-form-message">
              <label for="message-b0ba" class="u-label">Description</label>
              <textarea placeholder="Enter your message" rows="4" cols="50" id="message-b0ba" name="message" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required=""></textarea>
            </div> -->
            <!-- <div class="u-form-group u-form-textarea u-form-group-3">
              <label for="textarea-2a1d" class="u-label">Content</label>
              <textarea rows="4" cols="50" id="textarea-2a1d" name="textarea" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required=""></textarea>
            </div> -->
            <div class="u-form-group u-form-textarea u-form-group-3">
              <label for="textarea-2a1d" class="u-label">Content</label><br><br>
              <textarea name="content"><?php if(isset($row['comment_content'])) {echo $row['comment_content'];}?></textarea>
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <a href="#" class="u-btn u-btn-submit u-button-style">Save<br>
              </a>
              <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
            </div>
            <!-- <div class="u-form-send-message u-form-send-success"> Thank you! Your message has been sent. </div>
            <div class="u-form-send-error u-form-send-message"> Unable to send your message. Please fix errors then try again. </div>
            <input type="hidden" value="" name="recaptchaResponse"> -->
          </form>
        </div>
        <a href="userdashboard.php" data-page-id="1058627031" class="u-btn u-button-style u-btn-2">Dashboard</a>
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
$sqld="select * from comments where comment_id=$cid";
$res=mysqli_query($conn,$sqld); 
$row=mysqli_fetch_assoc($res);           
$id=$row['comment_id'];
if(isset($_POST['submit'])){   
  $sno=$_SESSION['sno'];
  $cid=$_GET['cid']; 
  $comment_content=$_POST['content'];
  // $desc=$_POST['desc'];
  // $content=htmlentities($_POST['content']);
  // $title = str_replace("<", "&lt;",$title);
	// $title = str_replace(">", "&gt;",$title);
     
  // $content = str_replace("<", "&lt;",$content);
	// $content = str_replace(">", "&gt;",$content);
    $sql="UPDATE `comments` SET `comment_content`='$comment_content' WHERE comment_id=$cid";
    $run=mysqli_query($conn,$sql);
}

?>
    <?php include 'footer.php'?>
    
   
  </body>
</html>