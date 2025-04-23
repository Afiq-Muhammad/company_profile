<?php
$id = $_GET['id_ubah'];
$query = mysqli_query($konek, "SELECT * FROM profile WHERE id = '$id'");
$pro = mysqli_fetch_assoc($query);
?>
<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Ubah Data</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <div class="card col-md-6">
            <div class="card-body">
                <form action="?page=profil_ubah_proses" method="post" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id" placeholder="Kode Produk" value="<?= $pro['id'] ?>">
                    <div class="input-style-1">
                        <div class="input-style-1">
                            <label>Logo</label>
                            <div style="display: flex; align-items: center;">
                                <img src="img/profile/<?= $pro['logo']; ?>" width="100" class="rounded-3 mb-10" id="currentImage">
                            </div>
                            <input type="hidden" name="foto_lama_logo" value="<?= $pro['logo'] ?>">
                            <input type="file" class="form-control" accept=".jpeg, .png, .jpg" name="foto_logo" id="foto_logo">
                        </div>
                    </div>
                    <div class="input-style-1">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input type="text" value="<?= $pro['nama_perusahaan'] ?>" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" id="nama_perusahaan" required>
                    </div>
                    <div class="input-style-1">
                        <label for="email_perusahaan">Email Perusahaan</label>
                        <input type="email" value="<?= $pro['email_perusahaan'] ?>" class="form-control" name="email_perusahaan" placeholder="email_perusahaan" id="email_perusahaan" required>
                    </div>
                    <div class="input-style-1">
                        <label for="alamat_perusahaan">Alamat Perusahaan</label>
                        <input type="text" value="<?= $pro['alamat_perusahaan'] ?>" class="form-control" name="alamat_perusahaan" placeholder="Alamat Perusahaan" id="alamat_perusahaan" required>
                    </div>
                    <div class="input-style-1">
                        <label for="slogan">Slogan</label>
                        <input type="text" value="<?= $pro['slogan'] ?>" class="form-control" name="slogan" placeholder="Slogan Perusahaan" id="slogan" required>
                    </div>
                    <div class="input-style-1">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" id="deskripsi" placeholder="Masukkan Deskripsi Galeri" class="form-control"><?= $pro['deskripsi'] ?></textarea>
                    </div>
                    <div class="input-style-1">
                        <label for="nama_ceo">Nama Ceo</label>
                        <input type="text" value="<?= $pro['nama_ceo'] ?>" class="form-control" name="nama_ceo" placeholder="Nama Ceo" id="nama_ceo" required>
                    </div>
                    <div class="input-style-1">
                        <label for="telp">No Telpon</label>
                        <input type="text" value="<?= $pro['telp'] ?>" class="form-control" name="telp" placeholder="No Telpon" id="telp" required>
                    </div>
                    <div class="input-style-1">
                        <div class="input-style-1">
                            <label>Cover</label>
                            <div style="display: flex; align-items: center;">
                                <img src="img/profile/<?= $pro['cover']; ?>" width="100" class="rounded-3 mb-10" id="currentImage">
                            </div>
                            <input type="hidden" name="foto_lama_cover" value="<?= $pro['cover'] ?>">
                            <input type="file" class="form-control" accept=".jpeg, .png, .jpg" name="foto_cover" id="foto_cover">
                        </div>
                    </div>
                    <div class="input-style-1">
                        <div class="input-style-1">
                            <label>Foto Ceo</label>
                            <div style="display: flex; align-items: center;">
                                <img src="img/profile/<?= $pro['foto_ceo']; ?>" width="100" class="rounded-3 mb-10" id="currentImage">
                            </div>
                            <input type="hidden" name="foto_lama_ceo" value="<?= $pro['foto_ceo'] ?>">
                            <input type="file" class="form-control" accept=".jpeg, .png, .jpg" name="foto_ceo" id="foto_ceo">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary me-1" id="simpan">Simpan</button>
                    <button type="reset" class="btn btn-warning text-white me-1">Reset</button>
                    <a href="?page=profil" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>