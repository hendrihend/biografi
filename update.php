<?php 
require'functions.php';

// ambil data di URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$data = query("SELECT * FROM barang WHERE id = $id")[0];

// cek apakah tombol submit sudah di tekan atau belum
if ( isset($_POST["ubah"]) ) {

	// cek apakah data berhasil di ubah atau tidak
	if(ubah($_POST) > 0 ) {
		echo "
		<script>
		alert('data berhasil diubah!');
		document.location.href = 'index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('data gagal diubah!');
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
	<title>Update Data</title>
	<link rel="stylesheet" href="css/materialize.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<h3>Ubah Data</h3>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="id" value="<?= $data["id"]; ?>">
					<div class="input-field">
						<input type="text" id="nama_barang" name="nama_barang" value="<?= $data["nama_barang"]; ?>">
						<label for="nama_barang">Nama Barang</label>
					</div>
					<div class="input-field">
						<input type="text" id="harga_asli" name="harga_asli" value="<?= $data["harga_asli"]; ?>">
						<label for="harga_asli">Harga Asli</label>
					</div>
					<div class="input-field">
						<input type="text" id="harga_asli" name="harga_asli" value="<?= $data["harga_asli"]; ?>">
						<label for="harga_jual">Harga Jual</label>
					</div>
					<div class="input-field">
						<input type="text" id="jenis_barang" name="jenis_barang" value="<?= $data["jenis_barang"]; ?>">
						<label for="jenis_barang">Jenis Barang</label>
					</div>
					<button type="submit" name="ubah" class="waves-effect waves-light btn-small">Simpan</button>
					<button type="reset" class="waves-effect waves-light btn-small red accent-4">Hapus</button>
					<button type="submit" name="kembali" class="waves-effect waves-light btn-small transparent black-text">Kembali</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>