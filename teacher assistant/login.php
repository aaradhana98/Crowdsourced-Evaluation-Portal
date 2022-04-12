<?php
session_start();
if(isset($_SESSION['uid3']))
{
	header('location:homepage.php');

}
?>
<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
	  <title>Crowdsourced Evaluation</title>
	  <link rel="stylesheet" href="../css/button.css">
	  <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
<style>
body {
    font-family: 'Sofia';font-size: 22px;
}
</style>

</head>

<body style="background-image:url('../images/book.jpg')">
	<h1 align="center">Teacher Assistant Log In </h1>
	<form action="login.php" method="POST">
		<table align="center">
			<tr>
				<td>Username</td><td><input type="text" name="username" required="required"/></td>
			</tr>
			<tr>
		        <td>Password</td><td><input type="password" name="password" required="required"/></td>
	        </tr>
            <tr>			
				<td colspan="2" align="center"><input class="button" type="submit" name="go" value="Go"></td>
			</tr>
		</table>
	</form>
</body>
</html>

<?php

include('../dbconnection.php');


if(isset($_POST['go']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query="SELECT * FROM `teacher assistant` WHERE `username`='$username' AND `password`='$password'";
	$run=mysqli_query($con,$query);
	$row=mysqli_num_rows($run);
	if($row>=1)	
	{
		$username=$_POST['username'];
		$_SESSION['username']=$username;
		header('location:homepage.php');
	}
	else
	{
		?>
			<script>
				alert('Wrong username or password.');
				window.open('../index.php','_self');
			</script>
		<?php
	}
}
	
?>