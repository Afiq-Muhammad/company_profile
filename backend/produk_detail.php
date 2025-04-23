<?php
$id = $_GET['id_detail'];
$query = mysqli_query($konek, "SELECT * FROM produk WHERE id = '$id'");
$br = mysqli_fetch_assoc($query);

// Pecah string fitur menjadi array
$fitur_array = explode(', ', $br['fitur']);
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
                <table class="table">
                    <tr>
                        <th>Nama Produk</th>
                        <td>:</td>
                        <td><?= $br['nama'] ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td><?= $br['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>:</td>
                        <td><?= $br['harga'] ?></td>
                    </tr>
                    <tr>
                        <th>Fitur-fitur</th>
                        <td>:</td>
                        <td>
                            <ul class="list-group">
                                <?php foreach ($fitur_array as $fitur): ?>
                                    <?php if (!empty($fitur)): ?>
                                        <li class="list-group-item"><?= $fitur ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </td>
                    </tr>
                </table>
                <a href="?page=produk" class="btn btn-secondary mt-2 rounded-2">Kembali</a>
            </div>
        </div>
    </div>
</section>