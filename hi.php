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
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {                
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $code = $row['thread_code'];
            $thread_user_id = $row['thread_user_id'];
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
                <p style="color: #999999;">Posted by : <?php echo" $posted_by - $date " ?></p>                        
     
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

                $thread_user_id = $row['comment_by'];
                $sql2 = "SELECT user_name,profilepic FROM `users` WHERE sno='$thread_user_id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);


                echo '
  <div class="container" id="container" style="white-space:nowrap">

  <div id="image" style="display:inline;">
      <img src="'.$row2['profilepic'].'" width=50px height=55px/>
  </div>

  <div style="max-width: 50px;" id="'.$id.'" style="display:inline; white-space:nowrap;"> 
  <small>' . $row2['user_name'] . ' at ' . $comment_time . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
  <a href="thread.php?threadid='.$row['thread_id'].'#'.$id.'" ><button style="font-size:10px"><i class="fa fa-edit"></i></button></a>
  <a href="userdashboard.php" style=" text-decoration: none;"><button style="font-size:10px"><i class="fa fa-trash-o"></i></button></a>
  </div>
 <small> ' . $content . '</small>
  <hr>
</div>   ';
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
        <textarea placeholder="Type in Code If Any... " name="content2" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-white"></textarea>
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
     <script>       
        CKEDITOR.replace( 'content3', {
         customConfig: 'config3.js'
      });
   </script> 
     <?php 

if(isset($_POST['submit'])){   
  $sno=$_SESSION['sno'];
  $id=$_GET['threadid']; 
  $comment=$_POST['content2'];
  // $content=htmlentities($_POST['content']);
  // $content = str_replace("<", "&lt;",$content);
	// $content = str_replace(">", "&gt;",$content);
  $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', CURRENT_TIMESTAMP)";
  $result = mysqli_query($conn, $sql);
}

?>
    <?php include 'footer.php'?>
   
  </body>
</html>




if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $edsql="SELECT comment_id FROM `comments` WHERE comment_by='$thread_user_id'";
    $edsqlrun=mysqli_query($conn, $sql);   
    while ($rowe = mysqli_fetch_assoc($edsqlrun)) {
      echo'<a href="thread.php?threadid='.$row['thread_id'].'#'.$id.'" ><button style="font-size:10px"><i class="fa fa-edit"></i></button></a>
      <a href="userdashboard.php" style=" text-decoration: none;"><button style="font-size:10px"><i class="fa fa-trash-o"></i></button></a>';
    }
           
   
   }


   echo'         
                   
                   <div class="container">                    
                   <div style="display:inline;">
                       <img src="'.$row2['profilepic'].'" width=50px height=55px/>
                   </div>
                   <div id="'.$id.'" style="display:inline;"> 
                       <small>' . $row2['user_name'] . ' at ' . $comment_time . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>';
              
               if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                 if($thread_user_id==$_SESSION['sno']){
               echo' <a href="thread.php?threadid='.$row['thread_id'].'#'.$id.'" ><button style="font-size:10px"><i class="fa fa-edit"></i></button></a>&nbsp;
               <a href="userdashboard.php" style=" text-decoration: none;"><button style="font-size:10px"><i class="fa fa-trash-o"></i></button></a>';
             }}
              echo' <br>
                     <small>'.$content.'</small>
                     <hr style="height: 3px;">                      
                   </div>';