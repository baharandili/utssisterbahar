<?php
/* include file konfigurasi */
$pdo = new PDO('sqlite:database.sqlite');

$nama = $_POST['nama'];
$conn = $_POST['conn'];
$id = $_POST['id'];

$sql = null;
/* operasi tambah atau edit? */
if($conn) {
	$sql = "INSERT INTO zippy(nama)
		VALUES('$nama')";
}

$result = $pdo -> exec($sql);

//apakah operasi data sukses?
if($result) {
	echo '<script>alert("Berhasil!!")</script>';
	header('location:index.php');
} else {
	echo '<script>alert("Gagal!")</script>';
	header('location:index.php');
}
sqlite_close();?>
