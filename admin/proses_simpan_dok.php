<?php

session_start();

require '../koneksi.php';

$tgl_upload = $_POST['tgl_upload'];
$kode_dokumen = $_POST['kode_dokumen'];
$unit_kerja = $_POST['unit_kerja'];
$judul_dokumen = $_POST['judul_dokumen'];
$kategori = "Administratif";
$status = "Draft";
$file = $_POST['file_upload'];
$id_author = $_SESSION['id'];

$cari = mysqli_query($connect,"SELECT * FROM tbl_dokumen WHERE kode_dokumen='$kode_dokumen'");

if($cari) {
    if($cari->num_rows > 0) {
        $keterangan = "Update Data Dokumen";
        $tanggal = date('d-m-Y, H:i:s');
        $update = mysqli_query($connect,"UPDATE tbl_dokumen SET tgl_upload='$tgl_upload',unit_kerja='$unit_kerja',judul_dokumen='$judul_dokumen',status='$status',file='$file',id_author='$id_author' WHERE kode_dokumen='$kode_dokumen';");
        mysqli_query($connect,"INSERT INTO tbl_riwayat (kode_dokumen,keterangan,tanggal) VALUES ('$kode_dokumen','$keterangan','$status','$tanggal');");
    } else {
        $keterangan = "Simpan Data Dokumen Baru";
        $tanggal = date('d-m-Y, H:i:s');
        $simpan = mysqli_query($connect,"INSERT INTO tbl_dokumen VALUES('$tgl_upload','$kode_dokumen','$unit_kerja','$judul_dokumen','$kategori','$status','$file','$id_author');");
        mysqli_query($connect,"INSERT INTO tbl_riwayat (kode_dokumen,keterangan,tanggal) VALUES ('$kode_dokumen','$keterangan','$status','$tanggal');");
    }
}

if($simpan) {
    echo "<script>alert('Berhasil Simpan Data Dokumen');</script>";
    echo "<meta http-equiv='refresh' content='0; url=tambah_dokumen.php'>";
} elseif($update) {
    echo "<script>alert('Berhasil Update Data Dokumen');</script>";
    echo "<meta http-equiv='refresh' content='0; url=tambah_dokumen.php'>";
} else {
    echo "<script>alert('Gagal Simpan Data Dokumen');</script>";
    echo "<meta http-equiv='refresh' content='0; url=tambah_dokumen.php'>";
}

$connect->close();

?>