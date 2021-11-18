<?php

	require_once('dbconfig.php');
	global $con;

	session_start();
if (isset($_SESSION['user'])):

	$email = $_SESSION['user'];

	$query = $con->prepare("SELECT id_cart,jumlah,harga FROM `cart` WHERE email = '$email'");
	$query->execute();
	mysqli_stmt_bind_result($query,$id_cart, $jumlah, $harga);
	
	?>

	<table class="table table-borderless col-8 offset-2 text-center">
		<thead>
			<tr>
			    <th scope="col">No</th>
			    <th scope="col">Jumlah</th>
			    <th scope="col">Harga</th>
			    <th scope="col">Aksi</th>
			</tr>
		</thead>
			  <tbody>
			   
<?php
$i = 1;
	while(mysqli_stmt_fetch($query))
	{
		echo '
		<tr>
			<th scope="row">'.$i.'</td>
			<td>'.$jumlah.'</td>
			<td>'.$harga.'</td>
			<td><a class="edit btn btn-warning" id="'.$id_cart.'" data-toggle="modal" data-target="#modalUbah">Ubah</a> <a class="delete btn btn-danger" id="'.$id_cart.'">Hapus</a></td>
		</tr>';
		$i++;
	}
		echo '</tbody></table>';
	
?>

<script type="text/javascript">
	$('.delete').click(function() {
		var id_cart = $(this).attr('id');
		$.ajax({
	    url : "delete.php",
	    method: "POST",
	    data : { id_cart: id_cart },
	    success: function(data)
	    {
	    	$.get("viewTable.php", function(data)
	    	{	
	    		$("#table_content").html(data); 
	    	});
	    }
	});
}); 
	$('.edit').click(function(){
		var id_cart = $(this).attr('id');
		document.getElementsByClassName('btnSimpanEdit')[0].id = id_cart;
});

$('.btnSimpanEdit').click(function() {
	var id_cart_edit = $(this).attr('id');
	var jumlah = $('#nanasEdit').val();
	var total = jumlah * 25000;
		$.ajax({
		    url : 'update.php',
		    method: 'POST',
		    data : {id_cart: id_cart_edit, jumlah: jumlah,total: total},
		    success: function(data)
		    {
		    	$.get("viewTable.php", function(data)
		    	{	
		    		$("#table_content").html(data); 
		    	});
		    }
		});
}); 
</script>
<?php endif;?>