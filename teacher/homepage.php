<?php
session_start();
include('../dbconnection.php');
$username2= $_SESSION['username'];
$_SESSION['username']=$username2;
$query2="SELECT * FROM `teacher` WHERE `username`='$username2'";
$run2=mysqli_query($con,$query2);
$data2=mysqli_fetch_assoc($run2);
$id=$data2['id'];
$_SESSION['uid2']=$id;
include('dashboard.php');

?>
		<table border="1" style="width:50%; margin-top:20px" align="center">
			<tr>
				<th colspan="3">Teacher Details</th>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data2['name']; ?></td>
			</tr>
			<tr>
				<th>Employee Id</th>
				<td><?php echo $data2['emp_id']; ?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td><?php echo $data2['dept']; ?></td>
			</tr>
		</table>

		<a href="answer.php">Click here to view answer sheets</a>










