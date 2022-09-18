<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vesit</title>
	<link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
<!--===============================================================================================-->	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
<!--===============================================================================================-->
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
<!--===============================================================================================-->

<!-- <link rel="stylesheet" href="css/style.css"> -->
<script type="text/javascript" src="js/nsp.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<?php
	session_start();
    include 'dbconnect.php';
	$stud_id=$_SESSION['stud_id'];
    $sql1= "SELECT Subject_name from subject Natural join relation where class_name=(SELECT Class from student where Student_Id=$stud_id)";
	$sql2= "SELECT Marks1,Marks2,Tut_Subject from stu_marks where Student_Id=$stud_id";

	// echo $sql1;
    // while($row=mysqli_fetch_array($result1)){
     $result1=mysqli_query($con,$sql1);
     $result2=mysqli_query($con,$sql2);
     ?>

<body>
<?php
	include "studentnav.php"
?>
	<div class="limiter">
		<div class="container-table100 mt-5">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<form onsubmit="return Validate_marks();" action="stumarks.php" method="POST">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 columna center p-l-100">Subject</th>
									<th class="cell100 columna center p-l-100">Unit Test 1 Marks</th>
									<th class="cell100 columna center p-l-101">Unit Test 2 Marks</th>
									<th class="cell100 columna center">Extra Class for Subject</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php 
    							while($row1=mysqli_fetch_array($result1)){
									$row2=mysqli_fetch_array($result2)?>
								<tr class="row100 body center">
									
									<td class="cell100 columna center markstable"><input type="text" readonly class="center border-black m-auto" name="sub1[]" value="<?php echo $row1['Subject_name']; ?>"></td>
									<!-- <td class="cell100 columna center markstable"><textarea cols="20" style="overflow:hidden; resize:none;" wrap="hard" class="center border-black m-auto" name="sub1[]" ><?php /*echo $row1['Subject_name'];*/ ?></textarea></td> -->
									<!-- <td class="cell100 columna center markstable"></td> -->
									<?php
									// $domdoc = new DOMDocument();
									// $domdoc->loadHTML($htmlEle);
									 ?>
									<td class="cell100 columna markstable"><input type="number" class="center border-black" name="Marks1[]" value="<?php echo $row2['Marks1']; ?>" required ></td>
									<td class="cell100 columnab markstable"><input type="number" class="center border-black" name="Marks2[]" value="<?php echo $row2['Marks2']; ?>" required></td>
									
									<td class="cell100 columna center markstable"><select name="Class[]" class="p-10 border-black-1">
									<?php if($row2["Tut_Subject"]=="no"){
										echo '<option value="no" class="p-10">No</option>';
										echo '<option value="yes" class="p-10">Yes</option>';
									}
									else{
										echo '<option value="yes" class="p-10">Yes</option>';
										echo '<option value="no" class="p-10">No</option>';
									} ?>
										
										
									</select>
									</td>
								<?php } ?>
								</tr>	
								<tr class="row100 body">
									
									<td class="cell100 column1"></td>
									<td class="cell100 column4"><button class="btn btn-primary btn-block btn-lg pull-right" name="nextmark">Submit</button></td>
									<!-- <td class="cell100 column1"></td>
									<td class="cell100 column1"></td> -->
								</tr>
							</tbody>
						</table>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>


</body>
</html>

<?php
	if(isset($_POST['nextmark'])){
		
		// echo $domdoc-> getElementsByTagName('p')->item(0)->nodeValue;
        // echo "Inside";
        // var_dump($_POST);
		foreach ($_POST['sub1'] as $key => $value) {
            $subject=$_POST['sub1'][$key];
            $sql="SELECT subject_id from subject where subject_name='$subject'";
			$result=mysqli_query($con, $sql);
   			// echo "successful<br>";
    		$row = mysqli_fetch_array($result);
			// echo $row['subject_id'];
			// echo "<br>";
            // echo $_POST['Marks1'][$key];
			$ut1= $_POST["Marks1"][$key];
			$ut2= $_POST["Marks2"][$key];
			$tut = $_POST["Class"][$key];
			$subid= $row["subject_id"];
			$sql2 = "UPDATE stu_marks SET Marks1='$ut1', Marks2='$ut2', Tut_Subject='$tut' Where Subject_id='$subid' and Student_Id=$stud_id;";
			// echo $sql2;
			mysqli_query($con,$sql2);
        }
		echo "<script>window.location.href='predict.php'</script>";
	}
?>

