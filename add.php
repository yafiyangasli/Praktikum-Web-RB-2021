<?php

	require_once('dbconfig.php');
	global $con;

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$prodi = $_POST['prodi'];
	$angkatan = $_POST['angkatan'];

	if(!empty($nama) && !empty($prodi) && !empty($angkatan) && !empty($nim))
	{
		$query = "INSERT into mahasiswa (nim,nama, prodi, angkatan) VALUES ('$nim','$nama','$prodi','$angkatan')";
		mysqli_query($con,$query);
	}