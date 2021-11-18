<?php

	require_once('dbconfig.php');
	global $con;

	session_start();

	$email = $_POST['email'];
	echo $email;

	if($email!=NULL)
	{
		$query1 = "SELECT * FROM user WHERE email = '$email'";
		$result = mysqli_query($con, $query1);
		$rowcount = mysqli_num_rows($result);

		if ($rowcount > 0) {
			$row = mysqli_fetch_assoc($result);
  			$_SESSION['user'] = $row['email'];
	    	header('Location: index.php');
	    }else{
			$query = "INSERT INTO `user` (`id_user`, `email`) VALUES (NULL, '$email');";
			mysqli_query($con,$query);
			$_SESSION['user'] = $email;
			header('Location: index.php');
	    }
	}else{
		header('Location: index.php');
	}