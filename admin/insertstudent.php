<?php
include('../dbconnection.php');

	$name=$_POST['name'];
	$branch=$_POST['branch'];
	$year=$_POST['year'];
	$regd_no=$_POST['regd_no'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$query="INSERT INTO `student`(`username`, `password`, `name`, `regd_no`, `branch`, `year`) VALUES ('$username','$password','$name','$regd_no','$branch', '$year')";
    $run=mysqli_query($con,$query); ?>
	<script>
			alert('You have successfully added a Student !');
			window.open('dashboard.php','_self');
	</script> 
