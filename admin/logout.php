<?php
@session_start(); 
	
	session_destroy();
 
	 
	if($_GET['msg']==1){
	header("Location:index.php?err=3");
	}
	else{
	header("Location:index.php?err=2");
	}
	 
?>