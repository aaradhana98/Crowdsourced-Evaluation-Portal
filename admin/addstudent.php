<!doctype html>
<html lang="en" style="background-image:url('../images/coffee.jpg')">
<head>
      <meta charset="utf-8"/>
	  <title>Registration</title>
	  <link rel="stylesheet" href="main.css">
</head>
<body>
   <h1 align="center">Student Registration</h1>
   <br><br>
   <form action="insertstudent.php" method="POST">
		<table align="center">
			<tr>
				<td>Name</td><td><input type="text" name="name" required="required"></td>
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
					<option value="mech">Materials and Mechanical Engineering</option>
					<option value="mme">Metallurgical Engineering</option>
					<option value="pe">Production Engineering</option>
				</select>
			    </td>
			</tr>
			<tr>
				<td>Year</td>
			    <td>
				<select name="year" required="required" >
				    <option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
			    </td>
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





