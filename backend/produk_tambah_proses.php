<?php

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$fitur = isset($_POST['fitur']) ? $_POST['fitur'] : [];

// Gabungkan semua fitur menjadi satu string dengan pemisah koma
$fitur_text = implode(', ', array_filter($fitur));

// Insert data produk
$query = "INSERT INTO produk (nama, deskripsi, harga, fitur) VALUES (
    '" . mysqli_real_escape_string($konek, $nama) . "',
    '" . mysqli_real_escape_string($konek, $deskripsi) . "',
    '" . mysqli_real_escape_string($konek, $harga) . "',
    '" . mysqli_real_escape_string($konek, $fitur_text) . "'
)";

if (mysqli_query($konek, $query)) {
    $_SESSION['berhasil'] = 'Data berhasil disimpan';
    echo "<script>
        window.location='?page=produk';
    </script>";
} else {
    echo "Gagal menyimpan data ke database: " . mysqli_error($konek);
}
