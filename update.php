<?php

	require_once('dbconfig.php');
	global $con;

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$prodi = $_POST['prodi'];
	$angkatan = $_POST['angkatan'];

	if(!empty($nama) && !empty($prodi) && !empty($angkatan) && !empty($nim))
	{
		$query = "UPDATE mahasiswa SET nama='$nama', prodi='$prodi', angkatan='$angkatan' WHERE nim='$nim'";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">Satu data telah diganti!</div>';
	}
	else
	{
		echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-danger">error while updating record</div>';
	}