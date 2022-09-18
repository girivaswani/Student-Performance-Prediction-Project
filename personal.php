<?php
	session_start();
	$stud_id=$_SESSION['stud_id'];
	include 'dbconnect.php';
	$sql1 = "SELECT Name,Email,Class,Roll_No,Gender FROM student where Student_Id=$stud_id;";
	$result1=  mysqli_query($con, $sql1);
	$row1 = mysqli_fetch_array($result1);
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
			<div class="inner">
				<form action="personal.php" method="POST">
					<h3>Enter Your Details</h3>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Name:</label>
							<div class="form-holder">
								<i class="zmdi zmdi-account-o"></i>
								<input type="text" class="form-control" id="name" value="<?php echo $row1['Name']; ?>" disabled>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Email:</label>
							<div class="form-holder">
								<i style="font-style: normal; font-size: 15px;">@</i>
								<input type="email" class="form-control" id="email" value="<?php echo $row1["Email"]; ?>" disabled>
							</div>
						</div>
					</div>
					<div class="form-group">
							<div class="form-wrapper">
								<label for="">Class:</label>
									<div class="form-holder">
							    	<i class="fa fa-copyright" aria-hidden="true"></i>
								<input type="text" class="form-control" id="class" value="<?php echo $row1["Class"]; ?>" disabled>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Roll-No:</label>
							<div class="form-holder">
							    <i class="fa fa-id-card" aria-hidden="true"></i>
								<input type="number" class="form-control" id="roll-no" value="<?php echo $row1["Roll_No"]; ?>" disabled>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="form-wrapper">
							<label for="">Address:</label>
							<div class="form-holder select">
								<select name="address" id="address" class="form-control" required>
									<option value="urban">Urban</option>
									<option value="rural">Rural</option>
								</select>
								<i class="zmdi zmdi-pin"></i>
							</div>
						</div>
						<div class="form-wrapper">
							<label for="">Gender:</label>
							<div class="form-holder select">
								<input type="text" class="form-control" id="gender" value="Male" value="<?php echo $row1["Gender"]; ?>" disabled>
								<i class="zmdi zmdi-face"></i>
							</div>
						</div>
					</div>
					<div class="form-end">
						<div class="button-holder">
							<button name="next">Next</button>
						</div>
						
					</div>
				</form>
			</div>
		</div>
		
	</body>
</html>
<?php
	if(isset($_POST['next'])){
		// echo "Successful";
		$address = $_POST['address'];
		$sql = "UPDATE student SET Locality='$address' where Student_Id=$stud_id;";
		mysqli_query($con, $sql);
		// header("Location:family.php");
		// exit();
		echo "<script>window.location.href='family.php'</script>";
	}
	else{
		// echo "not successful";
	}
?>
