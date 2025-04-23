<?php
include 'koneksi.php';
$nama   = $_POST['nama'];
$email  = $_POST['email'];
$subjek = $_POST['subjek'];
$pesan  = $_POST['pesan'];
$query = mysqli_query($konek, "INSERT INTO pesan (nama, email, subjek, pesan) VALUES ('$nama', '$email', '$subjek', '$pesan')");
if ($query) {
    echo "<script>alert('Pesan Anda Berhasil Dikirim!'); window.location.href='?page=kontak';</script>";
} else {
    echo "<script>alert('Pesan Anda Gagal Dikirim!'); window.location.href='?page=kontak';</script>";
}
