<?php
include 'koneksi.php';

// Menghapus data dari tabel keluar berdasarkan id_keluar
$delete_keluar = mysqli_query($conn, "DELETE FROM keluar WHERE id_keluar = '".$_GET['id']."'");

$query_keluar = mysqli_query($conn, "SELECT * FROM keluar ORDER BY id_keluar");
$hasil_keluar = ($query_keluar);

// Nilai awal increment
$no_keluar = 1;

while ($data_keluar  = mysqli_fetch_array($hasil_keluar)) {
    $id_keluar = $data_keluar['id_keluar'];
    // Proses updating id_keluar dengan nilai $no_keluar
    $query2_keluar = mysqli_query($conn, "UPDATE keluar SET id_keluar = $no_keluar WHERE id_keluar = $id_keluar");
    // Increment $no_keluar
    $no_keluar++;
}

// Mengubah nilai auto increment menjadi $no_keluar terakhir ditambah 1
$query_keluar = mysqli_query($conn, "ALTER TABLE keluar AUTO_INCREMENT = $no_keluar");

if($delete_keluar){
    header('location: input.php');
} else {
    echo "Gagal";
}
?>
