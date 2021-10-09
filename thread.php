<?php include 'database/config.php' ?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>thread</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="thread.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.21.3, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="ckeditor/ckeditor.js"></script>
    <link href="ckeditor/plugins/codesnippet/lib/highlight/styles/dark.css" rel="stylesheet">
    <script src="ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js"></script>
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <style>
       .jumbotron {
            padding: 2rem 1rem;
            margin-bottom: 2rem;
            background-color: #e9ecef;
            border-radius: .3rem;
        }
        .media {
            overflow: hidden;
            background: white;
            padding: 1rem;
            margin: 0 0 1rem 0;
        }

        #ques {

            min-height: 247px;
        }

        .media img {
            width: 75px;
            height: 75px;
            float: left;
            margin: 0 1rem 0 0;
        }

        .media h5 {
            font-weight: 500;
            margin: 0 0 0.5rem 0;
        }

        .media-body {
            color: gray;
        }

    </style>
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/Untitled56.jpg",
		"sameAs": []
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="thread">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
  <?php include 'header.php'?>
  <?php 

if(isset($_POST['submit'])){   
  $sno=$_SESSION['sno'];
  $id=$_GET['threadid']; 
  $comment=$_POST['content2'];
  $contsl=strlen($comment);
  if($contsl>10){
  // $content=htmlentities($_POST['content']);
  // $content = str_replace("<", "&lt;",$content);
	// $content = str_replace(">", "&gt;",$content);
  $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', CURRENT_TIMESTAMP)";
  $result = mysqli_query($conn, $sql);
}
else{
  echo'<div class="u-form-send-error u-form-send-message container" wfd-invisible="true"> Body must be at least 30 characters </div>';

}
}

?>
  <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {                
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $code = $row['thread_code'];
            $thread_user_id = $row['thread_user_id'];
            $view = $row['total_count'];
            $date = $row['timestamp'];
            $contsl=strlen($code);
            //query for user table to find the name of the question poster.
            $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $posted_by = $row2['user_name'];
        }                    
        ?>

  
    
      <div class="container my-4">
      <div class="jumbotron">
               <h4 class="display-10" style="color:#595959"><?php echo $title;?></h4>
                <p  style="color: #999999;"><?php echo $desc; ?></p>
                <!-- <p  style="color: #999999;"><?php echo $code; ?></p> -->
                <textarea name = "content"  name="content"><?php echo $code; ?></textarea>

                <hr class="my-4">
                <p style="color: #999999;">Posted by : <?php echo" $posted_by - $date &nbsp;&nbsp;<i class='fas fa-eye fa-sm fa-fw mr-2 text-gray-400'></i>&nbsp;&nbsp;$view"?></p>                        
     
              </div> 
      </div>
       
    <div class="container my-4" id="ques">
   
    <?php
             
            $id = $_GET['threadid'];                          
        
            $sql = "SELECT * FROM `comments` WHERE thread_id=$id";
            $result = mysqli_query($conn, $sql);          
            $noResult = true;
            $numRowscount=mysqli_num_rows($result);
            if ($numRowscount==1) {
              echo ''.$numRowscount.' Answer <br><br>';
            } 
            elseif ($numRowscount==0) {
              echo "<br>";
            } 
            else {
              echo ''.$numRowscount.' Answers <br><br><br>';
            }

            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;                            
                $id = $row['comment_id'];
                // $desc = $row['comment_desc'];
                $content = $row['comment_content'];
                $tid = $row['thread_id'];
                $comment_time = $row['comment_time'];
                $contsl=strlen($content);

                $thread_user_id = $row['comment_by'];
                $sql2 = "SELECT * FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);

                             
                echo'         
                   
                   <div style="padding: 2rem 1rem;
                   margin-bottom: 2rem;
                   background-color: #f2f2f2;
                   border-radius: .3rem;">
                <div style="display:inline;">
                    <img src="'.$row2['profilepic'].'" width=50px height=55px/>
                </div>
                <div id="'.$id.'" style="display:inline;"> 
                    <small>' . $row2['user_name'] . ' at ' . $comment_time . '&nbsp;'.$contsl.'&nbsp;&nbsp;&nbsp;&nbsp;</small>';
           
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
              if($thread_user_id==$_SESSION['sno']){
            echo' <a href="editanswer.php?cid='.$id.'"><button style="font-size:10px;border: none;"><i class="fa fa-edit"></i></button></a>&nbsp;
            <a href="deletec.php?cid='.$id.'"> <button style="font-size:10px;border: none;"><i class="fa fa-trash-o"></i></button></a> ';
          
            



          }
          if($thread_user_id!=$_SESSION['sno']){
            echo'<a href="userdashboard.php" style=" text-decoration: none;"><button style="font-size:10px;border: none;"><i class="fa fa-reply"></i></button></a>';
          }
        }
          else{
            echo'<a href="userdashboard.php" style=" text-decoration: none;"><button style="font-size:10px;border: none;"><i class="fa fa-reply"></i></button></a>';
          }
            
           echo' 
                  <small>'.$content.'</small>
                   
                  </div>   
                  </div>     
                             
                  ';
               
                   
                
            }

            if ($noResult) {
                echo '<div class="jumbotron">
        <div class="container">
          <p class="lead" style="color:#a6a6a6">No Answers Yet</p>
          <p class="lead" style="color:#a6a6a6">Be the first person to answer.</p>
        </div>
      </div>';
            }
            ?>
            
        </div>  
    </div>
    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
echo'
<section class="u-clearfix u-section-4" id="sec-185f">
<div class="u-clearfix u-sheet u-sheet-1">
  <h5 class="u-align-center u-text u-text-grey-80 u-text-1">Post Answer</h5>
  <div class="u-form u-form-1">
    <form action="#" method="POST">
      <div class="u-form-group u-form-message">
        <label for="message-a5fd" class="u-form-control-hidden u-label"></label>
        <textarea name="content2" required></textarea>
      </div>
      <div class="u-align-center u-form-group u-form-submit">
        <a href="#" class="u-border-none u-btn u-btn-submit u-button-style u-custom-color-5 u-btn-1">Post<br>
        </a>
        <input type="submit" name="submit" value="submit" class="u-form-control-hidden">
      </div>
     
    </form>
  </div>
</div>
</section> ';

    }
    
    else{
     echo'<section class="u-clearfix u-section-3" id="sec-1754">
     <div class="u-clearfix u-sheet u-sheet-1">
       <h5 class="u-text u-text-default u-text-1">Post Answer ?</h5>
       <p class="u-text u-text-default u-text-2">You Are Not Logged In , Please Login To Post</p>
     </div>
     </section>';

    }  

?>
    
      <script>       
        CKEDITOR.replace( 'content', {
         customConfig: 'config1.js'
      });
   </script> 

     <script>       
        CKEDITOR.replace( 'content2',{
          customConfig: 'config2.js'
        } );
    //     CKEDITOR.replace('content', {
    //     extraPlugins: 'codesnippet','blockquote';
    //     codeSnippet_theme: 'monokai_sublime'
    // });   
    </script>
 


   
    <?php include 'footer.php'?>
    <?php include 'views.php' ?>

   <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>