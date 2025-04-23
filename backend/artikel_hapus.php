<?php

if (isset($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];

    // Ambil nama file foto dari database sebelum menghapus data
    $result = mysqli_query($konek, "SELECT foto FROM artikel WHERE id = '$id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foto = $row['foto'];

        // Hapus file foto jika ada
        $file_path = 'img/artikel/' . $foto;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // Query untuk menghapus data
    $query = mysqli_query($konek, "DELETE FROM artikel WHERE id = '$id'");

    if ($query) {
        $_SESSION['berhasil'] = "Data berhasil dihapus";
        echo "<script>
        window.location.href='?page=artikel';
        </script>";
    } else {
        $_SESSION['gagal'] = "Gagal menghapus data: " . mysqli_error($konek);
    }
} else {
    echo "<script>
    window.location.href= '?page=artikel';
    </script>";
}
