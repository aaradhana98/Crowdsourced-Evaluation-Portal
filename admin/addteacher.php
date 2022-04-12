<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
	  <title>Registration</title>
	  <link rel="stylesheet" href="main.css">
</head>
<body>
   <h1 align="center">Teacher Registration</h1>
   <br><br>
   <form action="insertteacher.php" method="POST">
		<table align="center">
			<tr>
				<td>Name</td><td><input type="text" name="name" required="required"></td>
			</tr>
			<tr>
				<td>Department</td>
				<td>
				<select name="dept" required="required" >
				    <option value="chem">Chemical Engineering</option>
					<option value="civ">Civil Engineering</option>
					<option value="cse">Computer Science and Engineering</option>
					<option value="ee">Electrical Engineering</option>
					<option value="eee">Electrical and Electronics Engineering</option>
					<option value="etc">Electrical and Telecommunication Engineering</option>
					<option value="it">Information Technology</option>
					<option value="mech">Mechanical Engineering</option>
					<option value="mme">Materials Metallurgical Engineering</option>
					<option value="pe">Production Engineering</option>
					<option value="hum">Humanities</option>
					<option value="chm">Chemistry</option>
					<option value="math">Mathematics</option>
					<option value="phy">Physics</option>
				</select>
			    </td>
			</tr>
			<tr>
				<td>Employee Id</td><td><input type="text" name="emp_id" required="required"></td>
			</tr>
			<tr>
				<td>Set Username</td><td><input type="text" name="username" required="required"></td>
			</tr>
			<tr>
				<td>Set Password</td><td><input type="password" name="password" required="required"></td>
			</tr>
            <tr>			
				<td colspan="2" align="center"><input type="submit" value="Add"></td>
			</tr>
		</table>
	</form>  
   
	 
</body>
</html>





