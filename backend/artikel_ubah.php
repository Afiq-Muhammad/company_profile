<?php
$id = $_GET['id_ubah'];
$query = mysqli_query($konek, "SELECT * FROM artikel WHERE id = '$id'");
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
                <form action="?page=artikel_ubah_proses" method="post" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id" placeholder="Kode Artikel" value="<?= $pro['id'] ?>">
                    <div class="input-style-1">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" value="<?= $pro['judul'] ?>" class="form-control" name="judul" placeholder="Judul Artikel" id="judul" required>
                    </div>
                    <div class="input-style-1">
                        <label for="sinopsis">Sinopsis Artikel</label>
                        <input type="text" value="<?= $pro['sinopsis'] ?>" class="form-control" name="sinopsis" placeholder="Sinopsis Artikel" id="sinopsis" required>
                    </div>
                    <div class="input-style-1">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" id="deskripsi" placeholder="Masukkan Deskripsi Artikel" class="form-control"><?= $pro['deskripsi'] ?></textarea>
                    </div>
                    <div class="input-style-1">
                        <label>Foto</label>
                        <div style="display: flex; align-items: center;">
                            <img src="img/artikel/<?= $pro['foto']; ?>" width="100" class="rounded-3 mb-10" id="currentImage">
                            <i class="lni lni-arrow-right" style="margin: 0 10px;"></i>
                            <div id="newImageContainer">
                                <img id="newImage" width="100" class="rounded-3 mb-10" style="display: inline;">
                            </div>
                        </div>
                        <input type="hidden" name="foto_lama" value="<?= $pro['foto'] ?>">
                        <input type="file" class="form-control" accept=".jpeg, .png, .jpg" name="foto" id="foto">
                        <p class="text-danger">Ukuran file maksimal 2MB</p>
                    </div>
                    <button type="submit" class="btn btn-primary me-1" id="simpan">Simpan</button>
                    <button type="reset" class="btn btn-warning text-white me-1">Reset</button>
                    <a href="?page=artikel" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#foto').change(function() {
            var file = this.files[0];
            var saveButton = $('#simpan');

            if (file) {
                var fileSizeInKB = file.size / 1024;
                if (fileSizeInKB > 100) {
                    saveButton.prop('disabled', true);
                } else {
                    saveButton.prop('disabled', false);
                }

                // Display the new image
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#newImage').attr('src', e.target.result);
                    $('#newImageContainer').show(); // Show the new image container
                }
                reader.readAsDataURL(file);
            } else {
                saveButton.prop('disabled', true);
                $('#newImageContainer').hide(); // Hide the new image container if no file is selected
            }
        });
    });
</script>