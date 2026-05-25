<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventaris Toko</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
	<?php
	if (isset($_POST['simpan'])) {
	 	$nama = $_POST['nama_barang'];
	 	$stok = $_POST['stok'];
	 	$harga = $_POST['harga'];

	 	mysqli_query($koneksi, "INSERT INTO barang(nama_barang, stok, harga) VALUES ('$nama','$stok','$harga')");
	 }
	 	?>
	<h2>Input Barang Baru</h2>
	<form method="POST" action="">
		<input type="text" name="nama_barang" placeholder="Nama Barang" required><br>
		<input type="number" name="stok" placeholder="Stok" required><br>
		<input type="number" name="harga" placeholder="Harga" required><br>
		<button type="submit" name="simpan">Simpan Data</button>
	</form>
	<hr>
	<h2> Daftar Barang</h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Nama Barang</th>
			<th>Stok</th>
			<th>Harga</th>
			<th>Aksi</th>
		</tr>
		<?php
		$no = 1;
		$data = mysqli_query($koneksi, "SELECT * FROM barang");
		while ($d = mysqli_fetch_array($data)) {
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_barang']; ?></td>
				<td><?php echo $d['stok']; ?></td>
				<td><?php echo $d['harga'];?></td>
				<td>
					<a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-edit">EDIT</a>
					<a href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Yakin hapus?')"class="btn-hapus">HAPUS</a>
				</td>
			</tr>
		<?php
		}
		?>
		</table>
 </div>
</body>
</html>