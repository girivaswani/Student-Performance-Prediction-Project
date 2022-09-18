
<?php
	include 'dbconnect.php';
	if(isset($_POST['nextmark'])){
        echo "Inside";
        var_dump($_POST);
		// var_dump($_POST);

		// echo $_POST['sub1'][0];
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
			$sql2 = "UPDATE stu_marks SET Marks1='$ut1', Marks2='$ut2', Tut_Subject='$tut' Where Subject_id='$subid' and Student_Id=1;";
			echo $sql2;
			mysqli_query($con,$sql2);
        }
		// $sql = "UPDATE student SET Family_Size='$famsize',Pstatus='$Pstatus', Mjob='$Mjob', Fjob='$Fjob',
		// 		Medu='$Medu', Fedu='$Fedu', Guardian='$guardian', Famsup='$famsup', Famrel='$famrel' where Student_Id=2;";
		// mysqli_query($con, $sql);
		// header("Location:remaining.php");
		// exit();
		// echo "<script>window.location.href='remaining.php'</script>";
	}
	else{
		echo "not successful";
	}
?>
