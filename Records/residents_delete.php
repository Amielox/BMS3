<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$residentid = $_POST['residentid'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$password = $_POST['password'];
		$dob = $_POST['dob'];
		$firstname = $_POST['firstname'];
		$pob = $_POST['pob'];
		$suf = $_POST['suf'];
		$email = $_POST['email'];
		$middlename = $_POST['middlename'];
		$gender = $_POST['gender'];
		$contno = $_POST['contno'];
		$nationality = $_POST['nationality'];
		$cs = $_POST['cs'];
		$religion = $_POST['religion'];
		$occupation = $_POST['occupation'];
		$puroknumber = $_POST['puroknumber'];
		$user_type ="user";
		$photo = $_POST['photo'];

		$sql = "INSERT INTO archiveresidents (no,residentid,lastname,address,password,puroknumber,dob,firstname,pob,email,middlename,gender,contno,suf,nationality,cs,religion,occupation,user_type,photo) VALUES ('$id','$residentid','$lastname','$address','$password','$puroknumber','$dob','$firstname','$pob','$email','$middlename','$gender','$contno','$suf','$nationality','$cs','$religion','$occupation','$user_type','$photo');";
		
		$sql .= "DELETE FROM residents WHERE id = '$id';";

		if($conn->multi_query($sql)){
			$_SESSION['success'] = 'Resident deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: residents.php');
	
?>