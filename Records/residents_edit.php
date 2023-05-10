<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$middlename = $_POST['middlename'];
		$suf = $_POST['suf'];
		$dob = $_POST['dob'];
		$pob = $_POST['pob'];
		$gender = $_POST['gender'];
		$cs = $_POST['cs'];
		$unt = $_POST['unt'];
		$address = $_POST['address'];
		$puroknumber = $_POST['puroknumber'];
		$religion = $_POST['religion'];
		$nationality = $_POST['nationality'];
		$contno = $_POST['contno'];
		$email = $_POST['email'];
		$occupation = $_POST['occupation'];

		$sql = "SELECT * FROM residents WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


		$sql = "UPDATE residents SET firstname = '$firstname', lastname = '$lastname', middlename = '$middlename', suf = '$suf', dob = '$dob', pob = '$pob',gender = '$gender', cs = '$cs', unt = '$unt', address = '$address', puroknumber = '$puroknumber', religion = '$religion', 
		nationality = '$nationality', contno = '$contno', email = '$email', occupation = '$occupation' WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Residents updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: residents.php');

?>