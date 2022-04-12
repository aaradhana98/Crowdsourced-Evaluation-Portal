
<?php
session_start();
include('../dbconnection.php');
$username4= $_SESSION['username'];
$query4="SELECT * FROM `admin` WHERE `username`='$username4'";
$run4=mysqli_query($con,$query4);
$data4=mysqli_fetch_assoc($run4);
$id=$data4['id'];
$_SESSION['uid4']=$id;
include('dashboard.php'); 

?>
