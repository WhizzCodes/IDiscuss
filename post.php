<?php include 'database/config.php'?>

<!doctype html>
<html style="font-size: 16px;"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Post 1 Headline">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Post 1 Headline</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/Post-Template.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Post Template">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">

  <?php include 'header.php'?>

  <?php
$artit=$_GET['articleid'];
// echo $artit;
$sql="SELECT * FROM `articles` WHERE art_id=$artit";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $id=$row['art_id'];
      $title=$row['art_title'];
      $content=$row['art_content'];
      $img=$row['art_banner_pic'];
      $by=$row['art_by'];
      $view=$row['total_count'];
      $dt=$row['date_time'];
$sqlu="select * from users where sno=$by";
$res=mysqli_query($conn,$sqlu);
$row2=mysqli_fetch_assoc($res);

    
echo'<section class="u-align-center u-clearfix u-section-1" id="sec-5882">
<div class="u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1"><!--post_details--><!--post_details_options_json--><!--{"source":""}--><!--/post_details_options_json--><!--blog_post-->
  <div class="u-container-style u-post-details u-post-details-1">
    <div class="u-container-layout u-container-layout-1"><!--blog_post_header-->
      <h2 class="u-align-center u-blog-control u-text u-text-1">'.$title.'</h2><!--/blog_post_header--><!--blog_post_image--><br><br>
      <img alt="" class="u-blog-control u-image u-image-default u-image-1" src="'.$img.'"><!--/blog_post_image--><!--blog_post_metadata-->
      <div class="u-blog-control u-metadata u-metadata-1"><!--blog_post_metadata_author-->
        <span class="u-meta-author u-meta-icon"><!--blog_post_metadata_author_content-->'.$row2['user_name'].'<!--/blog_post_metadata_author_content--></span><!--/blog_post_metadata_author--><!--blog_post_metadata_date-->
        <span class="u-meta-date u-meta-icon">'.$dt.'</span><!--/blog_post_metadata_date--><!--blog_post_metadata_comments-->
        <span class="u-meta-date u-meta-icon"><i class="fas fa-eye fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;&nbsp;'.$view.'</span>
        <!--/blog_post_metadata_comments-->
      </div><!--/blog_post_metadata--><!--blog_post_content-->
      
      <p class="u-align-justify u-text u-text-3">'.$content.'</p>
    </div>
  </div><!--/blog_post--><!--/post_details-->
</div>
</section>';
    
    
    }

    
    ?>
    <br><br>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo'<center> <section class="u-clearfix u-section-6" id="carousel_9259">
        <div class="u-clearfix u-sheet u-sheet-1">
        <a href="postarticle.php"><h5 class="u-align-center u-text u-text-grey-80 u-text-1">Click Here to Post Your Article</h5></a><br>
          <div class="u-expanded-width u-form u-form-1">
            
  </div>
</div>
</section></center>';

    }
    
    else{
     echo'<center> <section class="u-clearfix u-section-5" id="sec-a6d6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">Post Article?</h5>
        <p class="u-text u-text-default u-text-2">You Are Not Logged In , Please Login To Post</p>
      </div>
    </section></center><br>';

    }  

?>
    
    <?php include 'footer.php'?>
    <?php include 'views.php'?>
</body></html>

