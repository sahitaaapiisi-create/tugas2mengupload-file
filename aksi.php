<?php 
include 'koneksi.php';

$nama   = $_POST['nama'];
$kontak = $_POST['kontak'];

$rand     = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran   = $_FILES['foto']['size'];
$ext      = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array(strtolower($ext), $ekstensi)) {
	header("location:index.php?alert=gagal_ekstensi");
} else {
	if($ukuran < 5000000){ // Batas ukuran 5MB
		// Bersihkan nama file dari spasi
		$filename_clean = str_replace(' ', '_', $filename);
		$xx = $rand.'_'.$filename_clean;
		
		// Pindahkan file ke folder kategori
		move_uploaded_file($_FILES['foto']['tmp_name'], 'kategori/'.$xx);
		
		// Masukkan data ke tabel upload_foto
		mysqli_query($koneksi, "INSERT INTO upload_foto VALUES(NULL, '$nama', '$kontak', '$xx')");
		
		header("location:index.php?alert=berhasil");
	} else {
		header("location:index.php?alert=gagal_ukuran");
	}
}
?>