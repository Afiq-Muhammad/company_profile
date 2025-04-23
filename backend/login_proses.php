<?php
include 'koneksi.php';
session_start();

$nip = $_POST['nip'];
$password = md5($_POST['password']);
$tmp = mysqli_query($konek, "SELECT * FROM user WHERE nip='$nip' AND password='$password'");

if (mysqli_num_rows($tmp)) {
    $data = mysqli_fetch_assoc($tmp);
    $_SESSION['nip'] = $data['nip'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['status'] = 'login';
    $_SESSION['foto'] = $data['foto'];

    // Set alert message in session
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => 'Selamat datang, ' . $data['username']
    ];

    header("Location: index.php");
} else {
    // Set alert message in session
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => 'NIP dan password tidak sesuai'
    ];

    header("Location: login.php");
}
