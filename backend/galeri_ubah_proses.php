<?php
// Ambil data dari form
$id = $_POST['id'];
$judul = $_POST['judul'];
$sinopsis = $_POST['sinopsis'];
$deskripsi = $_POST['deskripsi'];
$foto_lama = $_POST['foto_lama']; // Foto lama dari input hidden

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Cek apakah ada file foto baru yang diupload
    if ($_FILES['foto']['error'] === 0) {
        $file = $_FILES['foto'];
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Cek ekstensi file
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['png', 'jpg', 'jpeg'];

        if (in_array($file_ext, $allowed_ext)) {
            // Cek ukuran file
            if ($file_size <= 100 * 1024) { // 100KB
                // Direktori penyimpanan
                $upload_dir = 'img/galeri/';
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Generate nama file unik
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = $upload_dir . $new_file_name;

                // Resize image
                list($width, $height) = getimagesize($file_tmp);
                $new_width = 500; // Set desired width
                $new_height = 500; // Set desired height

                // Create new image
                $new_image = imagecreatetruecolor($new_width, $new_height);

                // Handle transparency for PNG
                if ($file_ext === 'png') {
                    imagealphablending($new_image, false);
                    imagesavealpha($new_image, true);
                    $transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
                    imagefilledrectangle($new_image, 0, 0, $new_width, $new_height, $transparent);
                }

                // Create image from file
                switch ($file_ext) {
                    case 'jpg':
                    case 'jpeg':
                        $source = imagecreatefromjpeg($file_tmp);
                        break;
                    case 'png':
                        $source = imagecreatefrompng($file_tmp);
                        break;
                }

                // Resize image
                imagecopyresampled($new_image, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                // Save resized image
                switch ($file_ext) {
                    case 'jpg':
                    case 'jpeg':
                        imagejpeg($new_image, $file_destination, 90);
                        break;
                    case 'png':
                        imagepng($new_image, $file_destination, 9);
                        break;
                }

                // Free memory
                imagedestroy($source);
                imagedestroy($new_image);

                // Hapus foto lama jika ada
                if ($foto_lama && file_exists($upload_dir . $foto_lama)) {
                    unlink($upload_dir . $foto_lama);
                }

                // Update data ke database dengan foto baru
                $query = "UPDATE galeri SET 
                    judul = '" . mysqli_real_escape_string($konek, $judul) . "',
                    sinopsis = '" . mysqli_real_escape_string($konek, $sinopsis) . "',
                    deskripsi = '" . mysqli_real_escape_string($konek, $deskripsi) . "',
                    foto = '" . mysqli_real_escape_string($konek, $new_file_name) . "'
                    WHERE id = '" . mysqli_real_escape_string($konek, $id) . "'";
            } else {
                echo "Ukuran file terlalu besar. Maksimal 100kb.";
                exit;
            }
        } else {
            echo "Format file tidak didukung. Hanya format PNG, JPG, dan JPEG yang diizinkan.";
            exit;
        }
    } else {
        // Jika tidak ada file baru, gunakan foto lama
        $query = "UPDATE galeri SET 
            judul = '" . mysqli_real_escape_string($konek, $judul) . "',
            sinopsis = '" . mysqli_real_escape_string($konek, $sinopsis) . "',
            deskripsi = '" . mysqli_real_escape_string($konek, $deskripsi) . "'
            WHERE id = '" . mysqli_real_escape_string($konek, $id) . "'";
    }

    // Eksekusi query
    if (mysqli_query($konek, $query)) {
        $_SESSION['berhasil'] = 'Data berhasil di ubah';
        echo "<script>
        window.location.href = '?page=galeri';
        </script>";
    } else {
        echo "Gagal mengubah data: " . mysqli_error($konek);
    }
}
