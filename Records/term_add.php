<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$year = $_POST['year'];
		
		$sql = "INSERT INTO term (term) VALUES ('$year')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Term added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: term.php');
?>