<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vesit</title>
	<link rel="icon" type="image/png" href="images/icons/vesitlogo.png">
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
</head>
<?php
    include 'dbconnect.php';
	session_start();
	$stud_id=$_SESSION['stud_id'];
    $sql1= "SELECT Subject_Id, Subject_name from subject Natural join relation where class_name=(SELECT Class from student where Student_Id=$stud_id)";

    // while($row=mysqli_fetch_array($result1)){
     $result1=mysqli_query($con,$sql1);
     ?>

<body>
<?php
	include "studentnav.php"
?>
	<div class="limiter" style="width: 500px;">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1 m-b-110">
					<form action="stumarks.php" method="POST">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column2" style="padding-left: 40px;">Subject</th>
                                    <th class="cell100 column2" style="padding-left: 14rem;">Predict</th>
								</tr>
							</thead>
						</table>
					</div>

					<div class="table100-body js-pscroll">
						<table>
							<tbody>
								<?php 
    							while($row1=mysqli_fetch_array($result1)){?>
								<tr class="row100 body">
									<td class="cell100 column2" style="padding-left: 40px;"><p name="sub1[]"><?php echo $row1['Subject_name'];$sub_name='"'.$row1['Subject_name'].'"' ?></p>
									<td class="cell100 column2"> <button type="button" data-toggle="modal" data-target="#exampleModal" id="submit" class="btn btn-primary pull-right" onclick='select_and_pass(<?php echo $row1["Subject_Id"].",$stud_id,".$sub_name; ?>)'>Predict</button></td>
								<?php } ?>
								</tr>
								<tr class="row100 body">
									<td class="cell100 column2" style="padding-left: 40px;"><p></p>
									<td class="cell100 column2"> <button type="button" class="btn btn-success pull-right" onclick="window.location.href='allpredictions.php'">Summary</button></td>
								</tr>
								
							</tbody>
						</table>
					</div>
					</form>
				</div>
			</div>
		</div>

	</div>



	<div class="modal fade" id="exampleModal" data-keyboard="false" data-backdrop="static"
            tabindex="-1" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" 
                            id="exampleModalLabel">
                            Student Performance Prediction 
                        </h5>
                          
                        <button type="button" 
                            class="close" 
                            data-dismiss="modal" 
                            aria-label="Close" onclick="remove()">
  
                            <span aria-hidden="true">
                                ×
                            </span>
                        </button>
                    </div>
  
                    <div class="modal-body">
  
                        <!-- Data passed is displayed
                            in this part of the 
                            modal body -->
							<p id="modal_body"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></p>
							
                        
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


	function remove(){
		// console.log("The document was clicked!");
		setTimeout(function(){ $("#modal_body").html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>'); }, 500);
		// $("#modal_body").html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');

	}
	// document.onclick = remove;

    // function myClickHandler() {
    //   console.log("The document was clicked!");
    // }

    function select_and_pass(sub_id,stud_id,sub_name) {
            console.log(sub_id);
			console.log(stud_id);
			console.log(sub_name);
			$("#exampleModalLabel").html(sub_name);

			$.ajax({
			type:"post",
            url:"getpredictedvalue.php", 
			// url:"http://localhost/SPP/getpredictedvalue.php",
			data:{sub_id:sub_id,stud_id:stud_id},
			success:function(result){
			console.log(result);
			if(result=="['A']"){
				// console.log("Yes");
				var res="<div class='text-center'><img src='images/goodjob.jpeg' style='width:25%;'><h2 style='color:blue; align:center'> Good Job!</h2></div><br>The Final grade for this subject can be <b>'A'</b>. You are performing well in this subject but you can perform better. ";
				$("#modal_body").html(res);
			}
			else if(result=="['B']"){
				// console.log("Yes");
				var res="<div class='text-center'><img src='images/warning.png' style='width:25%;'><h2 style='color:orange; align:center'> Just Pass!</h2></div><br>The Final grade for this subject can be <b>'B'</b>. You are not performing well in this subject. You have recieved sufficient marks just to pass in this subject. You can do much better if you pay more attention.";
				$("#modal_body").html(res);
			}
			else if(result=="['F']"){
				// console.log("Yes");
				var res="<div class='text-center'><img src='images/fail.jpeg' style='width:25%;'><h2 style='color:red; align:center'> Fail!</h2></div><br>The Final grade for this subject can be <b>'F'</b>. If you don't focus on this subject, there is a high probability that you will fail in this subject i.e. you may get marks less than 32. Try to focus on important topics and for any query you should contact your respective subject teacher.";
				$("#modal_body").html(res);
			}
			else if(result=="['O']"){
				// console.log("Yes");
				//A k lie  var res = "<div class='text-center'><img src='images/goodjob.jpeg' style='width:25%;'><h2 style='color:blue; align:center'> Very Good!</h2></div><br><h5>The Final grade for this subject can be <b>A</b>.You can get marks in the range of 49-63. You are performing well in this subject. But you can still improve!</h5>";
				var res="<div class='text-center'><img src='images/Excellent.png' style='width:25%;'><h2 style='color:green; align:center'> Excellent!</h2></div><br><h5>The Final grade for this subject can be <b style='font-size:1rem;'>'O'</b>. You have very good knowledge of this subject. Keep it up!</h5>";
				$("#modal_body").html(res);
			}
			else{
				$("#modal_body").html(result);
			}
			
			}
			});
        }

</script>

</body>
</html>
