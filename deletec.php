<?php include 'database/config.php' ?>
<!DOCTYPE html>
<html>
<body>
<?php
echo $_GET['cid'];
$cid=$_GET['cid'];
$sqldel="DELETE FROM `comments` WHERE comment_id=$cid";
$query=mysqli_query($conn,$sqldel);
if($query){       
    header("Location: javascript:history.back(-1)");
    }
?>
</body>
</html>