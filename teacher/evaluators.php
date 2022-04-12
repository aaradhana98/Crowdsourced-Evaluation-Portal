
<?php 
include('header.php');
include('title.php');
include('../dbconnection.php');
session_start();

$file=$_SESSION['file'];
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
