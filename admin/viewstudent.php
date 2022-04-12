
<?php
  
include('header.php');
include('title.php');

?>

<table align="center">
<form action="viewstudent.php" method="POST">
	<tr>
		<th>Name of the student</th>
		<td><input type="text" name="name" required="required"/></td>
	</tr>
	<tr>
		<th>Branch</th>
		<td><input type="text" name="branch" required="required"/></td>
	</tr>
	<td colspan="2"><input type="submit" name="submit" value="Search"/></td>
</form>

<?php

include('../dbconnection.php');
$query1="SELECT * FROM `student`";
$run1=mysqli_query($con,$query1);

?>

<table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>No.</th>
		<th>Name</th>
		<th>Registration No.</th>
		<th>Branch</th>
	 </tr>
	 
<?php

$count1=0;
while($data1=mysqli_fetch_assoc($run1))
{
	$count1++;
?>

    <tr>
		<td align="center"><?php echo $count1; ?></td>
		<td align="center"><?php echo $data1['name']; ?></td>
		<td align="center"><?php echo $data1['regd_no']; ?></td>
		<td align="center"><?php echo $data1['branch']; ?></td>
	</tr>	
	
<?php		

}		
	
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$branch=$_POST['branch'];
	$sql="SELECT * FROM `student` WHERE `name` LIKE '%$name%' AND `branch` LIKE '$branch'";
	$run=mysqli_query($con,$sql);
	$rows=mysqli_num_rows($run);
	if($rows<1)
	{
		echo 'No record found !';
	}
	else
	{
	?>
     <table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>No.</th>
		<th>Name</th>
		<th>Registration No.</th>
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
			<td align="center"><?php echo $data['name']; ?></td>
			<td align="center"><?php echo $data['regd_no']; ?></td>
			<td align="center"><?php echo $data['branch']; ?></td>
		</tr>	
    </table>
	
<?php	
		}
	}
}

?>
