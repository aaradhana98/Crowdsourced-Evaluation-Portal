<!doctype html>
<html lang="en">
<head>
      <meta charset="utf-8"/>
	  <title>Evaluation Portal</title>
	  <link rel="stylesheet" href="../css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<div class="admintitle" align="center">
    <h4><a href="homepage.php" style="float:left; margin-left:30px; color:#fff; font-size:20px"></h4>Back</a></h4>
    <h4><a href="logout.php" style="float:right; margin-right:30px; color:#fff; font-size:20px"></h4>Logout</a></h4>
</div>
<body>
 <?php 
include('../dbconnection.php');
session_start();
$x= $_SESSION['username'];
$aid=$_SESSION['aid'];
$sql="SELECT `file`, `sub_id` FROM `teacher_upload` WHERE `id`='$aid' "; 
$run=mysqli_query($con,$sql);
$data=mysqli_fetch_assoc($run);
global $file,$sub_id;
$file=$data['file'];
$sub_id=$data['sub_id'];
$count=1;
 
?>
  <body>
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<iframe height="700" width="750" src="../images/teacher_upload/<?php echo $file ; ?>" style="margin-top:40px"></iframe>
        </div>
            <br />
            <br />
		<div class="col-md-6">
            <div class="form-group">
                 <form name="add_mc" id="add_mc" action="evaluate.php" method="POST">
                      <div class="table-responsive">
                           <table class="table table-bordered" id="dynamic_field" >
						   <tr>
								<th>Q No.</th><th>Max Marks</th><th>Marks Awarded</th><th>Remarks</th>
							</tr>
                                <tr>
								     <td><?php echo $count; ?></td>
									 <td><input style="margin-right:20px;" type="number" name="max_marks[]" placeholder="Enter Max Marks" min="0" max="100" class="form-control name_list" required="required" /></td>
                                     <td><input style="margin-right:20px;" type="number" name="marks[]" placeholder="Enter Marks" min="0" max="100" class="form-control name_list" required="required" /></td>
									 <td><input  style="margin-right:20px;" type="text" name="remarks[]" placeholder="Remarks" class="form-control name_list" required="required" /></td>
                                     <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                                </tr>
                           </table>
                           <tr>
						       <td align="center"><input type="submit" name="submit" value="Done !" /></td>
						   </tr>
    				  </div>
                 </form>
            </div>
        </div>
	</div>
</div>
  </body>
</html>
<script>
$(document).ready(function(){
    var i=1;
	var count=1;
    $('#add').click(function(){
         i++;
		 count++;
         $('#dynamic_field').append('<tr id="row'+i+'"><td>'+count+'</td><td><input type="number" name="max_marks[]" placeholder="Enter Max Marks" min="0" max="100" class="form-control name_list" /></td><td><input type="number" name="marks[]" placeholder="Enter Marks" min="0" max="100" class="form-control name_list" /></td><td><input type="text" name="remarks[]" placeholder="Remarks" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id"); 
        $('#row'+button_id+'').remove();
    });
    $('#submit').click(function(){          
        $.ajax({
            url:"name.php",
            method:"POST",
            data:$('#add_mc').serialize(),
            success:function(data)
            {
                alert(data);  
                $('#add_mc')[0].reset();  
            }
        });
    });
});
</script>
	<?php 

if(isset($_POST['submit']))
{
	$number = count($_POST['marks']);    
      for($i=0; $i<$number; $i++)  
      {  
           if(trim($_POST['marks'][$i] != ''))  
           {  
	            $max_marks=mysqli_real_escape_string($con,$_POST['max_marks'][$i]);
				$marks=mysqli_real_escape_string($con,$_POST['marks'][$i]);
				$remarks=mysqli_real_escape_string($con,$_POST['remarks'][$i]);
                $sql = "INSERT INTO `teacher_evaluate`(`username`, `sub_id`, `file`, `max_marks`, `marks`, `remarks`) VALUES ('$x','$sub_id','$file', '$max_marks', '$marks','$remarks')"; 
                $run=mysqli_query($con, $sql);  
           }  
      } ?>
    <script>
			alert('You have successfully evaluated the paper !');
			window.open('homepage.php','_self');
	</script>
    <?php	   
}
	


 

 