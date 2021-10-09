<?php include 'database/config.php' ?>
<!DOCTYPE html>
<html>
<body>
<?php
echo $_GET['articleid'];
$arid=$_GET['articleid'];
$sqldel="DELETE FROM `articles` WHERE art_id=$arid";
$query=mysqli_query($conn,$sqldel);
if($query){       
    header("Location: javascript:history.back(-1)");
    }
?>
</body>
</html>