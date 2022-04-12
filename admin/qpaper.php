<?php 
  include('header.php');
  include('title.php');
?>
   <h1 align="center">Upload Question Paper</h1>
   <br><br>
     <form action="qpaper.php" method="POST"  enctype="multipart/form-data">
		<table align="center">
			<tr>  
			      <td>Date of examination</td>
				  <td>
				   <input type="date" name="doe" required="required">
				  </td>
			</tr>
			<tr>
				<td>Subject Id</td><td><input type="text" name="sub_id" required="required"></td>
			</tr>
			<tr>
				<td>Examination</td>
			    <td>
				<select name="exam" required="required">
				    <option value="mid">Mid Semester</option>
					<option value="end">End Semester</option>
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
	$noq=$_POST['noq'];
	$sub_id=$_POST['sub_id'];
	$doe=$_POST['doe'];
	$file_name=$_FILES['img']['name'];
	$temp_file_name=$_FILES['img']['tmp_name'];
	 move_uploaded_file($temp_file_name,"../images/question papers/$file_name");
	 $sql="INSERT INTO `question_paper`(`sub_id`, `doe`, `q_file`,`no_of_q`) VALUES ('$sub_id','$doe', '$file_name', $noq)";
	 $run=mysqli_query($con,$sql);
	 if($run)
		echo 'Upload Successful :)';
}
?>




