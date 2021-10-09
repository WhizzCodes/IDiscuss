
<?php
include '../database/config.php';

if(isset($_GET['adminid'])){
    echo $_GET['adminid'];
    $id=$_GET['adminid'];
    $sql="DELETE FROM `admin` WHERE ad_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/admindelete.php");
    }
}

if(isset($_GET['forumid'])){
    echo $_GET['forumid'];
    $id=$_GET['forumid'];
    $sql="DELETE FROM `categories` WHERE category_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/forumdelete.php");
    }
}
if(isset($_GET['articleid'])){
    echo $_GET['articleid'];
    $id=$_GET['articleid'];
    $sql="DELETE FROM `articles` WHERE art_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/articledelete.php");
    }
}

if(isset($_GET['seltid'])){
    echo $_GET['seltid'];
    $id=$_GET['seltid'];
    $existSql = "select * from `testemonial` where status = 'Current'";
                $result = mysqli_query($conn, $existSql);
                $numRows = mysqli_num_rows($result);
                if($numRows==3){
                    header("Location: /IDiscuss/admin/appliedts.php?spacefull=3");
                }
                else{
                    $sql="UPDATE testemonial set `status`='Current' WHERE testemonial_id=$id";
                    $query=mysqli_query($conn,$sql);
                    if($query){
                        header("Location: /IDiscuss/admin/appliedts.php");
                    }
                }
  
}

if(isset($_GET['deltid'])){
    echo $_GET['deltid'];
    $id=$_GET['deltid'];
    $sql="DELETE FROM `testemonial` WHERE testemonial_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/appliedts.php");
    }
  
}

if(isset($_GET['removets'])){
    echo $_GET['removets'];
    $id=$_GET['removets'];
    $sql="UPDATE testemonial set `status`='Applied' WHERE testemonial_id=$id";
    $query=mysqli_query($conn,$sql);
    if($query){
        header("Location: /IDiscuss/admin/currentts.php");
    }
  
}


?>