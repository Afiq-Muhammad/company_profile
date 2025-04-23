<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Tambah Data</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <div class="card col-md-6">
            <div class="card-body">
                <form action="?page=artikel_tambah_proses" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="input-style-1">
                        <label>Foto</label>
                        <input type="file" class="form-control" accept=".jpeg, .png, .jpg" name="foto" id="foto" onchange="checkFileSize()">
                        <p class="text-danger">Ukuran file maksimal 40Kb</p>
                    </div>
                    <div class="input-style-1">
                        <label for="judul">Judul Artikel</label>
                        <input type="text" class="form-control" name="judul" placeholder="Judul Artikel" id="judul">
                    </div>
                    <div class="input-style-1">
                        <label for="sinopsis">Sinopsis Artikel</label>
                        <input type="text" class="form-control" name="sinopsis" placeholder="Sinopsis Artikel" id="sinopsis">
                    </div>
                    <div class="input-style-1">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" rows="5" id="deskripsi" placeholder="Masukkan Deskripsi Produk" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary me-1" id="simpan">Simpan</button>
                    <button type="reset" class="btn btn-warning text-white me-1">Reset</button>
                    <a href="?page=galeri" class="btn btn-secondary">Kembali</a>
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
            } else {
                saveButton.prop('disabled', true);
            }
        });
    });
</script>