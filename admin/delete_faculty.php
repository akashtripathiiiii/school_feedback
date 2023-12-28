<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete faculty,feedback from faculty,feedback where faculty.email=feedback.faculty_id and faculty.id='$info'");
	
	header('location:dashboard.php?info=show_faculty');
?>