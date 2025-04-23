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
                <form action="?page=produk_tambah_proses" method="post" autocomplete="off" enctype="multipart/form-data">
                    <div class="input-style-1">
                        <label for="nama">Nama Produk</label>
                        <input type="text" required class="form-control" name="nama" placeholder="Nama Produk" id="nama">
                    </div>
                    <div class="input-style-1">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" required rows="5" id="deskripsi" placeholder="Masukkan Deskripsi Produk" class="form-control"></textarea>
                    </div>
                    <div class="input-style-1">
                        <label for="harga">Harga Produk</label>
                        <input type="number" class="form-control" name="harga" placeholder="Harga" id="harga">
                    </div>
                    <div class="input-style-1">
                        <label>Fitur-fitur</label>
                        <div id="fitur-container">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" name="fitur[]" placeholder="Masukkan fitur produk">
                                <button type="button" class="btn btn-danger rounded-2 p-2" onclick="removeFitur(this)">Hapus</button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success mt-2" onclick="addFitur()">Tambah Fitur</button>
                    </div>
                    <button type="submit" class="btn btn-primary me-1" id="simpan">Simpan</button>
                    <button type="reset" class="btn btn-warning text-white me-1">Reset</button>
                    <a href="?page=produk" class="btn btn-secondary">Kembali</a>
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
                if (fileSizeInKB > 40) {
                    saveButton.prop('disabled', true);
                } else {
                    saveButton.prop('disabled', false);
                }
            } else {
                saveButton.prop('disabled', true);
            }
        });
    });

    function addFitur() {
        const container = document.getElementById('fitur-container');
        const inputCount = container.getElementsByTagName('input').length;

        if (inputCount < 3) {
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="fitur[]" placeholder="Masukkan fitur produk">
                <button type="button" class="btn btn-danger rounded-2 p-2" onclick="removeFitur(this)">Hapus</button>
            `;
            container.appendChild(div);
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Maksimal 3 fitur',
                text: 'Anda hanya dapat menambahkan maksimal 3 fitur',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }

    function removeFitur(button) {
        const container = document.getElementById('fitur-container');
        const inputCount = container.getElementsByTagName('input').length;

        if (inputCount > 1) {
            button.parentElement.remove();
        } else {
            Swal.fire({
                icon: 'warning',
                title: 'Minimal 1 fitur',
                text: 'Anda harus memiliki minimal 1 fitur',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
        }
    }
</script>