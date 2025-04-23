<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Informasi Produk</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <a href="?page=produk_tambah" class="btn btn-primary"><i class="lni lni-circle-plus"></i> Tambah Data</a>
        <table class="table table-striped" id="datatables">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $tmp = mysqli_query($konek, "SELECT * FROM produk");
                while ($pro = mysqli_fetch_assoc($tmp)) :
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pro['nama']; ?></td>
                        <td>
                            <a href="?page=produk_detail&id_detail=<?= $pro['id'] ?>" class="badge bg-info me-1">Detail</a>
                            <a href="?page=produk_ubah&id_ubah=<?= $pro['id'] ?>" class="badge bg-primary me-1">Edit</a>
                            <a href="?page=produk_hapus&id_hapus=<?= $pro['id'] ?>" class="badge bg-danger delete-btn" data-id="<?= $pro['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</section>
<script>
    $(document).ready(function() {
        // Tangkap semua tombol hapus
        $('.delete-btn').on('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default link

            // Ambil ID barang dari atribut data-id
            const id = $(this).data('id');

            // Tampilkan SweetAlert2 confirm
            Swal.fire({
                title: "Yakin hapus?",
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, hapus saja!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman hapus dengan ID barang
                    window.location.href = `?page=produk_hapus&id_hapus=${id}`;
                }
            });
        });
    });
</script>

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