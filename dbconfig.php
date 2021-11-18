<?php

	global $con;

	$con = mysqli_connect('localhost','root','','yafifruits');

	if(!$con)
	{
		echo 'Tidak dapat terhubung ke database';
		die();
	}