<?php

	require_once('dbconfig.php');
	global $con;
	
	$id_cart = $_POST['id_cart'];

	if(empty($id_cart))
	{
		die();
	}
	$query = $con->prepare("DELETE FROM cart where id_cart=?");

	$query->bind_param('i',$id_cart);

	$result = $query->execute();
    