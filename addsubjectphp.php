<?php
$connect = mysqli_connect("localhost", "root", "root", "spp");
// include "dbconnect.php";
$number = count($_POST["name"]);
if($number >= 1)
{
	for($i=0; $i<$number; $i++)
	{
		if(trim($_POST["name"][$i] != ''))
		{
			$sql = "INSERT INTO subject(subject_name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
			mysqli_query($connect, $sql);
		}
		else{
			echo "Enter Details";
			break;
		}
	}
	echo "Data Inserted";
}
else
{
	echo "Please Enter Name";
}