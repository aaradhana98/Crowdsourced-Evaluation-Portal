

<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
	  <title>Teacher Assistant Dashboard</title>
	  <link rel="stylesheet" href="../css/style.css">
	  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<style>
body {
    font-family: 'Sofia';font-size: 22px;
}
</style>
<body>
<div class="admintitle" align="center">
    <h4><a href="homepage.php" style="float:left; margin-left:30px; color:#fff; font-size:20px"></h4><input class="button" type="submit" name="back" value="Back"></a></h4>
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px"></h4><input class="button" type="submit" name="logout" value="Logout"></a></h4>
</div>
     


<?php 
include('../dbconnection.php');
session_start();

$ta=$_SESSION['username'];
$file=$_SESSION['file'];
$_SESSION['file']=$file;
$query="SELECT `username`, `id` FROM `student_evaluate` WHERE `file`='$file' GROUP BY `username`, `file`";
$run=mysqli_query($con,$query);
?>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>S.No</th>
		<th>Evaluated by</th>
	 </tr>
	<?php
	 	$count=0;

		while($data=mysqli_fetch_assoc($run))
		{
		 $count++;
		 
?>
	
         <tr>
			<td align="center"><?php echo $count; ?></td>
			<td align="center"><a href="mark.php?aid=<?php echo $data['id']; ?>&name=<?php echo $data['username']; ?>"><?php echo $data['username']; ?></a></td>
		</tr>	
		<?php } ?>
</table>

<?php
	$restrict="SELECT `file`, `approved_by`, `evaluated_by` FROM `ta_approve` WHERE `file`='$file' AND `approved_by`='$ta'";
	$run_restrict=mysqli_query($con,$restrict);
    $rows_restrict=mysqli_num_rows($run_restrict);
	if($rows_restrict<1)
	{ ?>
		<form action="reevaluate.php" method="POST" align="center">
			<input type="submit" name="reevaluate" value="Re-Evaluate">
		</form>
<?php }
	else
	{  
		$data_restrict=mysqli_fetch_assoc($run_restrict);
		$stu_name=$data_restrict['evaluated_by'];
		$approved="SELECT `username`, `id` FROM `student_evaluate` WHERE `file`='$file' AND `username`='$stu_name' GROUP BY `username`, `file`";
		$run_approved=mysqli_query($con,$approved);
		$data_approved=mysqli_fetch_assoc($run_approved);
		?> <h2 align="center">You have already approved the evaluation by <a href="mark.php?aid=<?php echo $data_approved['id']; ?>&name=<?php echo $data_approved['username']; ?>"><?php echo $data_restrict['evaluated_by']; ?></a></h2>
<?php	}
?>
 