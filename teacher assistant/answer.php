<?php
  
include('../dbconnection.php');
include('header.php');
include('title.php');

session_start();
$username= $_SESSION['username'];
$sql="SELECT `file`, `student_name`, `branch`, ta_upload.`sub_id`, ta_upload.`id` FROM `ta_upload` LEFT JOIN `subject` ON ta_upload.`sub_id`=subject.`sub_id` WHERE subject.`user_type`='TA' AND subject.`username`='$username'"; 
$run=mysqli_query($con,$sql);
$rows=mysqli_num_rows($run);
	if($rows<1)
		echo 'No record found !';
	else
	{ 
	?>
     <table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>S.No</th>
		<th>Name of the student</th>
		<th>Answer Sheet</th>
		<th>Subject Id</th>
		<th>Branch</th>
	 </tr>
	<?php
	 	$count=0;
		while($data=mysqli_fetch_assoc($run))
		{
		 $count++;
		 
?>
	
         <tr>
			<td align="center"><?php echo $count; ?></td>
			<td align="center"><?php echo $data['student_name']; ?></td>
			<td align="center"><a href="aframe.php?aid=<?php echo $data['id'] ?>&sub=<?php echo $data['sub_id']; ?>" target="_blank"><?php echo $data['file']; ?></a></td>
            <td align="center"><?php echo $data['sub_id']; ?></td>
			<td align="center"><?php echo $data['branch']; ?></td>
		</tr>	
    		<?php
		} ?>
	</table>
	<?php }
	 $query="SELECT `file`, student_evaluate.`sub_id`, student_evaluate.`id` FROM `student_evaluate` JOIN `subject` ON student_evaluate.`sub_id`=subject.`sub_id` WHERE subject.`username`='$username' GROUP BY(`file`)";
	 $run_query=mysqli_query($con,$query);
	 $rows_query=mysqli_num_rows($run_query);
	 if($rows_query>0)
	 { ?>
	<h3 align="center"><u>Answer Sheets evaluated by Students</u></h3>
	<table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>S.No</th>
		<th>Name of the student</th>
		<th>Answer Sheet</th>
		<th>Subject Id</th>
		<th>Branch</th>
	 </tr>
	<?php
	 	$count=0;

	  while($data_query=mysqli_fetch_assoc($run_query))
		{
		 $count++;
		 $file_name=$data_query['file'];
		 $res="SELECT `student_name`, `sub_id`, `branch` FROM `student_upload` WHERE `file`='$file_name'";
		 $run_res=mysqli_query($con,$res);
		 $result=mysqli_fetch_assoc($run_res);
?>
	
         <tr>
			<td align="center"><?php echo $count; ?></td>
			<td align="center"><?php echo $result['student_name']; ?></td>
			<td align="center"><a href="aframe.php?aid=<?php echo $data_query['id']; ?>&sub=<?php echo $data_query['sub_id']; ?>" target="_blank"><?php echo $data_query['file']; ?></a></td>
		    <td align="center"><?php echo $result['sub_id']; ?></td>
			<td align="center"><?php echo $result['branch']; ?></td>
		</tr>	
<?php	}
?> </table> <?php
	 } ?>
	
	
