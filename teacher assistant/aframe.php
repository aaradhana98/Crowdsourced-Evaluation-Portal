<?php
 include('header.php');
 include('title.php');
 session_start();
 include('../dbconnection.php');
 $x= $_SESSION['username'];
 $aid=$_REQUEST['aid'];
 $sub=$_REQUEST['sub'];
 $_SESSION['aid']=$aid;
 $sql1="SELECT `file`, ta_upload.`sub_id`, ta_upload.`id` FROM `ta_upload` LEFT JOIN `subject` ON ta_upload.`sub_id`=subject.`sub_id` WHERE subject.`user_type`='TA' AND subject.`username`='$x'"; 
 $sql2="SELECT `q_file` FROM `question_paper` LEFT JOIN `ta_upload` ON question_paper.`doe`=ta_upload.`doe` RIGHT JOIN `subject` ON ta_upload.`sub_id`=subject.`sub_id` WHERE subject.`user_type`='TA' AND subject.`username`='$x'";
 $sql3="SELECT `file`, student_evaluate.`id` FROM `student_evaluate` JOIN `subject` ON student_evaluate.`sub_id`=subject.`sub_id` WHERE subject.`username`='$x' AND student_evaluate.`id`='$aid' "; 
 $run1=mysqli_query($con,$sql1);
 $run2=mysqli_query($con,$sql2);
 $run3=mysqli_query($con,$sql3);
 $data1=mysqli_fetch_assoc($run1);
 $data2=mysqli_fetch_assoc($run2);
 $data3=mysqli_fetch_assoc($run3);
 $file1=$data1['file'];
 $file2=$data2['q_file'];
 $file3=$data3['file'];
 $_SESSION['file']=$file3;
 $rows3=mysqli_num_rows($run3);
 
 ?>
 <script>
function openWin() {
    window.open("../images/question papers/<?php echo $file2; ?>");
}
</script>

<?php
if($rows3<1)
{ ?>
<h1 align="center">Subject Id: <?php echo $sub; ?> </h1>
<div>
		<iframe src="../images/ta_upload/<?php echo $file1; ?>" height="600" width="1000" style="display:block; margin: auto;"></iframe>
</div>

<form>
     <input type="button"  value="Question Paper" onclick="openWin()" />
</form>
			
<form action="evaluate.php" method="POST">
	 <input type="submit" name="evaluate" value="Evaluate">
</form>
<?php } 
else
{ ?>
<h1 align="center">Subject Id: <?php echo $sub; ?> </h1>
<div>
		<iframe src="../images/student_upload/<?php echo $file3; ?>" height="600" width="1000" style="display:block; margin: auto;"></iframe>
</div>

<form>
    <input type="button"  value="Question Paper" onclick="openWin()" />
</form>
<form action="evaluators.php" method="POST">
    <input type="submit" name="evaluators" value="Evaluators" />
</form>
<?php }
?>
