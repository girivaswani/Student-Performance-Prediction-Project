<?php
	include 'dbconnect.php';
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Vesit</title>
		<link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
	<?php
		include "studentnav.php"
	?>
		<div class="wrapper" style="background-image: linear-gradient(to right, #A2DDF6 , #008ECC);">
			<div class="inner mt-5">
				<form action="family.php" method="POST">
					<h3>Enter Your Family Details</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Family Size:</label>
							<div class="form-holder">
								<i class="fa fa-users"></i>
								<input type="number" name="famsize" class="form-control" id="famsize" required>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Parent Cohabitation Status</label>
							<div class="form-holder select">
								<select name="Pstatus" id="Pstatus" class="form-control" required>
									<option value="T">Living Together</option>
									<option value="A">Living Apart</option>
								</select>
								<i class="fa fa-group"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Mother's Job:</label>
							<div class="form-holder select">
							    
								<select name="Mjob" id="Mjob" class="form-control" required>
									<option value="Teacher">Teacher</option>
									<option value="Health">Healthcare Related Services</option>
									<option value="Servies">Civil Servies</option>
									<option value="At Home">At Home</option>
									<option value="Other">Other</option>
								</select>
								<i class="fa fa-briefcase"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Father's Job:</label>
							<div class="form-holder select">
								<select name="Fjob" id="Fjob" class="form-control" required>
									<option value="Teacher">Teacher</option>
									<option value="Health">Healthcare Related Services</option>
									<option value="Servies">Civil Services</option>
									<option value="At Home">At Home</option>
									<option value="Other">Other</option>
								</select>
								<i class="fa fa-briefcase"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Mother's Education:</label>
							<div class="form-holder select">
								<select name="Medu" id="Medu" class="form-control" required>
									<option value="0">None</option>
									<option value="1">Primary Education</option>
									<option value="2">5th to 9th</option>
									<option value="3">Secondary Education</option>
									<option value="4">Higher Education</option>
								</select>
								<i class="fa fa-university"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Father's Education:</label>
							<div class="form-holder select">
								<select name="Fedu" id="Fedu" class="form-control" required>
									<option value="0">None</option>
									<option value="1">Primary Education</option>
									<option value="2">5th to 9th</option>
									<option value="3">Secondary Education</option>
									<option value="4">Higher Education</option>					
								</select>
								<i class="fa fa-university"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Guardian:</label>
							<div class="form-holder select">
								<select name="guardian" id="guardian" class="form-control" required>
									<option value="Mother">Mother</option>
									<option value="Father">Father</option>
									<option value="Other">Other</option>
								</select>
								<i class="fa fa-users"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Family educational support:</label>
							<div class="form-holder select">
								<select name="famsup" id="famsup" class="form-control" required>
									<option value="1">Yes</option>
                                    <option value="0">No</option>									
                                </select>
                                <i class="fa fa-street-view"></i>								
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">How would you rate your family relation: <h5 style="font-size: 0.65rem;">("1"->Bad and "5"->Excellent)</h5></label>
						</div>
						<div class="form-wrapper">
						    <div class="form-holder select">
								<select name="famrel" id="famrel" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
                                    <option value="5">5</option>
								</select>
								<i class="fa fa-bar-chart"></i>
				            </div>
						</div>
				    </div>
				  	<div class="form-end">
				    	
						<div class="button-holder">
							<button name="nextrem">Next</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>
<?php
	if(isset($_POST['nextrem'])){
		$famsize = $_POST['famsize'];
		$Pstatus = $_POST['Pstatus'];
		$Mjob = $_POST['Mjob'];
		$Fjob = $_POST['Fjob'];
		$Medu = $_POST['Medu'];
		$Fedu = $_POST['Fedu'];
		$guardian = $_POST['guardian'];
		$famsup = $_POST['famsup'];
		$famrel = $_POST['famrel'];
		$stud_id=$_SESSION['stud_id'];
		$sql = "UPDATE student SET Family_Size='$famsize',Pstatus='$Pstatus', Mjob='$Mjob', Fjob='$Fjob',
				Medu='$Medu', Fedu='$Fedu', Guardian='$guardian', Famsup='$famsup', Famrel='$famrel' where Student_Id=$stud_id;";
		mysqli_query($con, $sql);
		// header("Location:remaining.php");
		// exit();
		echo "<script>window.location.href='remaining.php'</script>";
	}
	// else{
	// 	echo "not successful";
	// }
?>
