<?php

// Ambil data dari form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($konek, $_POST['nama']);
    $produk_id = mysqli_real_escape_string($konek, $_POST['produk']);
    $jumlah = mysqli_real_escape_string($konek, $_POST['jumlah']);
    $metode = mysqli_real_escape_string($konek, $_POST['cara_beli']);

    // 1. Ambil harga produk dari database
    $query_produk = mysqli_query($konek, "SELECT harga FROM produk WHERE id = '$produk_id'");
    $produk = mysqli_fetch_assoc($query_produk);

    if (!$produk) {
        $_SESSION['error'] = "Produk tidak ditemukan!";
        header("Location: form_transaksi.php");
        exit();
    }

    // 2. Hitung total harga
    $harga = $produk['harga'];
    $total_harga = $harga * $jumlah;

    // 3. Simpan ke tabel transaksi
    $sql = "INSERT INTO transaksi (
        nama,
        id_produk,
        jumlah,
        total,
        metode
    ) VALUES (
        '$nama',
        '$produk_id',
        '$jumlah',
        '$total_harga',
        '$metode'
    )";

    if (mysqli_query($konek, $sql)) {
        $_SESSION['success'] = "Transaksi berhasil dicatat! ID Transaksi: " . mysqli_insert_id($konek);
    } else {
        $_SESSION['error'] = "Error: " . mysqli_error($konek);
    }

    header("Location: index.php?page=produk");
    exit();
}

// Jika akses langsung ke file proses
header("Location: form_transaksi.php");
exit();
