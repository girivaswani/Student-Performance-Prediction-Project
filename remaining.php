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
				<form action="remaining.php" method="POST">
					<h3>Enter Your Personal Details</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Internet:</label>
							<div class="form-holder select">
								<select name="internet" id="internet" class="form-control" required>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<i class="fa fa-wifi"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">In a Romantic Relationship:</label>
							<div class="form-holder select">
								<select name="romantic" id="romantic" class="form-control" required>
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select>
								<i class="fa fa-heart"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Home to College travel time:</label>
							<div class="form-holder select">
							    
								<select name="traveltime" id="traveltime" class="form-control" required>
									<option value="1">1-15 minutes</option>
									<option value="2">15-30 minutes</option>
									<option value="3">1/2-1 hour</option>
									<option value="4">More Than 1 hour</option>
								</select>
								<i class="fa fa-clock-o"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Weekly Study Time:</label>
							<div class="form-holder select">
								<select name="studytime" id="studytime" class="form-control" required>
									<option value="1">Less than 2 hours</option>
									<option value="2">2 to 5 hours</option>
									<option value="3">5 to 10 hours</option>
									<option value="4">4 to 10 hours</option>									
								</select>
								<i class="fa fa-clock-o"></i>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
						    <label for="">Free Time After School:<h5 style="font-size: 0.65rem;">("1"->Very Low and "5"->Very High)</h5></label>
							<div class="form-holder select">
								<select name="freetime" id="freetime" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
                                    <option value="5">5</option>
								</select>
								<i class="fa fa-clock-o"></i>
				            </div>
						</div>
						<div class="form-wrapper">
						    <label for="">Going Out with Friends:<h5 style="font-size: 0.65rem;">("1"->Very Low and "5"->Very High)</label>
							<div class="form-holder select">
								<select name="goout" id="goout" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
                                    <option value="5">5</option>
								</select>
								<i class="fa fa-clock-o"></i>
				            </div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
						    <label for="">Number of Past Class Failures:</label>
							<div class="form-holder select">
								<select name="failures" id="failures" class="form-control" required>
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4 or more than 4</option>
								</select>
								<i class="fa fa-graduation-cap"></i>
				            </div>
						</div>
						<div class="form-wrapper">
							<label for="">Extra Educational support:</label>
							<div class="form-holder select">
								<select name="schoolsup" id="schoolsup" class="form-control" required>
									<option value="yes">Yes</option>
                                    <option value="no">No</option>									
                                </select>
                                <i class="fa fa-street-view"></i>								
							</div>
						</div>
					</div>
				    <div class="form-group">
						<div class="form-wrapper">
							<label for="">Reason to choose this college:</label>
							<div class="form-holder select">
								<select name="reason" id="reason" class="form-control" required>
									<option value="home">Close to Home</option>
                                    <option value="reputaion">Reputation</option>		
									<option value="course">Course Preference</option>
                                    <option value="other">Other</option>							
                                </select>
                                <i class="fa fa-book"></i>								
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">wants to take higher education:</label>
							<div class="form-holder select">
								<select name="higher" id="higher" class="form-control" required>
									<option value="yes">Yes</option>
                                    <option value="no">No</option>									
                                </select>
                                <i class="fa fa-book"></i>								
							</div>
						</div>
				    </div>
				    <div class="form-group">
						<div class="form-wrapper">
						    <label for="">current health status:<h5 style="font-size: 0.65rem;">("1"->Very bad and "5"->Very Good)</label>
							<div class="form-holder select">
								<select name="health" id="health" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<i class="fa fa-male"></i>
				            </div>
						</div>
						<div class="form-wrapper">
							<label for="">Absences:</label>
							<div class="form-holder">
							    <i class="fa fa-user-times" aria-hidden="true"></i>
								<input type="number" name="absences" class="form-control" id="absences" required>
							</div>
						</div>
				    </div>
				    <div class="form-group">
						<div class="form-wrapper">
						    <label for="">workday alcohol consumption:<h5 style="font-size: 0.65rem;">("1"->Very Low and "5"->Very High)</label>
							<div class="form-holder select">
								<select name="Dalc" id="Dalc" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<i class="fa fa-beer"></i>
				            </div>
						</div>
						<div class="form-wrapper">
						    <label for="">weekend alcohol consumption<h5 style="font-size: 0.65rem;">("1"->Very Low and "5"->Very High):</label>
							<div class="form-holder select">
								<select name="Walc" id="Walc" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<i class="fa fa-beer"></i>
				            </div>
						</div>
				    </div>
				    <div class="form-group">
						<div class="form-wrapper">
							<label for="">extra-curricular activities:</label>
							<div class="form-holder select">
								<select name="activities" id="activities" class="form-control" required>
									<option value="yes">Yes</option>
                                    <option value="no">No</option>									
                                </select>
                                <i class="fa fa-paint-brush"></i>								
							</div>
						</div>
				    </div>
				  	<div class="form-end">
				    	
						<div class="button-holder">
							<button name="nextmarks">Next</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
<?php
	if(isset($_POST['nextmarks'])){
		$internet = $_POST['internet'];
		$romantics = $_POST['romantic'];
		$traveltime = $_POST['traveltime'];
		$studytime = $_POST['studytime'];
		$freetime = $_POST['freetime'];
		$goout = $_POST['goout'];
		$failures = $_POST['failures'];
		$schoolsup = $_POST['schoolsup'];
		$reason = $_POST['reason'];
		$higher = $_POST['higher'];
		$health = $_POST['health'];
		$absences = $_POST['absences'];
		$Dalc = $_POST['Dalc'];
		$Walc = $_POST['Walc'];
		$activities = $_POST['activities'];
		$stud_id=$_SESSION['stud_id'];


		$sql = "UPDATE student SET Internet='$internet', Relationship='$romantics', Traveltime=$traveltime, Studytime=$studytime,
				Freetime=$freetime, Goout=$goout, Failures=$failures, Extrasup='$schoolsup', Reason='$reason', Higher='$higher',
				 Health=$health, Absences=$absences, Dalc=$Dalc, Walc=$Walc, Activities='$activities' where Student_Id=$stud_id;";
		echo $sql;
		// i
		mysqli_query($con, $sql);
		
		// header("Location:remaining.php");
		// exit();
		echo "<script>window.location.href='stumarks.php'</script>";
		
	}
	// else{
	// 	echo "not successful";
	// }
?>
