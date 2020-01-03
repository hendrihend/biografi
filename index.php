<?php 
require ("functions.php");
$brg = query("SELECT * FROM barang");
// $brg = query("SELECT barang.*, rokok.* FROM barang, rokok WHERE barang.id = rokok.id");
// $query = hapus("DELETE barang.*, rokok.* FROM barang, rokok WHERE barang.id = rokok.id");
// tombol cari ditekan
if (isset($_POST["cari"]) ){
	$brg = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link rel="stylesheet" href="css/index.css">
	<title>Halaman Utama</title>
</head>
<body>
<!-- 	<div class="black navbar-fixed">
		<nav class="black nav-extend">
			<div class="container">
				<div class="nav-wrapper">
					
				</div>
			</div>
		</nav>
	</div> -->

	<div class="nav">
		<div class="row">
			<div class="col s12">
				<div class="card blue-grey darken-1">
					<div class="card-content">
						<h3 class="center">Toko Mimi Hana Tio Cilegeh</h3>
						<h5 class="center">Daftar Nama dan Harga Barang Toko</h5>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<hr>
		<hr>
	</div>
	<section class="content">
		<div class="container">
			<div class="row">
				<div class="col s12">
					<form action="" method="POST">
						<div class="row">
							<div class="input-field col s4">
								<input type="text" name="keyword" autofocus autocomplete="off" id="keyword">
								<label for="cari">Cari..</label>
								<button type="submit" name="cari" id="tombol-cari" class="waves-effect waves-light btn-small teal darken-4">Cari</button>
							</div>
						</div>
					</div>
				</form>
				<div class="col s12">
					<h5>
						<a href="input.php">Tambah Data</a>
					</h5>
				</div>
				<div id="container">
					<table>
						<tr>
							<th rowspan="2" class="center">No</th>
							<th rowspan="2" class="center">Nama Barang</th>
							<th colspan="2" class="center">Harga</th>
							<th rowspan="2" class="center">Jenis Barang</th>
							<th rowspan="2" colspan="2" class="center">Opsi</th>
						</tr>
						<tr>
							<th class="center">Harga Asli</th>
							<th class="center">Harga Jual</th>
						</tr>
						<?php $i = 1; ?>
						<?php foreach($brg as $row): ?>
							<tr>
								<td class="center"><?= $i; ?></td>
								<td class="center"><?= $row["nama_barang"]; ?></td>
								<td class="center"><?= $row["harga_asli"]; ?></td>
								<td class="center"><?= $row["harga_jual"]; ?></td>
								<td class="center"><?= $row["jenis_barang"]; ?></td>
								<td class="center"><a class="waves-effect waves-light btn-small light-blue accent-4" href="update.php?id=<?= $row["id"]; ?>">Ubah</a></td>
								<td class="center"><a class="waves-effect waves-light btn-small red accent-4" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a></td>
							</tr>
							<?php $i++; ?>
						<?php endforeach; ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<footer class="center black">
	<div class="row white-text">
		&copy Copyright | Toko Mimi Hana Tio Cilegeh 2020
	</div>
</footer>

<script src="js/script.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script>
	const tabs = document.querySelectorAll('.tabs');
	M.Tabs.init(tabs);
</script>
</body>
</html>


<!-- <div class="container">
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col m2"><a href="#rokok">Rokok</a></li>
					<li class="tab col m2"><a href="#makanan_ringan">Makanan Ringan</a></li>
					<li class="tab col m2"><a href="#minuman">Minuman</a></li>
					<li class="tab col m2"><a href="#deterjen">Deterjen</a></li>
					<li class="tab col m2"><a href="#mie">Mie</a></li>
					<li class="tab col m2"><a href="#kopi">Kopi</a></li>
					<li class="tab col m2"><a href="#biskuit">Biskuit</a></li>
					<li class="tab col m2"><a href="#parfum">Parfum</a></li>
					<li class="tab col m2"><a href="#jamu_obat">Jamu dan Obat</a></li>
					<li class="tab col m2"><a href="#bumbu_masak">Bumbu Masak</a></li>
				</ul>
			</div>
			<div id="rokok" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Rokok</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Rokok</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama_rokok"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a></td>
									<td><a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">Hapus</a></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="minuman" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Minuman</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="deterjen" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Deterjen</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="kopi" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Kopi</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="biskuit" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Biskuit</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="parfum" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Parfum</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
			<div id="jamu_obat" class="col s12">
				<div class="row">
					<div class="col s12">
						<table>
							<h3 align="center">Daftar Harga Jamu dan Obat</h3>
							<tr>
								<th rowspan="2" class="center">No</th>
								<th rowspan="2" class="center">Nama Barang</th>
								<th colspan="2" class="center">Harga</th>
								<th rowspan="2" class="center">Jenis Barang</th>
								<th rowspan="2" class="center">Opsi</th>
							</tr>
							<tr>
								<th class="center">Harga Asli</th>
								<th class="center">Harga Jual</th>
							</tr>
							<?php $i = 1; ?>
							<?php foreach($siswa as $row): ?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $row["nama"]; ?></td>
									<td><?= $row["harga_asli"]; ?></td>
									<td><?= $row["harga_jual"]; ?></td>
									<td><?= $row["jenis_barang"]; ?></td>
									<td><a href="ubah.php?id=<?= $row["id"]; ?>"></a></td>
									<td></td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div> -->