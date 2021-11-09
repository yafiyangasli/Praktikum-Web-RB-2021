<?php

	global $con;

	$con = mysqli_connect('localhost','root','','prak4');

	if(!$con)
	{
		echo 'Tidak dapat terhubung ke database';
		die();
	}