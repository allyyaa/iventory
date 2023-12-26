<?php
include 'koneksi.php';

// Menghapus data dari tabel masuk berdasarkan id_masuk
$delete = mysqli_query($conn, "DELETE FROM masuk WHERE id_masuk = '".$_GET['id']."'");

// Mengambil data masuk yang sudah diurutkan berdasarkan id_masuk
$query = mysqli_query($conn, "SELECT * FROM masuk ORDER BY id_masuk");
$hasil = ($query);

// Nilai awal increment
$no = 1;

// Pengurutan ulang id_masuk
while ($data  = mysqli_fetch_array($hasil)) {
   // Membaca id_masuk dari record yang tersisa dalam tabel
   $id_masuk = $data['id_masuk'];

   // Proses updating id_masuk dengan nilai $no
   $query2 = mysqli_query($conn, "UPDATE masuk SET id_masuk = $no WHERE id_masuk = $id_masuk");

   // Increment $no
   $no++;
}

// Mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = mysqli_query($conn, "ALTER TABLE masuk AUTO_INCREMENT = $no");

// Jika penghapusan berhasil, redirect ke halaman Data.php, jika tidak, tampilkan pesan
if($delete) {
	header('location: Data.php');
} else {
	echo "Gagal";
}
?>
