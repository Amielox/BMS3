<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
        $year = $_POST['year'];
		$population = $_POST['population'];
		
		$sql = "INSERT INTO census (year, population) VALUES ('$year', '$population')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Record added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: census.php');
?>