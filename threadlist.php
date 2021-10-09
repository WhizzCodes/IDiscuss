<?php include 'database/config.php'?>
<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="Welcome Message, Browse Queriers">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>threadlist</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/threadlist.css" media="screen">
  <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <link id="u-page-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i|Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/dark.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "",
      "logo": "images/Untitled56.jpg",
      "sameAs": []
    }
  </script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="threadlist">
  <meta property="og:type" content="website">
  <style>
    .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
            background-color: #e9ecef;
            border-radius: .3rem;
        }
  </style>
</head>

<body class="u-body">

  <?php include 'header.php'?>

  <?php
	$id=$_GET['catid'];
	$sql="SELECT * FROM `categories` WHERE category_id=$id";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$catname=$row['category_name'];
		$catdesc=$row['category_description'];
	}	
	?>

  <section class="u-clearfix u-valign-middle-xs u-section-1" id="carousel_2b70">
    <img class="u-expanded-width u-image u-image-default u-image-1" src="images/pexels-photo-4050357.jpeg" alt=""
      data-image-width="1620" data-image-height="1080">
    <div class="u-container-style u-grey-5 u-group u-group-1">
      <div class="u-container-layout u-valign-middle u-container-layout-1">
        <h2 class="u-align-center u-custom-font u-font-merriweather u-text u-text-default u-text-1">Welcome to
          <?php echo $catname;?></h2>
        <p class="u-align-justify u-custom-font u-font-montserrat u-text u-text-2"> <?php echo $catdesc;?></p>
      </div>
    </div>
  </section>
  <section class="u-clearfix u-section-2" id="sec-9265">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2
        class="u-align-center u-subtitle u-text u-text-default-lg u-text-default-md u-text-default-sm u-text-default-xl u-text-1">
        Browse Queriers</h2>
      <div class="u-form u-form-1">
        <form action="#" method="POST" class="u-clearfix u-form-horizontal u-form-spacing-15 u-inner-form"
          style="padding: 15px;" source="custom">
          <div class="u-form-group u-form-name">
            <label for="name-ef64" class="u-form-control-hidden u-label">Name</label>
            <input type="text" placeholder="Name" id="name-ef64" name="name"
              class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
          </div>
          <div class="u-form-group u-form-submit">
            <a href="#" class="u-btn u-btn-submit u-button-style">Search<br>
            </a>
            <input type="submit" value="submit" class="u-form-control-hidden">
          </div>
        </form>
      </div>
    </div>
  </section>

  <?php 
$id=$_GET['catid'];

$per_page=5;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
  $start=$_GET['start'];
  if($start<=0){
    $start=0;
    $current_page=1;
  }else{
    $current_page=$start;
    $start--;
    $start=$start*$per_page;
  }
}


$sql="SELECT * FROM `threads` WHERE thread_cat_id=$id";
$result=mysqli_query($conn,$sql);
$record=mysqli_num_rows($result);
$pagi=ceil($record/$per_page);

$sqld="select * from threads where thread_cat_id=$id ORDER BY thread_id DESC limit $start,$per_page";
$res=mysqli_query($conn,$sqld);
$noResult=true;
  while($row=mysqli_fetch_assoc($res)){
    $noResult=false;
    $id=$row['thread_id'];
    $title=$row['thread_title'];
    $desc=$row['thread_desc'];		
    $thread_time=$row['timestamp'];

    $thread_user_id=$row['thread_user_id'];	
    $sql2="SELECT user_name,profilepic FROM `users` WHERE sno='$thread_user_id'";	
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
      echo        ' <section class="u-clearfix u-section-3" id="carousel_6dca">
      <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
        <div class="u-clearfix u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xl u-gutter-0 u-layout-wrap u-layout-wrap-1">
          <div class="u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-5 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1">             
                <div class="u-image u-image-circle u-image-1" alt="" data-image-width="1000" data-image-height="1500"><img src="'.$row2['profilepic'].'" style="border-radius: 50%;" height="100px" width="100px"></div>
                </div>
              </div>
              <div class="u-container-style u-layout-cell u-size-55 u-layout-cell-2">
                <div class="u-container-layout u-valign-bottom-lg u-container-layout-2">
                  <h6 class="u-text u-text-default u-text-1">
                    <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-black u-btn-1" href="thread.php?threadid='.$id.'">'.$title.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>';
                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                      if($thread_user_id==$_SESSION['sno']){
                    echo' <a href="editquestion.php?threadid='.$id.'"><button style="font-size:10px"><i class="fa fa-edit"></i></button></a>&nbsp;
                    <a href="deleteq.php?threadid='.$id.'" style=" text-decoration: none;"><button style="font-size:10px"><i class="fa fa-trash-o"></i></button></a>';
                  }}
                echo'  </h6>
                  <p class="u-align-justify u-small-text u-text u-text-variant u-text-2"> '.substr($desc, 0,100).'...</p>
                  <p class="u-align-justify u-small-text u-text u-text-variant u-text-3"> '.$row2['user_name'].' at '.$thread_time.'</p>
                 
                </div>
              </div>   </div>
              </div>
            </div>
          </div>
        </section>';
      
      }

        if ($noResult) {
          echo '
          <div class="container"><div class="container">
          <div class="container"><div class="container">
          <div class="container"><div class="container">
          <div class="container">
          <div class="container">
          <div class="jumbotron">
  <div class="container">
    <p class="lead" style="color:#a6a6a6">No Queries Yet</p>
    <p class="lead" style="color:#a6a6a6">Be the first person to Ask.</p>
  </div>
</div></div>
</div>
</div></div></div></div></div></div>';
      }
              ?>

  <section class="u-clearfix u-section-4" id="sec-1481">
    <div class="u-clearfix u-sheet u-sheet-1">

      <ul class="pagination mt-30">
        <?php 
	for($i=1;$i<=$pagi;$i++){
	$class='';
	if($current_page==$i){
		?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
	}else{
	?>
        <li class="page-item"><a class="page-link"
            href="?catid=<?php echo $_GET['catid']?>&start=<?php echo $i?>"><?php echo $i?></a></li>
        <?php
	}
	?>

        <?php } ?>
      </ul>
    </div>

  </section>

  <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo' <section class="u-clearfix u-section-6" id="carousel_9259">
        <div class="u-clearfix u-sheet u-sheet-1">
          <h5 class="u-align-center u-text u-text-grey-80 u-text-1">Post Query</h5>
          <div class="u-expanded-width u-form u-form-1">
            <form action="#" method="POST">
              <div class="u-form-group u-form-name">
                <label for="name-a5fd" class="u-form-control-hidden u-label"></label>
                <input type="text" placeholder="Title" id="name-a5fd" name="title" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white" required>
              </div><br>
              <div class="u-form-group u-form-name">
                <label for="name-a5fd" class="u-form-control-hidden u-label"></label>
                <input type="text" maxlength="245" placeholder="Description" id="name-a5fd" name="desc" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white">
              </div><br>
              <div class="u-form-group u-form-message">
              <label for="message-a5fd" class="u-form-control-hidden u-label"></label>
              <textarea name="content"></textarea>
            </div><br>
              <div class="u-align-center u-form-group u-form-submit">
                <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-1 u-btn-1">Post<br>
                </a>
                <input type="submit" name ="submit" value="Submit" class="u-form-control-hidden" wfd-invisible="true">          
                </div>
    </form>
  </div>
</div>
</section>';

    }
    
    else{
     echo' <section class="u-clearfix u-section-5" id="sec-a6d6">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h5 class="u-text u-text-default u-text-1">Post Query ?</h5>
        <p class="u-text u-text-default u-text-2">You Are Not Logged In , Please Login To Post</p>
      </div>
    </section>';

    }  

?>
<script>       
        CKEDITOR.replace( 'content' );
    //     CKEDITOR.replace('content', {
    //     extraPlugins: 'codesnippet',
    //     codeSnippet_theme: 'monokai_sublime'
    // });
    </script>
    <?php 

if(isset($_POST['submit'])){   
  $sno=$_SESSION['sno'];
  $id=$_GET['catid']; 
  $title=$_POST['title'];
  $desc=$_POST['desc'];
  $content=htmlentities($_POST['content']);
  $title = str_replace("<", "&lt;",$title);
	$title = str_replace(">", "&gt;",$title);
     
  // $content = str_replace("<", "&lt;",$content);
	// $content = str_replace(">", "&gt;",$content);
    $sql="INSERT INTO `threads`(`thread_title`, `thread_desc`, `thread_code`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$title','$desc','$content','$id','$sno', CURRENT_TIMESTAMP)";
    $run=mysqli_query($conn,$sql);
}

?>
  <?php include 'footer.php'?>

</body>

</html>


