<?php

	session_start();
	if(isset($_SESSION['uid']))
	{
	 echo "";
	}

?>

<?php
  
include('header.php');
include('title.php');
include('../dbconnection.php');

$sid=$_REQUEST['tid'];
$sql="DELETE FROM `teacher` WHERE `id`='$tid';";
$run=mysqli_query($con,$sql);
if($run==true)
{
	?>
	<script>
		alert('Data deleted successfully !');
		window.open('removeteacher.php','_self');
	</script>
	<?php
}

?>