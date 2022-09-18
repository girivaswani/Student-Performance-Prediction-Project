<!DOCTYPE html>
<html lang="en">
<head>
	<title>Teacher</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/vesitlogo.png"/>
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
</head>

<?php
session_start();
include 'dbconnect.php';
?>


<body>
	<?php
		include 'teachernav.php';
	?>
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column5">Sr.No</th>
									<th class="cell100 column2">Branch</th>
									<th class="cell100 column2">Class Name</th>
									<th class="cell100 column2">Count</th>
									<th class="cell100 column6">Select</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php
                                    // $email=$_SESSION['eid'];
									$t_id=$_SESSION['teacher_id'];//Enter teacher id from login page using session 
                                    $sql = "SELECT c.class_name,c.branch,r.subject_id,count(Distinct s.student_id) as strength FROM relation r JOIN class c on r.class_name=c.class_name JOIN student s ON s.Class=c.class_name WHERE r.teacher_id=$t_id group by c.class_name";
                                    $result=mysqli_query($con,$sql);
									$my_id=1;
									// echo $t_id;
                                    while($row=mysqli_fetch_array($result)){
										// var_dump($row);
                                        // $id1=$row["TRAIN_NUMBER"];
										$class_id="'".$row['class_name']."'";
                                        echo '<tr class="row100 body">
                                        <td class="cell100 column5">'.$my_id.'</td>
                                        <td class="cell100 column2">'.$row["branch"].'</td>
                                        <td class="cell100 column2">'.$row["class_name"].' </td>
                                        <td class="cell100 column2">'.$row["strength"].'</td>
										
                                        <td class="cell100 column6"> <button type="button" class="btn btn-primary" onclick="select_and_pass('.$class_id.','.$row['subject_id'].')">Select</button></td>
                                    </tr>';
									$my_id+=1;
                                    }
									// var_dump($row);
                                ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});

		

		function post(path, parameters) {
                var form = $('<form></form>');

                form.attr("method", "post");
                form.attr("action", path);

                $.each(parameters, function(key, value) {
                    var field = $('<input></input>');

                    field.attr("type", "hidden");
                    field.attr("name", key);
                    field.attr("value", value);

                    form.append(field);
                });
                $(document.body).append(form);
                form.submit();

            }

		function select_and_pass(name,sub_id) {
			// console.log(name);
			// console.log(sub_id);
            post("selectstudent.php",{"class_name":name,"sub_id":sub_id});    
        }
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>