<?php include 'database/config.php'?>
<!DOCTYPE html>
<html style="font-size: 16px;">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="We hope These Forums Helps You&nbsp;In Your Need">
  <meta name="description" content="">
  <meta name="page_type" content="np-template-header-footer-from-plugin">
  <title>forums</title>
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
  <link rel="stylesheet" href="css/forums.css" media="screen">
  <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
  <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
  <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="forums">
  <meta property="og:type" content="website">
</head>
<body class="u-body">
  <?php include 'header.php'?>
  <section class="u-align-center u-clearfix u-section-1" id="carousel_a292">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h2 class="u-align-center u-text u-text-1">We hope These Forums Helps You</h2>
      <p class="u-text u-text-2">Forums we provide</p>
      <div class="u-form u-form-1">
        <form method="POST" style="padding: 15px;" source="custom">
          <div class="u-form-group u-form-name">
            <label for="name-ef64" class="u-form-control-hidden u-label">Name</label>
            <input type="text" placeholder="Name" id="name-ef64" name="cat"
              class="u-border-1 u-border-grey-30 u-input u-input-rectangle">
          </div>
          <div class="u-form-group u-form-submit u-align-center">
            <a href="#" class="u-btn u-btn-center u-btn-submit u-button-style">Search<br>
            </a>
            <input type="submit" value="submit" name="submit" class="u-form-control-hidden">
          </div>
          <!-- <div class="u-form-send-message u-form-send-success">#FormSendSuccess</div>
            <div class="u-form-send-error u-form-send-message">#FormSendError</div>
            <input type="hidden" value="" name="recaptchaResponse"> -->
        </form>
      </div>
      <div class="u-expanded-width u-list u-list-1">
        <div class="u-repeater u-repeater-1">
          <?php 
          if(isset($_POST['submit'])){
            $noResult = true;
            $cat=$_POST['cat'];
            $sql="SELECT *
		FROM categories
		WHERE
		(
			category_name LIKE '%$cat%'
			
		)";
		$res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($res)){
      $noResult = false;
			// echo $row['category_name'];
      $id=$row['category_id'];
              $cat=$row['category_name'];
              $desc=$row['category_description'];
              echo'  <div class="u-container-style u-list-item u-repeater-item">
                  <div class="u-container-layout u-similar-container u-container-layout-1">
                    <img class="u-expanded-width-sm u-expanded-width-xs u-image u-image-1" src="https://source.unsplash.com/500x400/?'.$cat.',coding" data-image-width="1600" data-image-height="900">
                    <div class="u-align-center u-container-style u-expanded-width-sm u-expanded-width-xl u-expanded-width-xs u-group u-shape-rectangle u-group-1">
                      <div class="u-container-layout u-container-layout-2">
                        <h3 class="u-text u-text-3"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h3>
                        <h6 class="u-text u-text-4">'.substr($desc, 0,90).'...</h6>
                        <br>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Forum</a>
                      </div>
                    </div>
                  </div>
                </div>';
		}
  }    
  else{
    $sql="SELECT * FROM `categories`";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
    //echo $row['category_id']; 
    //echo $row['category_name']; 
    $id=$row['category_id'];
    $cat=$row['category_name'];
    $desc=$row['category_description'];
    echo'  <div class="u-container-style u-list-item u-repeater-item">
        <div class="u-container-layout u-similar-container u-container-layout-1">
          <img class="u-expanded-width-sm u-expanded-width-xs u-image u-image-1" src="https://source.unsplash.com/500x400/?'.$cat.',coding" data-image-width="1600" data-image-height="900">
          <div class="u-align-center u-container-style u-expanded-width-sm u-expanded-width-xl u-expanded-width-xs u-group u-shape-rectangle u-group-1">
            <div class="u-container-layout u-container-layout-2">
              <h3 class="u-text u-text-3"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h3>
              <h6 class="u-text u-text-4">'.substr($desc, 0,90).'...</h6>
              <br>
              <a href="threadlist.php?catid='.$id.'" class="btn btn-primary">View Forum</a>
            </div>
          </div>
        </div>
      </div>';
 }
  }   
            ?>
        </div>
      </div>
    </div>
  </section>
  <?php include 'footer.php'?>
</body>
</html>