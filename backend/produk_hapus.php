<?php

if (isset($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];

    // Query untuk menghapus data
    $query = mysqli_query($konek, "DELETE FROM produk WHERE id = '$id'");

    if ($query) {
        $_SESSION['berhasil'] = "Data berhasil dihapus";
        echo "<script>
        window.location.href='?page=produk';
        </script>";
    } else {
        $_SESSION['gagal'] = "Gagal menghapus data: " . mysqli_error($konek);
    }
} else {
    // Jika tidak ada ID, redirect ke halaman produk
    echo "<script>
    window.location.href= '?page=produk';
    </script>";
}
