<?php

// include('../database/config.php');

if(!isset($_COOKIE['visit'])){
	setCookie('visit','yes',time()+(1*5));
	mysqli_query($conn,"update visit set total_count=total_count+1");
}
?>