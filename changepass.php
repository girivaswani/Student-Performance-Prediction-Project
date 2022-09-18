<?php
	include 'dbconnect.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change password</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style_login.css">
	<script type="text/javascript" src="js/nsp.js"></script>
</head>
<body style="background-image: linear-gradient(to right, #A2DDF6 , #008ECC);">
	<!-- Main Content -->
	<div class="container-fluid">
		<div class="row main-content bg-success text-center">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-university"></span></h2></span>
				<h4 class="company_title">Vivekanada Education Society's Institute Of Technology</h4>
			</div>
			<div class="col-md-8  col-xs-12 col-sm-12 login_form ">
				<div class="container-fluid">
					<div class="row">
						<h2>Change Password</h2>
					</div>
					<div class="row">
						<form onsubmit="return validate_changepass()" action="changepass.php" class="form-group" method="POST">
							<div class="row">
								<input type="password" name="password" id="password" class="form__input" placeholder="Current Password" required>
							</div>
    
							<div class="row">
								<input type="password" name="typepassword" id="typepassword" class="form__input" placeholder="New Password" required>
							</div>
							<div class="row">
								<input type="password" name="confirmpassword" id="confirmpassword" class="form__input" placeholder="Confirm Password" required>
							</div>
							<div class="row">
								<!-- <input name="changebtn" type="submit" value="Login" class="btn"> -->
                                <button name="changebtn" class="btn" >Update Password</button>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php
	if(isset($_POST['changebtn'])){

		// echo "Successful"
		// echo '<li class="nav-item ps-0 ps-xl-4 ms-2"><a class="nav-link fs-2 fw-medium" href="teacher_home.php">Select Class </a></li>';
		$username=$_SESSION['email'];
		$password = $_POST['password'];
		$type1 = $_SESSION['type1'];
		$typepassword = $_POST['typepassword'];
		$confirmpassword = $_POST['confirmpassword'];

		$sql = "SELECT * FROM $type1 WHERE Email='$username' and Password='$password';";
		$result=mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
		if (isset($row['Password'])){
			$passwordcheck=$row['Password'];
			if($password!=$passwordcheck){
				echo '<script> swal({
						title: "Invalid Password!",
						icon: "error",
						});</script>';
			}
			else{
				$sql2= "UPDATE $type1 SET Password='$confirmpassword' where Email='$username';";
				if(mysqli_query($con, $sql2)){
				echo '<script> swal({
					title: "Password Changed!",
					icon: "success",
					}).then(function(){
						window.location.href="index.php";
					});
					</script>';
					}
			}
		}
		else{
			echo '<script> swal({
				title: "Invalid Password!",
				icon: "error",
				});</script>';
		}
        
	}
	// else{
	// 	echo "not successful";
	// }
?>
