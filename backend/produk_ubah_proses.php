<?php

$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$fitur = isset($_POST['fitur']) ? $_POST['fitur'] : [];

// Gabungkan semua fitur menjadi satu string dengan pemisah koma
$fitur_text = implode(', ', array_filter($fitur));

// Update data produk
$query = "UPDATE produk SET 
    nama = '" . mysqli_real_escape_string($konek, $nama) . "',
    deskripsi = '" . mysqli_real_escape_string($konek, $deskripsi) . "',
    harga = '" . mysqli_real_escape_string($konek, $harga) . "',
    fitur = '" . mysqli_real_escape_string($konek, $fitur_text) . "'
    WHERE id = '" . mysqli_real_escape_string($konek, $id) . "'";

if (mysqli_query($konek, $query)) {
    $_SESSION['berhasil'] = 'Data berhasil diubah';
    echo "<script>
        window.location='?page=produk';
    </script>";
} else {
    echo "Gagal menyimpan data ke database: " . mysqli_error($konek);
}
