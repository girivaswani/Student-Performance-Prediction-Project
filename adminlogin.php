<?php
	include 'dbconnect.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Yinka Enoch Adedokun">
	<title>Admin Login</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style_login.css">
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
						<h2>Log In</h2>
					</div>
					<div class="row">
						<form action="adminlogin.php" class="form-group" method="POST">
							<div class="row">
								<input type="text" name="username" id="username" class="form__input" placeholder="User Name" required>
							</div>
							<div class="row">
								<input type="password" name="password" id="password" class="form__input" placeholder="Password" required>
							</div>
							<div class="row">
								<input name="adminloginbtn" type="submit" value="Login" class="btn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php
	if(isset($_POST['adminloginbtn'])){
		// echo "Successful";
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE User='$username' and Password='$password';";
		$result=mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        if(mysqli_num_rows($result)==1){
			$_SESSION['name']=$row['User'];
            echo '<script> window.location.href="addsubject.php";</script>';
        }
        else{
            echo '<script> swal({
                title: "Login Failed!",
                text: "Please Enter Valid Credentials..",
                icon: "error",
                 });</script>';
        }
	}
	// else{
	// 	echo "not successful";
	// }
?>
