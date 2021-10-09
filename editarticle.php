<?php include 'database/config.php'?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>editarticle</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/editarticle.css" media="screen">
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
    <meta property="og:title" content="editarticle">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php'?>

  <?php 
  
  // echo$_GET['articleid'];
  $aid=$_GET['articleid'];
  $sql="select * from articles where art_id=$aid";
  $res=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($res);
  ?>



    <section class="u-clearfix u-section-1" id="sec-6655">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">Edit Article</h5>
        <div class="u-form u-form-1">
          <form action="#" method="POST" enctype="multipart/form-data">
            <!-- <div class="u-form-group u-form-name">
              <label for="name-b0ba" class="u-label">ID</label>
              <input type="text" id="name-b0ba" name="name" value="<?php if(isset($row['art_id'])) {echo $row['art_id'];}?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required="">
            </div> -->
            <div class="u-form-group u-form-group-2">
              <label for="text-e7c0" class="u-label">Title</label>
              <input type="text" placeholder="" id="text-e7c0" name="title" value="<?php if(isset($row['art_title'])) {echo $row['art_title'];}?>" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
            </div>
            <br>
            <div class="u-form-group u-form-message">
              <label for="message-e813" class="u-form-control-hidden u-label"></label>
              <textarea name="content" required><?php if(isset($row['art_content'])) {echo $row['art_content'];}?></textarea>
            </div>
            <br>
            <div class="u-form-group u-form-group-4">
            <label for="text-206f" class="u-form-control u-label">Picture (only jpg , jpeg extension allowed)</label><br><br>
              <input type="file" placeholder="" id="text-282c" name="file" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
            </div>
            <div class="u-align-left u-form-group u-form-submit">
              <a href="#" class="u-btn u-btn-submit u-button-style">Save<br>
              </a>
              <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
            </div>    
          </form>
        </div>
        <a href="userdashboard.html" data-page-id="1058627031" class="u-btn u-button-style u-btn-2">Dashboard</a>
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
  $sql="UPDATE `articles` SET `art_title`='$title', `art_content`='$content',`art_banner_pic`='$destinationfile' WHERE art_id=$aid";
  $result = mysqli_query($conn, $sql);
  if($result){
    echo"<center>Article Updated Successfully.</center><br>";
  }
  else{
    echo"<center>Article Not Updated.</center><br>";
  }

}
}
?>

    <?php include 'footer.php'?>
    

  </body>
</html>