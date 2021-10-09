<?php include 'database/config.php' ?>
<?php
if(isset($_GET['threadid'])){
    $tid=$_GET['threadid'];
	mysqli_query($conn,"update threads set total_count=total_count+1 where thread_id=$tid");
}

if(isset($_GET['articleid'])){
    $arid=$_GET['articleid'];   
	mysqli_query($conn,"update articles set total_count=total_count+1 where art_id=$arid");
}
?>