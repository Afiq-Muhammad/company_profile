<?php
$id = $_GET['id_detail'];
$query = mysqli_query($konek, "SELECT * FROM artikel WHERE id = '$id'");
$br = mysqli_fetch_assoc($query);
?>
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Detail Data</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <div class="card col-md-6">
            <div class="card-body">
                <!-- <img src="" alt=""> -->
                <img src="img/artikel/<?= $br['foto']; ?>" width="140" height="160" class="rounded-3" alt="Gambar Artikel">
                <table class="table">
                    <tr>
                        <th>Judul Artikel</th>
                        <td>:</td>
                        <td><?= $br['judul'] ?></td>
                    </tr>
                    <tr>
                        <th>Sinopsis</th>
                        <td>:</td>
                        <td><?= $br['sinopsis'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td><?= $br['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Terbit</th>
                        <td>:</td>
                        <td><?= $br['tanggal_terbit'] ?></td>
                    </tr>
                </table>
                <a href="?page=artikel" class="btn btn-secondary mt-2">Kembali</a>
            </div>
        </div>
    </div>
</section>