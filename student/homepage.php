
<?php
session_start();
include('../dbconnection.php');
$username1= $_SESSION['username'];
$query1="SELECT * FROM `student` WHERE `username`='$username1'";
$run1=mysqli_query($con,$query1);
$data1=mysqli_fetch_assoc($run1);
$id=$data1['id'];
$_SESSION['uid1']=$id;
include('dashboard.php'); 
?>
<table border="1" style="width:50%; margin-top:20px" align="center" bgcolor="#ffffff">
			<tr>
				<th colspan="3">Student Details</th>
			</tr>
			<tr>
				<th>Name</th>
				<td><?php echo $data1['name']; ?></td>
			</tr>
			<tr>
				<th>Regd No.</th>
				<td><?php echo $data1['regd_no']; ?></td>
			</tr>
			<tr>
				<th>Branch</th>
				<td><?php echo $data1['branch']; ?></td>
			</tr>
		</table>

<form action="homepage.php" method="POST">
		<table align="center">
			<tr>
				<td>Subject Id</td><td><input type="text" name="sub_id" placeholder="Subject you want to evaluate" required="required"></td>
			</tr>
			<tr>
				<td><input colspan="2" align="center" type="submit" name="go" value="Go"></td>
			</tr>
		</table>
	</form>  
	
<?php
if(isset($_POST['go']))
{
 $sub_id=$_POST['sub_id'];
 $_SESSION['sub_id']=$sub_id;
 $_SESSION['username']=$username1;
 header('location:answer.php');
}
?>