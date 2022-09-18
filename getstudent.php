<?php
session_start();
include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id=$_POST['id'];
    $sub_id=$_SESSION['sub_id'];
    // var_dump($_SESSION);
    $_SESSION['Student_id']=$id;
    // $sql1="Select subject_id from relation where teacher_id=".$_SESSION['teacher_id']." and class_name = ".$_SESSION['class_name'];
	// $pass_class="'".$class."'";
    $sql="Select Marks1,Marks2 from stu_marks where Student_id= ".$id." and Subject_id = (Select subject_id from relation where teacher_id=".$_SESSION['teacher_id']." and class_name = '".$_SESSION['class_name']."')";
    // echo $sql;   
    $result=mysqli_query($con,$sql);
    if($result){
        $row=mysqli_fetch_array($result);
        if(isset($row["Marks1"])){
            // echo $sub_id;
            echo 'Marks in Ut1: '.$row["Marks1"].'<br>Marks in Ut2 :'.$row["Marks2"].'<br>';
            // $_SESSION['avaialavle_marks']="True";
            echo '<button type="button" 
                            class="btn btn-primary btn-sm" 
							style="float: right;"
                            onclick="predict('.$id.','.$sub_id.')">
                            Predict
                        </button>';
        }
        else{
            $sql1="Select Email from student where Student_Id=".$id;
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_array($result1);
            $to="'".$row1["Email"]."'";
            echo "Student has not entered his/her marks.<br>Send mail to the student <br>";
            // $_SESSION['avaialavle_marks']="False";
            echo '<button type="button" 
                            class="btn btn-primary btn-md" 
							style="float: right;"
                            data-toggle="modal"
                            data-target="#exampleModal" onclick="mail_stud('.$to.')">
                            Mail
                        </button>';
        }
        
    }
    else{
        echo "NOPE";
        
    }
}
else{
    echo "No";
}
?>