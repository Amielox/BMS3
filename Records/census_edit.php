<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$year = $_POST['year'];
		$population = $_POST['population'];

		$sql = "SELECT * FROM census WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


        $sql = "UPDATE census SET year = '$year', population = '$population' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Cencus updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: census.php');

?>