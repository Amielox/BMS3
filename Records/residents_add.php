<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		//print_r($_POST);
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$dob = date('Y-m-d',strtotime($_POST['dob']));
		$firstname = $_POST['firstname'];
		$pob = $_POST['pob'];
		$suf = $_POST['suf'];
		$email = $_POST['email'];
		$middlename = $_POST['middlename'];
		$gender = $_POST['gender'];
		$contno = $_POST['contno'];
		$nationality = $_POST['nationality'];
		$cs = $_POST['cs'];
		$unt = $_POST['unt'];
		$religion = $_POST['religion'];
		$occupation = $_POST['occupation'];
		$puroknumber = $_POST['puroknumber'];
		$user_type ="user";
		$filename = $_FILES['photo']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}

		$set = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$residentid = substr(str_shuffle($set), 0, 6);

		$sql = "INSERT INTO residents (lastname, address, password, residentid, dob, firstname, pob, suf, email, middlename, gender, contno, nationality, cs, religion, occupation, puroknumber, unt, user_type, photo) 
		VALUES ('$lastname', '$address', '$password', '$residentid', '$dob', '$firstname', '$pob', '$suf', '$email', '$middlename', '$gender', '$contno', '$nationality', '$cs', '$religion', '$occupation', '$puroknumber', '$unt', '$user_type', '$filename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Resident added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: residents.php');
?>