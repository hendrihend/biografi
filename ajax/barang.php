<?php 
require('../functions.php');

$keyword = $_GET["keyword"];

$query = "SELECT * FROM barang 
			WHERE 
			nama_barang LIKE '%$keyword%' OR
			harga_asli LIKE '%$keyword%' OR
			harga_jual LIKE '%$keyword%' OR
			jenis_barang LIKE '%$keyword%'
			";
$brg = query($query);


?>
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