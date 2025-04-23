<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Informasi Profil</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th>Logo Perusahaan</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama Ceo</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tmp = mysqli_query($konek, "SELECT * FROM profile");
                while ($pro = mysqli_fetch_assoc($tmp)) :
                ?>
                    <tr>
                        <td><img src="img/profile/<?= $pro['logo']; ?>" width="100" class="rounded-3 m-4" alt="Logo Perusahaan"></td>
                        <td><?= $pro['nama_perusahaan'] ?></td>
                        <td><?= $pro['nama_ceo'] ?></td>
                        <td>
                            <a href="?page=profil_detail&id_detail=<?= $pro['id'] ?>" class="badge bg-info me-1">Detail</a>
                            <a href="?page=profil_ubah&id_ubah=<?= $pro['id'] ?>" class="badge bg-primary me-1">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>

<?php
// Jika session berhasil ada, tampilkan alert
if (isset($_SESSION['berhasil'])) {
?>
    <script>
        Swal.fire({
            icon: 'success',
            title: '<?= $_SESSION['berhasil']; ?>',
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
    </script>
<?php
    // Setelah pesan ditampilkan, kita hapus pesan di session
    unset($_SESSION['berhasil']);
}
?>