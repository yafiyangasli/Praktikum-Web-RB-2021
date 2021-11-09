<?php

	require_once('dbconfig.php');
	global $con;

	$query = $con->prepare("SELECT * FROM mahasiswa order by nim ASC");
	$query->execute();
	mysqli_stmt_bind_result($query, $nim, $nama, $prodi, $angkatan);
	
	?>
	<table class="table table-bordered" border='1'>
		<tr class="info">
			<th>NIM</th>
			<th>Nama</th>
			<th>Prodi</th>
			<th>Angkatan</th>
			<th>Aksi</th>
		</tr>
	<?php

	while(mysqli_stmt_fetch($query))
	{
		echo '
		<tr>
			<td>'.$nim.'</td>
			<td>'.$nama.'</td>
			<td>'.$prodi.'</td>
			<td>'.$angkatan.'</td>
			<td><button id="'.$nim.'" class="edit btn btn-info">Edit</button> <button class="del btn btn-danger" id="'.$nim.'">Delete</button></td>
		</tr>';
	}
		echo '</table>';
	
?>
<script type="text/javascript">
	$('.del').click(function() {
		var nim = $(this).attr('id');
		$.ajax({
	    url : "delete.php",
	    type: "POST",
	    data : { nim: nim },
	    success: function(data)
	    {
	    	$('#records_content').fadeOut(1100).html(data);
	    	$.get("view.php", function(data)
	    	{	
	    		$("#table_content").html(data); 
	    	});
	    }
	});
}); 

	$('.edit').click(function() {
		var nim = $(this).attr('id');
		$('#show-add').hide();
		$.ajax({
	    url : 'edit.php',
	    type: 'POST',
	    data : { nim: nim },
	    success: function(data)
	    {
    		$("#link-add").html(data);
    		$('#link-add').show();
	    }
	});
}); 

</script>