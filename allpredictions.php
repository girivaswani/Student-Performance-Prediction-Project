<?php
    include 'dbconnect.php';


//  $new_array= array("label"=> "SPCC", "y"=>array(64,80));
//  $new_array1= array("label"=> "CSS", "y"=>array(48,64));

//  $new_array2= array("label"=> "CSS", "y"=>array(0,32));
//  array_push($dataPoints, $new_array2);
//  echo $dataPoints;
// $dataPoints1 = array(
// 	array("label"=> "2006", "y"=> 64),
// 	array("label"=> "2007", "y"=> 48),
// 	array("label"=> "2008", "y"=> 32),
// 	array("label"=> "2009", "y"=> 64),
// 	array("label"=> "2010", "y"=> 32)
// );
// $dataPoints2 = array(
// 	array("label"=> "2006", "y"=> 16),
// 	array("label"=> "2007", "y"=> 16),
// 	array("label"=> "2008", "y"=> 16),
// 	array("label"=> "2009", "y"=> 16),
// 	array("label"=> "2010", "y"=> 16)
// );
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vesit</title>

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
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@1&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/card.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    
</head>
<?php
    $o="The Final grade for this subject can be <b>'O'</b>. You have very good knowledge of this subject. Keep it up!";
    $a="The Final grade for this subject can be <b>'A'</b>. You are performing well in this subject but you can perform better.";
    $b="The Final grade for this subject can be <b>'B'</b>. You are not performing well in this subject. You have recieved sufficient marks just to pass in this subject. You can do much better if you pay more attention.";
    $f="The Final grade for this subject can be <b>'F'</b>. If you don't focus on this subject, there is a high probability that you will fail in this subject i.e. you may get marks less than 32. Try to focus on important topics and for any query you should contact your respective subject teacher.";

?>
<body>
<?php
    include "studentnav.php";
    session_start();
    $stud_id=$_SESSION['stud_id'];
?>

<div class="jumbotron" style="min-height: 89vh;">
<div id="chartContainer" style="height: 500px; width: 80%; margin: auto;"></div>
    <div class="container mt-5">
        <!-- <div class="container mt-5"> -->
            <div class="row" style="font-family: 'Crimson Text', serif;">
            <?php
                $id=0;
                include 'predict_function.php';
                $sql1='select Tut_Subject,Marks1,Marks2,subject_name,st.Subject_id from stu_marks st join subject sub on st.Subject_id=sub.subject_id where st.Student_Id='.$stud_id.';';
                // echo $sql1;
                $result1=mysqli_query($con,$sql1);
                $dataPoints1 = array();
                $dataPoints2 = array();
                while($row=mysqli_fetch_array($result1)){
                    '<div class="col-md-4 mb-4">
                <div class="card p-3">
                <div class="d-flex flex-row mb-3"><img src="images/'.$row["subject_name"].'" width="70" height=80rem>
                        <div class="d-flex flex-column ml-4"><span class="font-weight-bolder">'.$row["subject_name"].'</span><span class="text-black-50 font-weight-bold">Organizer:'.$row["subject_name"].'</span><span class="ratings"> Contact: '.$row["subject_name"].'</span></div>
                </div>
                    <h6></h6>
                    <div class="d-flex justify-content-between install mt-3"><span>From: '.$row["subject_name"].'</span><span class="d-flex justify-content-between install">To: '.$row["subject_name"].'</span></div>
                </div>
            </div>';
                
                // echo $sql;
            ?>  
            
        <!-- <div class="row"> -->
        <div class="col-md-4 mb-4">
        <div class="maincontainer">
            <div class="back">
                <h3><?php echo $row["subject_name"];   ?></h3>
                <h5><?php  
                    
                    $predict=predict($stud_id,$row['Subject_id']);
                    $subid=$row['Subject_id'];
                    $sql2='UPDATE stu_Marks set Pred_Mark= "'.$predict.'" where Student_Id = '.$stud_id.'  and  Subject_id = '.$subid.';';
                    // echo $sql2;
                    mysqli_query($con,$sql2);
                    $subname=$row['subject_name'];
                    if($predict=="['O']"){
                        echo $o;
                        $new_array1= array("label"=> $subname, "y"=> 64);
                        $new_array2= array("label"=> $subname, "y"=> 16);
                        array_push($dataPoints1, $new_array1);
                        array_push($dataPoints2, $new_array2);
                    }
                    elseif($predict=="['A']"){
                        echo $a;
                        $new_array1= array("label"=> $subname, "y"=> 48);
                        $new_array2= array("label"=> $subname, "y"=> 16);
                        array_push($dataPoints1, $new_array1);
                        array_push($dataPoints2, $new_array2);
                    }
                    elseif($predict=="['B']"){
                        echo $b;
                        $new_array1= array("label"=> $subname, "y"=> 32);
                        $new_array2= array("label"=> $subname, "y"=> 16);
                        array_push($dataPoints1, $new_array1);
                        array_push($dataPoints2, $new_array2);
                    }
                    else{
                        echo $f;
                        $new_array1= array("label"=> $subname, "y"=> 0);
                        // $new_array1= array();
                        $new_array2= array("label"=> $subname, "y"=> 32);
                        array_push($dataPoints1, $new_array1);
                        array_push($dataPoints2, $new_array2);
                    }
                    
                // var_dump($dataPoints1);
                // var_dump($dataPoints2);   
                ?></h5>
            </div>
            <div class="front">
                <div class="image">
                <!-- <img src="images/book5.png" style="width:100%;"> -->
                <!-- <img src="https://cdn.wallpapersafari.com/83/55/WbvsGD.jpg" style="width: 100%;"> -->
                <!-- <img src="https://static.vecteezy.com/system/resources/previews/001/861/371/non_2x/light-bulb-floating-on-stack-of-books-vector.jpg" style="width: 90%;"> -->
                <!-- <img src="https://image.freepik.com/free-photo/person-drawing-symbols-coming-out-light-bulb-top-book_1232-907.jpg" style="width: 100%;"> -->
                <img src="book5.png" width="100%" id=<?php echo "myPicture".$id;$id++; ?> alt="image">
                <h2><?php echo $row["subject_name"];   ?></h2>
                </div>
            </div>
        </div>
        </div>
        <?php } ?>
        </div>
        <!-- </div> -->
        </div>
        <!-- <div class="col-md-4 mb-4">
        <div class="maincontainer">
            <div class="back">
                <h2>Micropocessor</h2>
                <p>Introduction to Content Marketing workshop focuses on building content frameworks that are designed for and directed at communication engagement. This interdisciplinary workshop is best-suited to learning visual and written communication strategies.</p>
            </div>
            <div class="front" style="background-color: azure;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);">
                
                <img src="https://i.postimg.cc/ydrv1ZXq/contentmarketing.jpg">
                <h2>Micropocessor</h2>
    
            </div>
        </div>
        </div>
        <div class="col-md-4 mb-4">
        <div class="maincontainer">
            <div class="back">
                <h2>SPA</h2>
                <p>Introduction to Web-Writing workshop focuses on building creative and systemic digital content through online user experiences that benefit people and robots. This workshop is best-suited to creating content for digital platforms and devices — websites, mobile, game consoles, and virtual reality engines.</p>
            </div>
            <div class="front" style="background-color: azure;background-clip: border-box;border: 1px solid rgba(0,0,0,.125);">
                <div class="image">
                <img src="https://i.postimg.cc/ZqbG0630/webwriting.jpg">
                <h2>SPA</h2>
                </div>
            </div>
        </div> -->        
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
    <script type="text/javascript">
        window.onload = choosepic;
        var mypix = new Array("book5.png","book1.jpg","book3.jpg","book4.png","book2.png");
        var ids=$('[id^=myPicture]');
        // console.log(ids);
        
        function choosepic(){
            var randomnum= Math.floor(Math.random()*ids.length);
            console.log(randomnum);
            var i=0;
            for(i=0;i<ids.length;i++){
                console.log(ids[i].src);
                ids[i].src=mypix[(randomnum+i)%ids.length];
                console.log((randomnum+i)%ids.length)
            }
            
            // console.log(ids.length);
        }
    </script>

<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
    exportEnabled: true,
	theme: "light2",
	title: {
		text: "Summary"
	},
	theme: "light2",
	animationEnabled: true,
	toolTip:{
		shared: true,
		reversed: true
	},
    
	axisY: {
		title: "Predicted Marks",
		interval:16,
        maximum:80,
        minimum:0
	},
    axisX:{
        labelMaxWidth: 120,  
        labelWrap: true
    },
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [
        
		{
            tooltipText:["O","A","B","F"],
			type: "stackedColumn",
			name: "Definite",
			showInLegend: true,
			yValueFormatString: "#,##0 Marks",
			dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		},{
            tooltipText:["O","A","B","F"],
			type: "stackedColumn",
			name: "Varying",
			showInLegend: true,
			yValueFormatString: "#,##0 Marks",
			dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
		}]
});
chart.render();
function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}
console.log("Success");

var randomnum= Math.floor(Math.random()*ids.length);
console.log(randomnum);
var i=0;
for(i=0;i<ids.length;i++){
    console.log(ids[i].src);
    ids[i].src=mypix[(randomnum+i)%ids.length];
    console.log((randomnum+i)%ids.length)
}

}
</script>


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

    function select_and_pass(sub_id,stud_id) {
            console.log(sub_id);
			console.log(stud_id);

			$.ajax({
			type:"post",
            url:"getpredictedvalue.php", 
			// url:"http://localhost/SPP/getpredictedvalue.php",
			data:{sub_id:sub_id,stud_id:stud_id},
			success:function(result){
			console.log(result);
			if(result=="['A']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>A</b>. You are performing well in this subject.";
				$("#modal_body").html(res);
			}
			else if(result=="['B']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>B</b>. You are not performing well in this subject.Try to scope up in this subject";
				$("#modal_body").html(res);
			}
			else if(result=="['F']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>F</b>. Work hard on this subject!.";
				$("#modal_body").html(res);
			}
			else if(result=="['O']"){
				// console.log("Yes");
				var res="The Final marks for this subject can be <b>O</b>. You have a perfect knowledge for this subject.";
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