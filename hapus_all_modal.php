<?php
$delete = mysqli_query($conn, "DELETE FROM masuk WHERE id_masuk = '".$_GET['id']."'");

$query = mysqli_query($conn, "SELECT * FROM masuk ORDER BY id_masuk");
$hasil = ($query);

$no = 1;

while ($data  = mysqli_fetch_array($hasil)) {
    $id = $data['id_masuk'];
    $query2 = mysqli_query($conn, "UPDATE masuk SET id_masuk = $no WHERE id_masuk = $id");
    $no++;
}

$query = mysqli_query($conn, "ALTER TABLE masuk  AUTO_INCREMENT = $no");
//
$delete_mod = mysqli_query($conn, "DELETE FROM modal WHERE id_masuk = '".$_GET['id']."'");

$query = mysqli_query($conn, "SELECT * FROM modal ORDER BY id_masuk");
$hasil = ($query);

$no = 1;

while ($data  = mysqli_fetch_array($hasil)) {
    $id = $data['id_masuk'];
    $query2 = mysqli_query($conn, "UPDATE modal SET id_masuk = $no WHERE id_masuk = $id");
    $no++;
}

$query = mysqli_query($conn, "ALTER TABLE modal  AUTO_INCREMENT = $no");

if($delete && $delete_mod){
    header('location: Data.php');
 } else {
    echo "Gagal";
 } 

?>