<?php

include('../dbconnection.php');

session_start();
$file=$_SESSION['approved_file'];
$evaluated_by=$_SESSION['stu_eval'];
$approved_by=$_SESSION['username'];
$max_marks=$_SESSION['mm'];
$marks_awarded=$_SESSION['fm'];
$approve="INSERT INTO `ta_approve`(`file`, `evaluated_by`, `approved_by`, `max_marks`, `marks_awarded`) VALUES ('$file','$evaluated_by','$approved_by','$max_marks','$marks_awarded')";
$run_approve=mysqli_query($con,$approve);

?>

<script>
			alert('You have successfully approved this evaluation !');
			window.open('homepage.php','_self');
	</script>