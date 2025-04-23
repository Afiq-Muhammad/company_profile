<?php
$id = $_GET['id_detail'];
$query = mysqli_query($konek, "SELECT * FROM profile WHERE id = '$id'");
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
        <div class="card col-md-12">
            <div class="card-body">
                <!-- <img src="" alt=""> -->
                <img src="img/profile/<?= $br['logo']; ?>" width="140" height="160" class="rounded-3" alt="Gambar Artikel">
                <table class="table">
                    <tr>
                        <th>Nama Perusahaan</th>
                        <td>:</td>
                        <td><?= $br['nama_perusahaan'] ?></td>
                    </tr>
                    <tr>
                        <th>Email Perusahaan</th>
                        <td>:</td>
                        <td><?= $br['email_perusahaan'] ?></td>
                    </tr>
                    <tr>
                        <th>Alamat Perusahaan</th>
                        <td>:</td>
                        <td><?= $br['alamat_perusahaan'] ?></td>
                    </tr>
                    <tr>
                        <th>Slogan</th>
                        <td>:</td>
                        <td><?= $br['slogan'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td><?= $br['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Nama Ceo</th>
                        <td>:</td>
                        <td><?= $br['nama_ceo'] ?></td>
                    </tr>
                    <tr>
                        <th>Telp</th>
                        <td>:</td>
                        <td><?= $br['telp'] ?></td>
                    </tr>
                    <tr>
                        <th>Cover</th>
                        <td>:</td>
                        <td><img src="img/profile/<?= $br['cover'] ?>" alt="Cover Profile" width="140" height="160" class="rounded-3"></td>
                    </tr>
                    <tr>
                        <th>Foto Ceo</th>
                        <td>:</td>
                        <td><img src="img/profile/<?= $br['foto_ceo'] ?>" alt="Foto Ceo" width="140" height="160" class="rounded-3"></td>
                    </tr>
                </table>
                <a href="?page=profil" class="btn btn-secondary mt-2">Kembali</a>
            </div>
        </div>
    </div>
</section>