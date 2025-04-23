<?php
$judul = $_POST['judul'];
$sinopsis = $_POST['sinopsis'];
$deskripsi = $_POST['deskripsi'];

// Set timezone ke Asia/Jakarta
date_default_timezone_set('Asia/Jakarta');

// Format tanggal Bahasa Indonesia
$formatter = new IntlDateFormatter(
    'id_ID',
    IntlDateFormatter::FULL,
    IntlDateFormatter::NONE,
    'Asia/Jakarta',
    IntlDateFormatter::GREGORIAN,
    'EEEE, dd MMMM yyyy' // Format: Hari, Tanggal Bulan Tahun
);
$tanggal_terbit = $formatter->format(time());

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto'])) {
    $file = $_FILES['foto'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Cek apakah ada error saat upload
    if ($file_error === 0) {
        // Cek ekstensi file
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['png', 'jpg', 'jpeg'];

        if (in_array($file_ext, $allowed_ext)) {
            // Cek ukuran file
            if ($file_size <= 100 * 1024) { // 100KB
                // Direktori penyimpanan
                $upload_dir = 'img/artikel/';
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

                $query = "INSERT INTO artikel (judul, sinopsis, deskripsi, foto, tanggal_terbit) VALUES (
                    '" . mysqli_real_escape_string($konek, $judul) . "',
                    '" . mysqli_real_escape_string($konek, $sinopsis) . "',
                    '" . mysqli_real_escape_string($konek, $deskripsi) . "',
                    '" . mysqli_real_escape_string($konek, $new_file_name) . "',
                    '" . mysqli_real_escape_string($konek, $tanggal_terbit) . "'
                )";

                if (mysqli_query($konek, $query)) {
                    $_SESSION['berhasil'] = 'Data berhasil di simpan';
                    echo "<script>
                        window.location='?page=artikel';
                    </script>";
                } else {
                    echo "Gagal menyimpan data ke database: " . mysqli_error($konek);
                }
            } else {
                echo "Ukuran file terlalu besar. Maksimal 100kb.";
            }
        } else {
            echo "Format file tidak didukung. Hanya format PNG, JPG, dan JPEG yang diizinkan.";
        }
    } else {
        echo "Terjadi kesalahan saat upload file.";
    }
} else {
    echo "Tidak ada file yang diupload.";
}
