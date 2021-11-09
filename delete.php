<?php

	require_once('dbconfig.php');
	global $con;
	
	$nim = $_POST['nim'];

	if(empty($nim))
	{
		die();
	}
	$query = $con->prepare("DELETE FROM mahasiswa where nim=?");

	$query->bind_param('i',$nim);

	$result = $query->execute();

	if($result)
	{
        echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">Data terhapus!</div>';
    }
    else
    {
    	exit(mysqli_error($con));
    }
    