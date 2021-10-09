<?php include 'database/config.php'?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>userdashboard</title>
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
<link rel="stylesheet" href="css/userdashboard.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
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
    <meta property="og:title" content="userdashboard">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
 
  <?php include 'header.php'?>
  <?php
                      
                      $uid=$_SESSION['sno'];
                      // echo $uid;
                      $sqld="select * from threads where thread_user_id=$uid";
                      $res=mysqli_query($conn,$sqld);
                      // $noResult=true;
                      //   while($row=mysqli_fetch_assoc($res)){
                      //     echo $row['title'];
                      //   }
                      ?>
                      <!-- <br><br><br> <br><br><br>
                      <br><br><br> <br><br><br> -->
    <section class="u-align-center u-clearfix u-white u-section-1" id="sec-28d3">
      <div class="u-clearfix u-sheet u-valign-top u-sheet-1">
        <div class="u-expanded-width u-tab-links-align-justify u-tabs u-tabs-1">
          <ul class="u-palette-1-base u-spacing-0 u-tab-list u-unstyled u-tab-list-1" role="tablist">
            <li class="u-tab-item" role="presentation">
              <a class="active u-active-white u-button-style u-tab-link u-tab-link-1" id="link-tab-0da5" href="#tab-0da5" role="tab" aria-controls="tab-0da5" aria-selected="true">Questions</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-active-white u-button-style u-tab-link u-tab-link-2" id="link-tab-14b7" href="#tab-14b7" role="tab" aria-controls="tab-14b7" aria-selected="false">Answers</a>
            </li>
            <li class="u-tab-item" role="presentation">
              <a class="u-active-white u-button-style u-tab-link u-tab-link-3" id="link-tab-2917" href="#tab-2917" role="tab" aria-controls="tab-2917" aria-selected="false">Articles</a>
            </li>
          </ul>
          <div class="u-tab-content">
            <div class="u-container-style u-tab-active u-tab-pane u-white u-tab-pane-1" id="tab-0da5" role="tabpanel" aria-labelledby="link-tab-0da5">
              <div class="u-container-layout u-container-layout-1">
                <h3 class="u-text u-text-default u-text-1">Your Questions</h3>
                <a href="editquestion.php" data-page-id="3377018" class="u-btn u-button-style u-btn-1">Post New Question</a>
                <div class="u-expanded-width u-table u-table-responsive u-table-1">
                  <table class="u-table-entity">
                    <colgroup>
                      <col width="8.5%">
                      <col width="49.1%">
                      <col width="28.5%">
                      <col width="6.4%">
                      <col width="7.5%">
                    </colgroup>
                    <thead class="u-palette-5-dark-1 u-table-header u-table-header-1">
                      <tr style="height: 45px;">
                        <th class="u-table-cell u-table-cell-1">ID</th>
                        <th class="u-table-cell u-table-cell-2">Title</th>
                        <th class="u-table-cell u-table-cell-3">Date</th>
                        <th class="u-table-cell u-table-cell-4">View</th>
                        <th class="u-table-cell u-table-cell-5">Edit</th>
                      </tr>
                    </thead>
                    <tbody class="u-table-body">
                    <?php 
                          $uid=$_SESSION['sno'];
                          $sqld="select * from threads where thread_user_id=$uid";
                          $res=mysqli_query($conn,$sqld);
                          while($row=mysqli_fetch_assoc($res)){
                            $tid=$row['thread_id'];
                          ?>
                            <tr style="height: 56px;">
                            <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-first-column u-table-cell"><?php echo $row['thread_id'] ?></td>
                            <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo substr($row['thread_title'], 0,68).'' ?></td>
                            <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo $row['timestamp'] ?></td>
                            <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-2" href="thread.php?threadid=<?php echo $tid?>">View</a>
                            </td>
                            <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-3" href="editquestion.php?threadid=<?php echo $tid?>" data-page-id="229795649">Edit</a>
                            </td>
                          </tr>
                          <?php
                          }
                          ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-2" id="tab-14b7" role="tabpanel" aria-labelledby="link-tab-14b7">
              <div class="u-container-layout u-container-layout-2">
                <h3 class="u-text u-text-default u-text-2">Your Answers</h3>
                <div class="u-expanded-width u-table u-table-responsive u-table-2">
                  <table class="u-table-entity">
                    <colgroup>
                      <col width="5%">
                      <col width="48%">
                      <col width="24.2%">
                      <col width="6.9%">
                      <col width="7%">
                      <col width="8.8%">
                    </colgroup>
                    <thead class="u-palette-5-dark-1 u-table-header u-table-header-2">
                      <tr style="height: 45px;">
                        <th class="u-table-cell u-table-cell-11">ID</th>
                        <th class="u-table-cell u-table-cell-12">Comment Description</th>
                        <th class="u-table-cell u-table-cell-13">Date</th>
                        <th class="u-table-cell u-table-cell-14">View</th>
                        <th class="u-table-cell u-table-cell-15">Edit</th>
                        <th class="u-table-cell u-table-cell-16">Delete</th>
                      </tr>
                    </thead>
                    <tbody class="u-table-body">
                    <?php 
                          $uid=$_SESSION['sno'];
                          $sqld="select * from comments where comment_by=$uid";
                          $res=mysqli_query($conn,$sqld);
                          while($row=mysqli_fetch_assoc($res)){
                            $cid=$row['comment_id'];
                          ?>
                      <tr style="height: 56px;">
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-first-column u-table-cell"><?php echo $row['comment_id'] ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo substr($row['comment_content'], 0,68).'' ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo $row['comment_time'] ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="thread.php?threadid=<?php echo $row['thread_id'] ?>#<?php echo $cid?>" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-4">View</a>
                        </td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="editanswer.php?cid=<?php echo $cid?>" data-page-id="533816365" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-5">Edit</a>
                        </td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="deletec.php?cid=<?php echo $cid?>" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-6">Delete</a>
                          
                        </td>
                      </tr>
                      <?php
                          }
                          ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="u-container-style u-tab-pane u-white u-tab-pane-3" id="tab-2917" role="tabpanel" aria-labelledby="link-tab-2917">
              <div class="u-container-layout u-container-layout-3">
                <h3 class="u-align-center u-text u-text-default u-text-3">Your Articles</h3>
                <a href="postarticle.php" data-page-id="50600546" class="u-btn u-button-style u-btn-7">Post New Article</a>
                <div class="u-expanded-width u-table u-table-responsive u-table-3">
                  <table class="u-table-entity">
                    <colgroup>
                      <col width="7.6%">
                      <col width="48.6%">
                      <col width="22.8%">
                      <col width="6.7%">
                      <col width="6.3%">
                      <col width="7.9%">
                    </colgroup>
                    <thead class="u-palette-5-dark-1 u-table-header u-table-header-3">
                      <tr style="height: 25px;">
                        <th class="u-table-cell u-table-cell-23">ID</th>
                        <th class="u-table-cell u-table-cell-24">Title</th>
                        <th class="u-table-cell u-table-cell-25">Date</th>
                        <th class="u-table-cell u-table-cell-26">View</th>
                        <th class="u-table-cell u-table-cell-27">Edit</th>
                        <th class="u-table-cell u-table-cell-28">Delete</th>
                      </tr>
                    </thead>
                    <tbody class="u-table-body">
                    <?php 
                          $uid=$_SESSION['sno'];
                          $sqld="select * from articles where art_by=$uid";
                          $res=mysqli_query($conn,$sqld);
                          while($row=mysqli_fetch_assoc($res)){
                            $artid=$row['art_id'];
                          ?>
                      <tr style="height: 56px;">
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-first-column u-table-cell"><?php echo $row['art_id'] ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo substr($row['art_title'], 0,68).'' ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell"><?php echo $row['date_time'] ?></td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="post.php?articleid=<?php echo $row['art_id'] ?>" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-8">View</a>
                        </td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="editarticle.php?articleid=<?php echo $artid?>" data-page-id="127687875" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-9">Edit</a>
                        </td>
                        <td class="u-border-1 u-border-grey-15 u-border-no-left u-border-no-right u-table-cell">
                          <a href="deletear.php?articleid=<?php echo $artid?>" class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-palette-1-base u-btn-10">Delete</a>
                        </td>
                      </tr>
                      <?php
                          }
                          ?>
                    </tbody>
                  </table>
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