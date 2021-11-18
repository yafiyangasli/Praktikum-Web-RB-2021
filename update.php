<?php

	require_once('dbconfig.php');
	global $con;

	$id_cart = $_POST['id_cart'];
	$jumlah = $_POST['jumlah'];
	$total = $_POST['total'];

	if(!empty($id_cart) && !empty($total) && !empty($jumlah))
	{
		$query = "UPDATE cart SET jumlah='$jumlah', harga='$total' WHERE id_cart='$id_cart'";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	}
	else{
		header('Location : index.php');
	}