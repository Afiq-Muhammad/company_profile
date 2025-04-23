<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Pesan Masuk</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <table class="table table-striped" id="datatables">
            <thead>
                <tr>
                    <th>Nama Pengirim</th>
                    <th>Email Pengirim</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $tmp = mysqli_query($konek, "SELECT * FROM pesan");
                while ($pes = mysqli_fetch_assoc($tmp)) :
                ?>
                    <tr>
                        <td><?= $pes['nama']; ?></td>
                        <td><?= $pes['email']; ?></td>
                        <td><?= $pes['subjek']; ?></td>
                        <td><?= $pes['pesan']; ?></td>
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