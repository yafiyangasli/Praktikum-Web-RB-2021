<?php

	require_once('dbconfig.php');
	global $con;
	$nim = $_POST['nim'];

	if(empty($nim))
	{
		?><div class="text-center">Tidak ada data yang ditemukan <a href="#" onclick="$('#link-add').hide();$('#show-add').show(700);">Hide</a></div>
		<?php
		die();
	}

	$query = "SELECT * FROM mahasiswa where nim='$nim'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	while($row = mysqli_fetch_assoc($result))
	{
		?>
		<div class="form-inline" id="edit-data">
			<div class="form-group col-md-3">
				<input type="text" name="nama" id="nama" value="<?php echo $row['nama']; ?>" placeholder="Nama" class="form-control" required />
			</div>
			<div class="form-group col-md-3">
				<select name="prodi" name="prodi" id="prodi" class="form-control" required >
                        <option value="">Pilih Prodi</option>
                        <option value="IF">Teknik Informatika</option>
                        <option value="EL">Teknik Elektro</option>
                        <option value="SI">Teknik Sipil</option>
                        <option value="TG">Teknik Geofisika</option>
                        <option value="MA">Matematika</option>
                </select>
			</div>
			<div class="form-group col-md-3">
				<input type="number" id="angkatan" name="angkatan" placeholder="Tahun angkatan" class="form-control" value="<?php echo $row['angkatan']; ?>" required />
			</div>
			<div class="form-group col-md-3">
			<button type="button" class="btn btn-primary update" id="<?php echo $row['nim']; ?>" name="update">Update</button>
			<button type="button" href="javascript:void(0);" class="btn btn-default" id="cancel" name="add" onclick="$('#link-add').slideUp(400);$('#show-add').show(700);">Cancel</button>
		</div>
	<?php
	}
	?>

<script type="text/javascript">
	$('.update').click(function() {
		var nim = $(this).attr('id');
        var nama = $('#nama').val();
        var prodi = $('#prodi').val();
        var angkatan = $('#angkatan').val();

        $.ajax({
            url: "update.php",
            type: "POST",
            data: { nim: nim, nama: nama, prodi: prodi, angkatan: angkatan },
            success: function(data, status, xhr) {
                $('#nama').val('');
                $('#prodi').val('');
                $('#angkatan').val('');
                $('#records_content').fadeOut(1100).html(data);
                $.get("view.php", function(html) {
                    $("#table_content").html(html);
                });
                $('#records_content').fadeOut(1100).html(data);
            },
            complete: function() {
                $('#link-add').hide();
                $('#show-add').show(700);
            }
        });
    });
</script>