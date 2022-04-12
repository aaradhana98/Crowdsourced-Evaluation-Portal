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

$sid=$_REQUEST['sid'];
$sql="DELETE FROM `teacher assistant` WHERE `id`='$taid';";
$run=mysqli_query($con,$sql);
if($run==true)
{
	?>
	<script>
		alert('Data deleted successfully !');
		window.open('removeta.php','_self');
	</script>
	<?php
}

?>