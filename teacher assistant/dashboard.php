<?php
  
include('header.php');
$username= $_SESSION['username'];
$query="SELECT `name` FROM `teacher assistant` WHERE `username`='$username'";
$run=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($run);

?>

<div class="admintitle" align="center">
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px"><input class="button" type="submit" name="logout" value="Logout"></a></h4>
	<h1>Welcome, <?php echo $data['name']; ?> !</h1>
</div>

