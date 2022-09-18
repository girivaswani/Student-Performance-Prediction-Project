<?php
session_start();
include 'dbconnect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $stud_id=$_POST['stud_id'];
    $sub_id=$_POST['sub_id'];
    $Medu=0;
    $Fedu=0;
    $traveltime=0;
    $studytime=0;
    $failures=0;
    $famrel=0;
    $freetime=0;
    $goout=0;
    $dalc=0;
    $walc=0;
    $health=0;
    $absencies=0;
    $G1=0;
    $G2=0;
    $sex_M=0;
    $address_U=0;
    $famsize_le3=0;
    $pstatus_T=0;
    $mjob_health=0;
    $mjob_other=0;
    $mjob_services=0;
    $mjob_teacher=0;
    $fjob_health=0;
    $fjob_other=0;
    $fjob_services=0;
    $fjob_teacher=0;
    $reason_home=0;
    $reason_other=0;
    $reason_reputation=0;
    $guardian_mother=0;
    $guardian_other=0;
    $school_yes=0;
    $famsup_yes=0;
    $paid_yes=0;
    $activities_yes=0;
    $higher_yes=0;
    $internet_yes=0;
    $romantic_yes=0;
    
    $sql="Select * from student where Student_Id=".$stud_id;
    $sql1="Select * from stu_marks where Student_id=".$stud_id." and Subject_id=".$sub_id;
    // echo $sql;   
    // echo $sql1;
    $result=mysqli_query($con,$sql);
    $result1=mysqli_query($con,$sql1);
    $row=mysqli_fetch_array($result);
    $row1=mysqli_fetch_array($result1);
    // var_dump($row);
    // var_dump($row1); Sab theek h!
    if($row['Locality']=='urban'){
        $address_U=1;
    }
    if($row['Family_Size']=="LE3" ){
        $famsize_le3=1;
    }
    if($row['Pstatus']=="T" ){
        $pstatus_T=1;
    }

    $Medu=$row['Medu'];
    $Fedu=$row['Fedu'];
    if($row['Mjob']=="Health" ){
        $mjob_health=1;
    }
    else if($row['Mjob']=="Teacher" ){
        $mjob_teacher=1;
    }
    else if($row['Mjob']=="Services" ){
        $mjob_services=1;
    }
    else if($row['Mjob']=="Other" ){
        $mjob_other=1;
    }

    if($row['Fjob']=="Health" ){
        $fjob_health=1;
    }
    else if($row['Fjob']=="Teacher" ){
        $fjob_teacher=1;
    }
    else if($row['Fjob']=="Services" ){
        $fjob_services=1;
    }
    else if($row['Fjob']=="Other" ){
        $fjob_other=1;
    }

    if($row['Reason']=="home" ){
        $reason_home=1;
    }
    else if($row['Reason']=="other" ){
        $reason_other=1;
    }
    else if($row['Reason']=="reputation" ){
        $reason_reputation=1;
    }

    if($row['Guardian']=="Mother" ){
        $guardian_mother=1;
    }
    else if($row['Guardian']=="Father" ){
        $guardian_other=1;
    }


    $traveltime=$row['Traveltime'];
    $studytime=$row['Studytime'];
    $failures=$row['Failures'];
    if($row['Extrasup']=='yes'){
        $school_yes=1;
    }

    $famsup_yes=$row['Famsup'];
    if($row['Activities']=='yes'){
        $activities_yes=1;
    }
    if($row['Internet']=='yes'){
        $internet_yes=1;
    }
    if($row['Relationship']=='yes'){
        $romantic_yes=1;
    }
    $famrel=$row['Famrel'];
    $freetime=$row['Freetime'];
    if($row['Higher']=='yes'){
        $higher_yes=1;
    }
    $goout=$row['Goout'];
    $dalc=$row['Dalc'];
    $walc=$row['Walc'];
    $health=$row['Health'];
    $absencies=$row['Absences'];
    if($row1['Tut_Subject']=='yes'){
        $paid_yes=1;
    }
    $G1=$row1['Marks1'];
    $G2=$row1['Marks2'];
    if($row['Gender']=='Male'){
        $sex_M=1;
    }

    // echo $Medu.",".$Fedu.",".$traveltime.",".$studytime.",".$failures.",".$famrel.",".$freetime.",".$goout.",".$dalc.",".$walc.",".$health.",".$absencies.",".$G1.",".$G2.",".
    //         $sex_M.",".$address_U.",".$famsize_le3.",".$pstatus_T.",".$mjob_health.",".$mjob_other.",".$mjob_services.",".$mjob_teacher.",".$fjob_health.",".$fjob_other.",".$fjob_services.",".$fjob_teacher.",".
    //         $reason_home.",".$reason_other.",".$reason_reputation.",".$guardian_mother.",".$guardian_other.",".$school_yes.",".$famsup_yes.",".$paid_yes.",".$activities_yes.",".
    //         $higher_yes.",".$internet_yes.",".$romantic_yes ;
    $op1= exec("python python.py ".$Medu.",".$Fedu.",".$traveltime.",".$studytime.",".$failures.",".$famrel.",".$freetime.",".$goout.",".$dalc.",".$walc.",".$health.",".$absencies.",".$G1.",".$G2.",".
    $sex_M.",".$address_U.",".$famsize_le3.",".$pstatus_T.",".$mjob_health.",".$mjob_other.",".$mjob_services.",".$mjob_teacher.",".$fjob_health.",".$fjob_other.",".$fjob_services.",".$fjob_teacher.",".
    $reason_home.",".$reason_other.",".$reason_reputation.",".$guardian_mother.",".$guardian_other.",".$school_yes.",".$famsup_yes.",".$paid_yes.",".$activities_yes.",".
    $higher_yes.",".$internet_yes.",".$romantic_yes);
    echo $op1;
// var_dump($op1);

}
else{
    echo "No";
}
?>