<?php 
require("functions.php");
// cek apakah tombol submit sudah di tekan atau belum
if ( isset($_POST["simpan"]) ) {
	// cek apakah data berhasil di tambahkan atau tidak
	if(tambah($_POST) > 0 ) {
		echo "
		<script>
		alert('data berhasil ditambahkan!');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('data gagal ditambahkan!');
		document.location.href = 'index.php';
		</script>
		";
	}
}
if (isset($_POST["kembali"])) {
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Input Data</title>
	<link rel="stylesheet" href="css/materialize.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3>Tambahkan Data</h3>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="input-field">
						<input type="text" name="nama_barang">
						<label for="">Nama Barang</label>
					</div>
					<div class="input-field">
						<input type="text" name="harga_asli">
						<label for="">Harga Asli</label>
					</div>
					<div class="input-field">
						<input type="text" name="harga_jual">
						<label for="">Harga Jual</label>
					</div>
					<div class="input-field">
						<input type="text" name="jenis_barang">
						<label for="">Jenis Barang</label>
					</div>
					<button type="submit" name="simpan" class="waves-effect waves-light btn-small">Simpan</button>
					<button type="reset" class="waves-effect waves-light btn-small red accent-4">Hapus</button>
					<button type="submit" name="kembali" class="waves-effect waves-light btn-small transparent black-text">Kembali</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>