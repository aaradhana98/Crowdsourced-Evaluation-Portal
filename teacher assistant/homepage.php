<?php
session_start();
include('../dbconnection.php'); 
$username3= $_SESSION['username'];
$query3="SELECT * FROM `teacher assistant` WHERE `username`='$username3'";
$run3=mysqli_query($con,$query3);
$data3=mysqli_fetch_assoc($run3);
$id=$data3['id'];
$_SESSION['uid3']=$id;
include('dashboard.php');
		?>
		<table border="1" style="width:50%; margin-top:20px" align="center">
			<tr>
				<th colspan="3">Teacher Assistant Details</th>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data3['name']; ?></td>
			</tr>
			<tr>
				<th>Employee Id</th>
				<td><?php echo $data3['emp_id']; ?></td>
			</tr>
			<tr>
				<th>Department</th>
				<td><?php echo $data3['dept']; ?></td>
			</tr>
		</table>
		
		<a href="answer.php">Click here to view answer sheets</a>
		
