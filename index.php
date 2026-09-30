<!DOCTYPE html>
<html>
<head>
	<title>Upload File Foto PHP & MySQLi</title>
</head>
<body>
	<h2>Data Pengguna & Upload Foto</h2>

	<!-- Form Upload -->
	<form action="aksi.php" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" required></td>
			</tr>
			<tr>
				<td>Kontak</td>
				<td><input type="text" name="kontak" required></td>
			</tr>
			<tr>
				<td>Foto</td>
				<td><input type="file" name="foto" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan Data"></td>
			</tr>
		</table>
	</form>

	<br><hr><br>

	<!-- Tabel Tampil Data -->
	<table border="1" cellpadding="8" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kontak</th>
			<th>Foto</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		// Ambil data dari tabel upload_foto
		$data = mysqli_query($koneksi, "SELECT * FROM upload_foto");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo htmlspecialchars($d['nama']); ?></td>
				<td><?php echo htmlspecialchars($d['kontak']); ?></td>
				<td>
					<!-- Menampilkan gambar dari folder kategori -->
					<img src="kategori/<?php echo $d['foto']; ?>" width="100" height="100" style="object-fit: cover;">
				</td>
			</tr>
			<?php 
		}
		?>
	</table>
</body>
</html>