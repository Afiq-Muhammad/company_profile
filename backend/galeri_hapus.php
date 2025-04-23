<?php

if (isset($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];

    // Ambil nama file foto dari database sebelum menghapus data
    $result = mysqli_query($konek, "SELECT foto FROM galeri WHERE id = '$id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $foto = $row['foto'];

        // Hapus file foto jika ada
        $file_path = 'img/galeri/' . $foto;
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // Query untuk menghapus data
    $query = mysqli_query($konek, "DELETE FROM galeri WHERE id = '$id'");

    if ($query) {
        $_SESSION['berhasil'] = "Data berhasil dihapus";
        echo "<script>
        window.location.href='?page=galeri';
        </script>";
    } else {
        $_SESSION['gagal'] = "Gagal menghapus data: " . mysqli_error($konek);
    }
} else {
    // Jika tidak ada ID, redirect ke halaman galeri
    echo "<script>
    window.location.href= '?page=galeri';
    </script>";
}
