<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "barang_toko");
// $query = "DELETE barang.*, rokok.* FROM barang, rokok WHERE barang.id = rokok.id";

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data) {
	global $conn;
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$harga_asli = htmlspecialchars($data["harga_asli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$jenis_barang = htmlspecialchars($data["jenis_barang"]);

	// query input data ke dalam tabel barang
	$query = "INSERT INTO barang VALUES('', '$nama_barang', '$harga_asli', '$harga_jual', '$jenis_barang')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
	// mysqli_query($conn, "DELETE barang.id, siswa.id FROM barang, siswa WHERE barang.id = siswa.id");
	// mysqli_query($conn, "DELETE barang.*, rokok.* FROM barang, rokok WHERE barang.id = $id AND rokok.id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;
	$id = $data["id"];
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$harga_asli = htmlspecialchars($data["harga_asli"]);
	$harga_jual = htmlspecialchars($data["harga_jual"]);
	$jenis_barang = htmlspecialchars($data["jenis_barang"]);

	// query ubah data
	$query = "UPDATE barang SET nama_barang = '$nama_barang', harga_asli = '$harga_asli', harga_jual = '$harga_jual', jenis_barang = '$jenis_barang' WHERE id = $id ";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword) {
	$query = "SELECT * FROM barang
				WHERE 
				nama_barang LIKE '%$keyword%' OR
				harga_asli LIKE '%$keyword%' OR
				harga_jual LIKE '%$keyword%' OR
				jenis_barang LIKE '%$keyword%'
	";

	return query($query);
}

 ?>