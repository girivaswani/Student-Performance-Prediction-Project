<?php include "dbconnect.php"; 
    $sql="SELECT class_name from class;";
    $result=mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Vesit</title>
<link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/sidebar_style.css">
<link rel="stylesheet" href="css/styles_nsp.css">
<script type="text/javascript" src="js/nsp.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body style="background-image: linear-gradient(to right, #A2DDF6 , #008ECC);">
<div class="wrapper d-flex align-items-stretch">
<nav id="sidebar">
				<!-- <div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	        </button>
        </div> -->
	  		<div class="img bg-wrap text-center py-4" >
	  			<div class="user-logo">
	  				<div class="img" style="background-image: url(images/icons/vesitlogo1.png);"></div>
	  				<h3>VESIT Admin</h3>
					  <h3></h3>
	  			</div>
	  		</div>
			  <!-- <div class="img" ></div> -->
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="addsubject.php"><span class="fa fa-book mr-3"></span> Add Subject</a>
          </li>
          <li>
              <a href="addclass.php"><span class="fa fa-university mr-3"></span> Add Class</a>
          </li>
          <li>
            <a href="addteacher.php"><span class="fa fa-male mr-3"></span> Add Teacher</a>
          </li>
          <li class="active">
            <a href="addstudent.php"><span class="fa fa-user-circle-o mr-3"></span>Add Student</a>
          </li>
          <li>
            <a href="addrelation.php"><span class="fa fa-list-ul mr-3"></span>Assign Class</a>
          </li>
          <li>
            <a href="logout.php"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
          </li>
        </ul>

    	</nav>
<div id="content" class="p-4 p-md-5 pt-5">

<div class="signup-form" >
    <form onsubmit="return validate_student()" action="addstudent.php" method="POST">
		<h3>Student Details</h3>
        <div class="form-group">
        	<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-address-book"></span>
					</span>                    
				</div>
				<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-at"></i>
					</span>                    
				</div>
				<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">
			</div>
        </div>
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-male"></i>&nbsp;&nbsp;
					</span>                    
				</div>
                <select class="form-control" name="gender" id="gender" required="required">
                <option value="selected" selected="selected">Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                </select>
			</div>
        </div>
        <div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-university"></i>&nbsp;
					</span>                    
				</div>
				<select class="form-control" name="class" id="class" required="required">
                <option value="selected" selected="selected">Class</option>
                <?php 
    			while($row=mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['class_name']; ?>"><?php echo $row['class_name']; ?></option>
                <?php } ?>
                </select>
			</div>
        </div>
        <div class="form-group">
        	<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<span class="fa fa-hashtag "></span>
					</span>                    
				</div>
				<input type="number" class="form-control" id="roll" name="roll" placeholder="Roll Number" required>
			</div>
        </div>
        
		<div class="form-group">
			<div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">
						<i class="fa fa-lock"></i>&nbsp;&nbsp;
					</span>                    
				</div>
				<input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
                </select>
			</div>
        </div>

        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary btn-lg" name="addstubtn">Add Student</button>
        </div>
    </form>
</div>
</div>
</div>
<div class="modal fade" id="exampleModal" 
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                            Student Inserted Successfully!
                        </h5>
                          
                        <button type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close">
  
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
				
                </div>
            </div>
        </div>
</body>
</html>
<?php
	if(isset($_POST['addstubtn'])){
		// echo "Successful";
        // var_dump($_POST);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $class = $_POST['class'];
        $password = $_POST['password'];
        $roll = $_POST['roll'];
		$sql1 = "INSERT into student (Name, Email, Password, Class, Roll_No, Gender)
                            VALUES ('$name','$email','$password','$class',$roll,'$gender');";
        // echo $sql1;
		if(mysqli_query($con, $sql1)){
			$sql2= "SELECT subject_id from relation where class_name='$class';";
			$result2=mysqli_query($con, $sql2);
			$sql3= "SELECT Student_Id  from student where Email='$email';";
			$result3=mysqli_query($con, $sql3);
			$row3 = mysqli_fetch_array($result3);
			$student_id1=$row3['Student_Id'];
			while($row2=mysqli_fetch_array($result2)){
				$subject_id1= $row2['subject_id'];
				$sql4= "INSERT into stu_marks (Student_Id,Subject_id)values($student_id1,$subject_id1)";
				// echo $sql4;
				mysqli_query($con,$sql4);
			}

		}
		// else{
		// 	echo  "false";
		// }
		echo "<script>$('#exampleModal').modal()</script>";
	}
	// else{
	// 	echo "not successful";
	// }
?>
