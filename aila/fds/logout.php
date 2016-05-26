<?php 
session_start();
if(isset($_SESSION['username'])){
	unset($_SESSION['username']);
	unset($_SESSION['user_id']);
	
	
	}
header("location:index.php");
?>