
<?php
    include 'dbconnect.php';
	if(isset($_POST['nextmarks'])){
        echo "Inside";
		foreach ($_POST['sub'] as $key => $value) {
            $subject=$_POST['sub'][$key];
            $sql="SELECT subject_id from subject where subject_name='$subject'";
			$result=mysqli_query($con, $sql);
   			echo "successful<br>";
    		$row = mysqli_fetch_array($result);
			echo $row['subject_id'];
			echo "<br>";
            echo $_POST['Marks1'][$key];

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

