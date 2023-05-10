<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$status = "Ready for Pickup";
    $total = $_POST['total'];

		$sql = "SELECT * FROM bmss WHERE id = $id";
		$query = $conn->query($sql);
		$row = $query->fetch_assoc();


        $sql = "UPDATE bmss SET status = '$status', total = '$total' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Payment successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location: payment.php');

?>