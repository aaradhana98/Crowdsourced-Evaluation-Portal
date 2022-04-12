<?php

include('../dbconnection.php');

	$name=$_POST['name'];
	$dept=$_POST['dept'];
	$emp_id=$_POST['emp_id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$query="INSERT INTO `teacher assistant`(`username`, `password`, `name`, `emp_id`, `dept`) VALUES ('$username','$password','$name','$emp_id','$dept')";
    $run=mysqli_query($con,$query); ?>
	
	<script>
			alert('You have successfully added a Teacher Assistant !');
			window.open('dashboard.php','_self');
	</script> 