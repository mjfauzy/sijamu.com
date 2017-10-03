<?php

require_once 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['pass'];

$data = mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");

$row = mysqli_fetch_array($data);

if ($row['username'] == $username AND $row['password'] == $password)  {
	session_start();
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];
	$_SESSION['nama'] = $row['nama'];
	$_SESSION['id'] = $row['id'];

	echo "<script>alert('LOGIN Berhasil');</script>";
	echo "<meta http-equiv='refresh' content='0; url=admin'>";
} else {
	echo "<script>alert('LOGIN Gagal: Username/Password Salah');</script>";
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}

?>