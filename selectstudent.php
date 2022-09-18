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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $class=$_POST['class_name'];
	$_SESSION['class_name']=$class;
	$_SESSION['sub_id']=$_POST['sub_id'];
	$sub_id=$_SESSION['sub_id'];
	$pass_class="'".$class."'";
}
else{
    echo "No";
}
?>


<body style="max-width: 100%;">
	<?php  
		include 'teachernav.php';
		// $F="['F']";
		// $O="['O']";
		// $A="['A']";
		// $B="['B']";
		$sqlf='Select Count(*) from stu_marks where Student_Id in (Select Student_Id from student where class= '.$pass_class.') and Subject_id='.$sub_id.' and pred_mark LIKE "%F%";';
		$sqlo='Select Count(*) from stu_marks where Student_Id in (Select Student_Id from student where class= '.$pass_class.') and Subject_id='.$sub_id.' and pred_mark LIKE "%O%";';
		$sqla='Select Count(*) from stu_marks where Student_Id in (Select Student_Id from student where class= '.$pass_class.') and Subject_id='.$sub_id.' and pred_mark LIKE "%A%";';
		$sqlb='Select Count(*) from stu_marks where Student_Id in (Select Student_Id from student where class= '.$pass_class.') and Subject_id='.$sub_id.' and pred_mark LIKE "%B%";';

		$sqlstud='Select count(*) from Student where class='.$pass_class;
		
		$resf=mysqli_query($con,$sqlf);
		$reso=mysqli_query($con,$sqlo);
		$resa=mysqli_query($con,$sqla);
		$resb=mysqli_query($con,$sqlb);

		$resstud=mysqli_query($con,$sqlstud);

		$rowf=mysqli_fetch_row($resf)[0];
		$rowo=mysqli_fetch_row($reso)[0];
		$rowa=mysqli_fetch_row($resa)[0];
		$rowb=mysqli_fetch_row($resb)[0];

		$total=mysqli_fetch_row($resstud)[0];
		// echo $total;
		// echo $rowf;
		// var_dump($rowf);
		$sum=$rowf+$rowa+$rowb+$rowo;
		// echo $sum;
		

		$pf=($rowf*100)/$sum;
		// echo $pf;
		$po=($rowo*100)/$sum;
		$pa=($rowa*100)/$sum;
		$pb=($rowb*100)/$sum;

		$ps=($sum*100)/$total;


		$dataPoints = array(
			array("y"=>$pf,"name"=>"Fail","exploded"=>"true","color"=>"red"),
			array("y"=>$pb,"name"=>"Just Pass","color"=>"orange"),
			array("y"=>$pa,"name"=>"Average","color"=>"skyblue"),
			array("y"=>$po,"name"=>"Excellent","color"=>"lightgreen")
		);

		$dataPoint1 = array(
			array("y"=>$ps,"name"=>"Predicted","color"=>"gray"),
			array("y"=>100-$ps,"name"=>"Not Predicted","color"=>"lightgray")
		);
		
	?>
	<div class="row mt-5" style="max-width: 100%;">
	<div id="chartContainer1" style="height: 400px; width: 45%;" class="col-md-6"></div>
	<div id="chartContainer" style="height: 400px; width: 45%;" class="col-md-6"></div>
	</div>
	<div class="limiter mt-5">
		<div class="container-table100" style="min-height:30vh;">
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column5">Roll No</th>
									<th class="cell100 column2">Name</th>
									<th class="cell100 column2">Email Id</th>
									<th class="cell100 column2">Gender</th>
									<th class="cell100 column6">Predicted Grades</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
							<?php
                                    // $email=$_SESSION['eid'];
									$f="['F']";
									$c='"';
									$t_id=2;//Enter teacher id from login page using session 
                                    $sql = "SELECT Student_Id,Name,Email,Roll_No,Gender from student WHERE student_id in (SELECT Student_Id from stu_marks WHERE pred_mark=$c".$f."$c and subject_id=$sub_id) and class='".$class."' ORDER BY Roll_No ASC;";
                                    $result=mysqli_query($con,$sql);
									$my_id=0;
									$rows=mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
                                        // $id1=$row["TRAIN_NUMBER"];
										if($my_id==$rows-1){
											echo '<tr class="row100 body" style="border-bottom:dashed; border-color:#808080">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> F </td>
										</tr>';
										}
										else{
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> F </td>
										</tr>';
										}
									$my_id+=1;
                                    }

									$f="['B']";
									$c='"';
									$t_id=2;//Enter teacher id from login page using session 
                                    $sql = "SELECT Student_Id,Name,Email,Roll_No,Gender from student WHERE student_id in (SELECT Student_Id from stu_marks WHERE pred_mark=$c".$f."$c and subject_id=$sub_id) and class='".$class."' ORDER BY Roll_No ASC;";
                                    $result=mysqli_query($con,$sql);
									$my_id=0;
									$rows=mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
                                        // $id1=$row["TRAIN_NUMBER"];
										if($my_id==$rows-1){
											echo '<tr class="row100 body" style="border-bottom:dashed; border-color:#808080">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> B </td>
										</tr>';
										}
										else{
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> B </td>
										</tr>';
										}
									$my_id+=1;
                                    }


									$f="['A']";
									$c='"';
									$t_id=2;//Enter teacher id from login page using session 
                                    $sql = "SELECT Student_Id,Name,Email,Roll_No,Gender from student WHERE student_id in (SELECT Student_Id from stu_marks WHERE pred_mark=$c".$f."$c and subject_id=$sub_id) and class='".$class."' ORDER BY Roll_No ASC;";
                                    $result=mysqli_query($con,$sql);
									$my_id=0;
									$rows=mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
                                        // $id1=$row["TRAIN_NUMBER"];
										if($my_id==$rows-1){
											echo '<tr class="row100 body" style="border-bottom:dashed; border-color:#808080">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> A </td>
										</tr>';
										}
										else{
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> A </td>
										</tr>';
										}
									$my_id+=1;
                                    }


									$f="['O']";
									$c='"';
									$t_id=2;//Enter teacher id from login page using session 
                                    $sql = "SELECT Student_Id,Name,Email,Roll_No,Gender from student WHERE student_id in (SELECT Student_Id from stu_marks WHERE pred_mark=$c".$f."$c and subject_id=$sub_id) and class='".$class."' ORDER BY Roll_No ASC;";
                                    $result=mysqli_query($con,$sql);
									$my_id=0;
									$rows=mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
                                        // $id1=$row["TRAIN_NUMBER"];
										if($my_id==$rows-1){
											echo '<tr class="row100 body" style="border-bottom:dashed; border-color:#808080">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> O </td>
										</tr>';
										}
										else{
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> O </td>
										</tr>';
										}
									$my_id+=1;
                                    }


									$t_id=2;//Enter teacher id from login page using session 
                                    $sql = "SELECT Student_Id,Name,Email,Roll_No,Gender from student WHERE student_id in (SELECT Student_Id from stu_marks WHERE pred_mark IS NULL and subject_id=$sub_id) and class='".$class."' ORDER BY Roll_No ASC;";
									// $sql="SELECT pred_mark from stu_marks where student_id=3";
									// echo $sql;
                                    $result=mysqli_query($con,$sql);
									$my_id=0;
									$rows=mysqli_num_rows($result);
                                    while($row=mysqli_fetch_array($result)){
										$email1="'".$row['Email']."'";
                                        // $id1=$row["TRAIN_NUMBER"];
										if($my_id==$rows-1){
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> <button type="button"class="btn btn-primary" onclick="mail_stud('.$email1.')">Mail</button></td>
										</tr>';
										}
										else{
											echo '<tr class="row100 body">
											<td class="cell100 column5">'.$row['Roll_No'].'</td>
											<td class="cell100 column2">'.$row["Name"].'</td>
											<td class="cell100 column2">'.$row["Email"].' </td>
											<td class="cell100 column2">'.$row["Gender"].'</td>
											<td class="cell100 column6"> <button type="button" class="btn btn-primary" onclick="mail_stud('.$email1.')">Mail</button></td>
										</tr>';
										}
									$my_id+=1;
                                    }
                                ?>
							</tbody>
						</table>
					</div>
					

				</div>
			</div>
		</div>
	</div>


	<a href="export.php"><button type="button" class="btn btn-lg btn-success" style="margin-left:48%;">Export</button></a>

	<div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static"
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                            Student Data
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
  
                    <div class="modal-body">
  
                        <!-- Data passed is displayed
                            in this part of the 
                            modal body -->
							<p id="modal_body"></p>
							
                        
                    </div>
                </div>
            </div>
        </div>



	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

		$("#submit").click(function(){
			console.log("YEs");
			$("#examplemodal").modal({
				backdrop: 'static',
				keyboard: false
			});
		});
		// console.log(performance.navigation.type);
		function predict(stud_id,sub_id){
			$("#modal_body").html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
			console.log("Predict");
			console.log(stud_id);
			console.log(sub_id);
			$.ajax({
			type:"post",
            url:"getpredictedvalue.php", 
			// url:"http://localhost/SPP/getpredictedvalue.php",
			data:{sub_id:sub_id,stud_id:stud_id},
			success:function(result){
			console.log(result);
			if(result=="['A']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>A</b>. Student is performing well in this subject.";
				$("#modal_body").html(res);
			}
			else if(result=="['B']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>B</b>. Student is not performing well in this subject.Try to scope up in this subject";
				$("#modal_body").html(res);
			}
			else if(result=="['F']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>F</b>. Student needs to work hard on this subject.";
				$("#modal_body").html(res);
			}
			else if(result=="['O']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>O</b>. Student has perfect knowledge for this subject.";
				$("#modal_body").html(res);
			}
			else{
				$("#modal_body").html(result);
			}
			
			}
			});


		}


		function mail_stud(to){
			console.log("Mail");
			window.open("https://mail.google.com/mail/u/0/?fs=1&tf=cm&to="+to,'_blank');

		}

		function select_and_pass(id,class_name) {
            console.log(id);
			console.log(class_name);

			$.ajax({
			type:"post",
			url:"getstudent.php",
			data:{id:id},
			success:function(result){
			console.log(result);
			$("#modal_body").html(result)
			}
			});
        }
			
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>


<script>
	window.onload = function () {

	var chart = new CanvasJS.Chart("chartContainer", {
		exportEnabled: true,
		animationEnabled: true,
		
		title:{
			text: "Distribution based on Grades",
			fontWeight:"lighter",
			wrap:true
		},
		legend:{
			cursor: "pointer",
			itemclick: explodePie
		},
		data: [{
			type: "pie",
			showInLegend: true,
			toolTipContent: "{name}: <strong>{y}%</strong>",
			indexLabel: "{name} - {y}%",
			// dataPoints: [
			// 	{ y: 26, name: "School Aid", exploded: true },
			// 	{ y: 20, name: "Medical Aid" },
			// 	{ y: 5, name: "Debt/Capital" },
			// 	{ y: 3, name: "Elected Officials" },
			// 	{ y: 7, name: "University" },
			// 	{ y: 17, name: "Executive" },
			// 	{ y: 22, name: "Other Local Assistance"}
			// ]
			dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();

	var chart1 = new CanvasJS.Chart("chartContainer1", {
		exportEnabled: true,
		animationEnabled: true,
		
		title:{
			text: "Predicted v/s Not Predicted",
			fontWeight:"lighter",
			wrap:true
		},
		legend:{
			cursor: "pointer",
			itemclick: explodePie
		},
		data: [{
			type: "pie",
			showInLegend: true,
			startAngle:90,
			toolTipContent: "{name}: <strong>{y}%</strong>",
			indexLabel: "{name} - {y}%",
			// dataPoints: [
			// 	{ y: 26, name: "School Aid", exploded: true },
			// 	{ y: 20, name: "Medical Aid" },
			// 	{ y: 5, name: "Debt/Capital" },
			// 	{ y: 3, name: "Elected Officials" },
			// 	{ y: 7, name: "University" },
			// 	{ y: 17, name: "Executive" },
			// 	{ y: 22, name: "Other Local Assistance"}
			// ]
			dataPoints: <?php echo json_encode($dataPoint1, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart1.render();



	}

	function explodePie (e) {
		if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
		} else {
			e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
		}
		e.chart.render();

	}




</script>

</body>
</html>