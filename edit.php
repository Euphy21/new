<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
</head>
<body>
	<h2>Edit Data Barang</h2>
	<form method="POST" action="">
		<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
		<input type="text" name="nama_barang" value="<?php echo $d['nama_barang']; ?>"><br>
		<input type="number" name="stok" value="<?php echo $d['stok']; ?>"><br>
		<input type="number" name="harga" value="<?php echo $d['harga']; ?>"><br>
		<button type="submit" name="update">Update data</button>
	</form>

	 <?php
	 if (isset($_POST['update'])) {
	 	$id = $_POST['id'];
	 	$nama = $_POST['nama_barang'];
	 	$stok = $_POST['stok'];
	 	$harga = $_POST['harga'];
	 	mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama',stok='$stok', harga='$harga' WHERE id='$id'");
	 	header("location:index.php");
	 }
	 ?>

</body>
</html>