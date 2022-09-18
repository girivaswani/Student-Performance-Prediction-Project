<?php
require('dbconnect.php');
session_start();
$class=$_SESSION['class_name'];
$subj= $_SESSION['sub_id'];
$sql="select Name,Email,Roll_No,Class,Marks1,Marks2,Pred_Mark from student Natural join stu_marks where Subject_id=$subj order by Roll_No";
$res=mysqli_query($con,$sql);
$html='<table border=1 ><tr><td>Roll_No</td><td>Class</td><td>Name</td><td>Email</td><td>UT1</td><td>UT2</td><td>Predicted Marks</td></tr>';
while($row=mysqli_fetch_assoc($res)){
	if(isset($row['Pred_Mark'])){
		$html.='<tr><td>'.$row['Roll_No'].'</td><td>'.$row['Class'].'</td><td>'.$row['Name'].'</td><td>'.$row['Email'].'</td><td>'.$row['Marks1'].'</td><td>'.$row['Marks2'].'</td><td>'.$row['Pred_Mark'][2].'</td></tr>';
	}
	else{
		$html.='<tr><td>'.$row['Roll_No'].'</td><td>'.$row['Class'].'</td><td>'.$row['Name'].'</td><td>'.$row['Email'].'</td><td>'.$row['Marks1'].'</td><td>'.$row['Marks2'].'</td><td>'.$row['Pred_Mark'].'</td></tr>';
	}
}
$html.='</table>';
header('Content-Type:application/vnd.ms-excel');
header('Content-Disposition:attachment;filename=report-'.$class.'.xls');
echo $html;
echo "<script>window.location.href='selectstudent.php'</script>";
?>