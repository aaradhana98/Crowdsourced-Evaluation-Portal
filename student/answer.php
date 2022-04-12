<?php
  
include('../dbconnection.php');
include('header.php');
include('title.php');

session_start();
$username= $_SESSION['username'];
$sub_id= $_SESSION['sub_id'];
$sql1="SELECT `file`, student_upload.`id` FROM `student_upload` JOIN `student` ON student_upload.`branch`=student.`branch` WHERE student_upload.`year`=student.`year` AND student_upload.`sub_id`='$sub_id' AND student.`username`='$username'"; 
$sql2="SELECT `q_file` FROM `question_paper` WHERE `sub_id`='$sub_id'";
$run1=mysqli_query($con,$sql1);
$run2=mysqli_query($con,$sql2);
$rows1=mysqli_num_rows($run1);
$rows2=mysqli_num_rows($run2);
    if($rows2<1)
		echo 'Question paper not uploaded yet !';
	if($rows1<1)
		echo 'No record found !';
	else
	{ 
        $data2=mysqli_fetch_assoc($run2);
		$max_id=1;
		$min_id=99999;
		while($data1=mysqli_fetch_assoc($run1))
		{
		 if($data1['id']>$max_id)
			 $max_id=$data1['id'];
		 if($data1['id']<$min_id)
			 $min_id=$data1['id'];
		}
			do{
		$x=rand($min_id,$max_id);
		$sql="SELECT `file` FROM `student_upload` LEFT JOIN `student` ON student_upload.`branch`=student.`branch` WHERE student_upload.`year`=student.`year` AND student_upload.`sub_id`='$sub_id' AND student_upload.`id`='$x'";
		$run=mysqli_query($con,$sql);
		$rows=mysqli_num_rows($run);
			}while($rows<1);
		$_SESSION['aid']=$x;
		$data=mysqli_fetch_assoc($run);
		?>
		<script>
        function openWin() {
          window.open("../images/question papers/<?php echo  $data2['q_file']; ?>");
		}
		</script>
		<h1 align="center">Subject Id: <?php echo $sub_id; ?> </h1>
		<div>
	       <iframe height="600" width="1000" src="../images/student_upload/<?php echo $data['file']; ?>" style="display:block;  margin: auto"></iframe>
        </div>
		<?php
?>
	        <form>
            <input type="button" value="Question Paper" onclick="openWin()"/>
            </form>
		

	<?php  
	$restrict="SELECT `paper_evaluated` FROM `student` WHERE `username`='$username'";
	$run_restrict=mysqli_query($con,$restrict);
	$data_restrict=mysqli_fetch_assoc($run_restrict);
	if($data_restrict['paper_evaluated']<3){
	?>
	
	<form action="evaluate.php" method="POST">
	 <input type="submit" name="evaluate" value="Evaluate">
	</form>
	
	
<?php
	
	
	}
	else
		echo 'Already evaluated 3 papers, cannot evaluate more papers !';  
	

	
	} ?>