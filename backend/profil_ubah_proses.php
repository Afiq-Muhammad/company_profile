<?php
// Ambil data dari form
$id = $_POST['id'];
$nama_perusahaan = $_POST['nama_perusahaan'];
$email_perusahaan = $_POST['email_perusahaan'];
$alamat_perusahaan = $_POST['alamat_perusahaan'];
$slogan = $_POST['slogan'];
$deskripsi = $_POST['deskripsi'];
$nama_ceo = $_POST['nama_ceo'];
$telp = $_POST['telp'];

// Ambil foto lama
$foto_lama_logo = $_POST['foto_lama_logo'];
$foto_lama_cover = $_POST['foto_lama_cover'];
$foto_lama_ceo = $_POST['foto_lama_ceo'];

// Direktori penyimpanan
$upload_dir = 'img/profile/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

// Fungsi untuk memproses upload foto
function processImageUpload($file, $old_file, $upload_dir)
{
    if ($file['error'] === 0) {
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];

        // Cek ekstensi file
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_ext = ['png', 'jpg', 'jpeg'];

        if (in_array($file_ext, $allowed_ext)) {
            // Cek ukuran file (maksimal 2MB)
            if ($file_size <= 2 * 1024 * 1024) {
                // Generate nama file unik
                $new_file_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = $upload_dir . $new_file_name;

                // Resize image
                list($width, $height) = getimagesize($file_tmp);
                $new_width = 800; // Set desired width
                $new_height = 800; // Set desired height

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
                if ($old_file && file_exists($upload_dir . $old_file)) {
                    unlink($upload_dir . $old_file);
                }

                return $new_file_name;
            } else {
                $_SESSION['error'] = "Ukuran file terlalu besar. Maksimal 2MB.";
                return false;
            }
        } else {
            $_SESSION['error'] = "Format file tidak didukung. Hanya format PNG, JPG, dan JPEG yang diizinkan.";
            return false;
        }
    }
    return null; // Return null if no new file uploaded
}

// Proses upload foto
$logo = processImageUpload($_FILES['foto_logo'], $foto_lama_logo, $upload_dir);
$cover = processImageUpload($_FILES['foto_cover'], $foto_lama_cover, $upload_dir);
$foto_ceo = processImageUpload($_FILES['foto_ceo'], $foto_lama_ceo, $upload_dir);

// Jika ada error dalam upload, redirect kembali
if (isset($_SESSION['error'])) {
    echo "<script>
    window.location.href = '?page=profil_ubah&id_ubah=" . $id . "';
    </script>";
    exit;
}

// Siapkan query update
$query = "UPDATE profile SET 
    nama_perusahaan = '" . mysqli_real_escape_string($konek, $nama_perusahaan) . "',
    email_perusahaan = '" . mysqli_real_escape_string($konek, $email_perusahaan) . "',
    alamat_perusahaan = '" . mysqli_real_escape_string($konek, $alamat_perusahaan) . "',
    slogan = '" . mysqli_real_escape_string($konek, $slogan) . "',
    deskripsi = '" . mysqli_real_escape_string($konek, $deskripsi) . "',
    nama_ceo = '" . mysqli_real_escape_string($konek, $nama_ceo) . "',
    telp = '" . mysqli_real_escape_string($konek, $telp) . "'";

// Tambahkan foto ke query jika ada yang diupload
if ($logo !== null) {
    $query .= ", logo = '" . mysqli_real_escape_string($konek, $logo) . "'";
}
if ($cover !== null) {
    $query .= ", cover = '" . mysqli_real_escape_string($konek, $cover) . "'";
}
if ($foto_ceo !== null) {
    $query .= ", foto_ceo = '" . mysqli_real_escape_string($konek, $foto_ceo) . "'";
}

$query .= " WHERE id = '" . mysqli_real_escape_string($konek, $id) . "'";

// Eksekusi query
if (mysqli_query($konek, $query)) {
    $_SESSION['berhasil'] = 'Data profil berhasil diubah';
    echo "<script>
    window.location.href = '?page=profil';
    </script>";
} else {
    $_SESSION['error'] = "Gagal mengubah data: " . mysqli_error($konek);
    echo "<script>
    window.location.href = '?page=profil_ubah&id_ubah=" . $id . "';
    </script>";
}
