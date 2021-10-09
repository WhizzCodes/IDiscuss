<?php include 'database/config.php' ?>
<!DOCTYPE html>
<html>
<body>
<?php
echo $_GET['threadid'];
$tid=$_GET['threadid'];
$sqldel="DELETE FROM `threads` WHERE thread_id=$tid";
$query=mysqli_query($conn,$sqldel);
if($query){       
    header("Location: javascript:history.back(-1)");
    }
?>
</body>
</html>