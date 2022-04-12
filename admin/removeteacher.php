
<?php
  
include('header.php');
include('title.php');

?>

<table align="center">
<form action="removeteacher.php" method="POST">
	<tr>
		<th>Name of the teacher</th>
		<td><input type="text" name="name" required="required"/></td>
	</tr>
	<tr>
		<th>Department</th>
		<td><input type="text" name="dept" required="required"/></td>
	</tr>
	<td colspan="2"><input type="submit" name="submit" value="Search"/></td>
</form>

<?php

include('../dbconnection.php');
$query1="SELECT * FROM `teacher`";
$run1=mysqli_query($con,$query1);

?>

<table align="center" width="80%" border="1" style="margin-top:10px;">
	 <tr>
		<th>No.</th>
		<th>Name</th>
		<th>Employee Id</th>
		<th>Department</th>
		<th>Delete Teacher record</th>
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
		<td align="center"><?php echo $data1['emp_id']; ?></td>
		<td align="center"><?php echo $data1['dept']; ?></td>
		<td align="center"><a href="teacherdeleteform.php?tid=<?php echo $data1['id']; ?>">Delete</a></td>
	</tr>	
	
<?php		

}		

if(isset($_POST['submit']))
{
	include('../dbconnection.php');
	$name=$_POST['name'];
	$dept=$_POST['dept'];
	$query="SELECT * FROM `teacher` WHERE `name` LIKE '%$name%' AND `dept` LIKE '$dept'";
	$run=mysqli_query($con,$query);
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
		<th>Employee Id</th>
		<th>Department</th>
		<th>Delete Teacher record</th>
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
			<td align="center"><?php echo $data['emp_id']; ?></td>
			<td align="center"><?php echo $data['dept']; ?></td>
			<td align="center"><a href="teacherdeleteform.php?tid=<?php echo $data['id']; ?>">Delete</a></td>
		</tr>	
    </table>		
		<?php	
		}
	}
}

?>
