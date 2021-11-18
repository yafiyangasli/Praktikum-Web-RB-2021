<?php

	require_once('dbconfig.php');
	global $con;

	$id_cart = $_POST['id_cart'];
	$email = $_POST['email'];
	$jumlah = $_POST['jumlah'];
	$total = $_POST['total'];

	if(!empty($email) && !empty($jumlah) && !empty($total))
	{
		$query = "INSERT into cart (id_cart,email, jumlah, harga) VALUES ('$id_cart','$email','$jumlah','$total')";
		mysqli_query($con,$query);
	}