<?php
session_start();
session_destroy();
header("Location: /IDiscuss/admin/adminlogin.php");
?>