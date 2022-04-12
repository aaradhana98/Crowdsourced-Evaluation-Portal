
<?php
  
include('header.php');
include('title.php');


?>

<html>
<body>
   <h1 align="center">Upload Answer Sheet</h1>
   <br><br>
   <form action="upload.php" method="POST"  enctype="multipart/form-data">
		<table align="center">
			<tr>
				<td>Name of the student</td><td><input type="text" name="name" required="required"></td>
			</tr>
			<tr>
				<td>Registration No.</td><td><input type="text" name="regd_no" required="required"></td>
			</tr>
			<tr>
				<td>Branch</td>
			    <td>
				<select name="branch" required="required" >
				    <option value="chem">Chemical Engineering</option>
					<option value="civ">Civil Engineering</option>
					<option value="cse">Computer Science and Engineering</option>
					<option value="ee">Electrical Engineering</option>
					<option value="eee">Electrical and Electronics Engineering</option>
					<option value="etc">Electrical and Telecommunication Engineering</option>
					<option value="it">Information Technology</option>
					<option value="mech">Mechanical Engineering</option>
					<option value="mme">Metallurgical Engineering</option>
					<option value="pe">Production Engineering</option>
				</select>
			    </td>
			</tr>
			<tr>
				<td>Subject Id</td><td><input type="text" name="sub_id" required="required"></td>
			</tr>
			<tr>
				<td>Year</td>
			    <td>
				<select name="year" required="required" >
				    <option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
				</select>
			    </td>
			</tr>
			<tr>  
			      <td>Date of examination</td>
				  <td>
				   <input type="date" name="doe" required="required">
				  </td>
			</tr>
			<tr>  
			      <td>Answer sheet to be evaluated by</td>
				  <td>
				  <select name="evaluator" required="required">
					<option value="teacher">Teacher</option>
					<option value="ta">Teacher Assistant</option>
					<option value="student">Student</option>
				  </select>
				  </td>
			</tr>
            <tr>			
				<td colspan="2" align="center"><input type="file" name="img" required="required"/></td>
			</tr>
			<tr>			
				<td colspan="2" align="center"><input type="submit" name="submit" value="Upload"/></td>
			</tr>
		</table>
	</form>
</body>
</html>	

<?php
if(isset($_POST['submit']))
{
	include('../dbconnection.php');
	$name=$_POST['name'];
	$regd_no=$_POST['regd_no'];
	$branch=$_POST['branch'];
	$sub_id=$_POST['sub_id'];
	$year=$_POST['year'];
	$doe=$_POST['doe'];
	$evaluator=$_POST['evaluator'];
	$file_name=$_FILES['img']['name'];
	$temp_file_name=$_FILES['img']['tmp_name'];
	if($evaluator=='teacher')
	{
	 move_uploaded_file($temp_file_name,"../images/teacher_upload/$file_name");
	 $sql="INSERT INTO `teacher_upload`(`file`, `sub_id`, `doe`, `student_name`, `branch`, `regd_no`) VALUES ('$file_name','$sub_id','$doe', '$name','$branch','$regd_no')";
	 $run=mysqli_query($con,$sql);
	 if($run)
		echo 'Upload Successful :)';
	}
	else if($evaluator=='ta')
	{
     move_uploaded_file($temp_file_name,"../images/ta_upload/$file_name");
	 $sql="INSERT INTO `ta_upload`(`file`, `sub_id`, `doe`, `student_name`, `branch`, `regd_no`) VALUES ('$file_name','$sub_id','$doe', '$name','$branch','$regd_no')";
	 $run=mysqli_query($con,$sql);
	 if($run)
		echo 'Upload Successful :)';
	}
	else
	{
	 move_uploaded_file($temp_file_name,"../images/student_upload/$file_name");
	 $sql="INSERT INTO `student_upload`(`file`, `sub_id`, `doe`, `student_name`, `branch`, `year`, `regd_no`) VALUES ('$file_name','$sub_id','$doe', '$name','$branch', '$year', '$regd_no')";
	 $run=mysqli_query($con,$sql);
	if($run)
		echo 'Upload Successful :)';
	}
}
?>




