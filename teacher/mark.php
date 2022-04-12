<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
	  <title>Evaluation</title>
	  <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div class="admintitle" align="center">
    <h4><a href="evaluators.php" style="float:left; margin-left:30px; color:#fff; font-size:20px"></h4>Back</a></h4>
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px"></h4>Logout</a></h4>
</div>

 <?php 
include('../dbconnection.php');
session_start();

$aid=$_REQUEST['aid'];
$name=$_REQUEST['name'];
$sql="SELECT `file` FROM `student_evaluate` WHERE `id`='$aid' "; 
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
$file=$data['file'];
$query="SELECT `max_marks`, `marks`, `remarks` FROM `student_evaluate` WHERE `username`='$name' AND `file`='$file'";
$run_query=mysqli_query($con,$query);
 
?>
  <body>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<iframe height="700" width="750" src="../images/student_upload/<?php echo $file ; ?>" style="margin-top:40px"></iframe>
        </div>
            <br />
            <br />
		<div class="col-md-6">
            <table align="center" width="80%" border="1" style="margin-top:10px;">
				<tr>
					<th>Q No.</th>
					<th>Max Marks</th>
					<th>Marks Awarded</th>
					<th>Remarks</th>
				</tr>
			<?php
	 	     $count=0;
			 $mm=0;
			 $fm=0;

		     while($mark=mysqli_fetch_assoc($run_query))
		    {
		     $count++;
			 $mm=$mm+$mark['max_marks'];
			 $fm=$fm+$mark['marks'];
		 
?>
	
                <tr>
					<td align="center"><?php echo $count; ?></td>
					<td align="center"><?php echo $mark['max_marks']; ?></td>
					<td align="center"><?php echo $mark['marks']; ?></td>
					<td align="center"><?php echo $mark['remarks']; ?></td>
				</tr>
	<?php 	} ?>
		    </table>
			<h3 align="center">Marks obtained: <?php echo $fm.'/'.$mm ?></h3>
        </div>
	</div>
</div>
 </body>
</html>

 

