<?php
/* include file konfigurasi */
$pdo = new PDO('sqlite:database.sqlite');

$name = $_POST['name'];
$conn = $_POST['conn'];
$id = $_POST['id'];

$sql = null;
/* operasi tambah atau edit? */
if($conn) {
	$sql = "INSERT INTO extraczipp(name)
		VALUES('$name')";
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
