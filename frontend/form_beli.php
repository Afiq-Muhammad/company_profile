<!-- Transaction Form Section -->
<section class="transaction-section py-5 mt-5">
    <div class="container mt-5">
        <!-- Section Title -->
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold">Form Pembelian</h2>
            <p class="lead text-muted">Silakan lengkapi form di bawah ini untuk melakukan pembelian</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="transaction-form-wrapper" data-aos="fade-up" data-aos-delay="100">
                    <form action="?page=transaksi_proses" method="post" class="transaction-form">
                        <div class="row g-4">
                            <!-- Nama -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
                                </div>
                            </div>

                            <!-- Produk -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="produk">Pilih Produk</label>
                                    <select class="form-select" id="produk" name="produk" required>
                                        <option value="">Pilih Produk</option>
                                        <?php
                                        $tmp = mysqli_query($konek, "SELECT * FROM produk");
                                        while ($pro = mysqli_fetch_assoc($tmp)) :
                                        ?>
                                            <option value="<?= $pro['id'] ?>"><?= $pro['nama'] ?> - Rp <?= $pro['harga'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Jumlah Beli -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="jumlah">Jumlah Pembelian</label>
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Pembelian" min="1" required>
                                </div>
                            </div>

                            <!-- Cara Pembayaran -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="mb-2" for="cara_beli">Metode Pembayaran</label>
                                    <select class="form-select" id="cara_beli" name="cara_beli" required>
                                        <option value="" selected disabled>Pilih Metode Pembayaran</option>
                                        <option value="transfer">Transfer Bank</option>
                                        <option value="ewallet">E-Wallet</option>
                                        <option value="cod">Cash on Delivery</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg px-5">
                                    <span class="btn-text">Lanjutkan Pembelian</span>
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Form Styles */
    .transaction-form-wrapper {
        background: #fff;
        padding: 2.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
    }

    .form-floating {
        position: relative;
    }

    .form-floating>.form-control,
    .form-floating>.form-select {
        height: calc(3.5rem + 2px);
        line-height: 1.25;
        padding: 1rem 0.75rem;
        border: 1px solid #e3f2fd;
        border-radius: 10px;
        transition: all 0.3s ease;
    }

    .form-floating>label {
        padding: 1rem 0.75rem;
        color: #6c757d;
    }

    .form-floating>.form-control:focus,
    .form-floating>.form-select:focus {
        border-color: #0d83fd;
        box-shadow: 0 0 0 0.25rem rgba(13, 131, 253, 0.1);
    }

    .form-floating>.form-control:focus~label,
    .form-floating>.form-control:not(:placeholder-shown)~label,
    .form-floating>.form-select:focus~label,
    .form-floating>.form-select:not(:placeholder-shown)~label {
        color: #0d83fd;
        transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
    }

    /* Button Styles */
    .btn-primary {
        background: #0d83fd;
        border: none;
        padding: 1rem 2rem;
        border-radius: 10px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-primary:hover {
        background: #0b6ef7;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(13, 131, 253, 0.2);
    }

    .btn-primary:active {
        transform: translateY(0);
        box-shadow: none;
    }

    .btn-primary i {
        transition: transform 0.3s ease;
    }

    .btn-primary:hover i {
        transform: translateX(5px);
    }

    /* Select Styles */
    .form-select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px 12px;
        appearance: none;
    }

    /* Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    [data-aos="fade-up"] {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .transaction-form-wrapper {
            padding: 1.5rem;
        }

        .btn-primary {
            width: 100%;
        }
    }
</style>

<script>
    $(document).ready(function() {
        // Form validation and submission handling
        $('.transaction-form').on('submit', function(e) {
            const $submitBtn = $(this).find('button[type="submit"]');
            const $btnText = $submitBtn.find('.btn-text');
            const $btnIcon = $submitBtn.find('i');

            // Disable button and show loading state
            $submitBtn.prop('disabled', true);
            $btnText.text('Memproses...');
            $btnIcon.removeClass('bi-arrow-right').addClass('bi-arrow-repeat spin');
        });

        // Real-time price calculation
        const $produkSelect = $('#produk');
        const $jumlahInput = $('#jumlah');
        const $totalDisplay = $('<div>').addClass('mt-2 text-muted small');
        $jumlahInput.parent().append($totalDisplay);

        function updateTotal() {
            const selectedOption = $produkSelect.find('option:selected');
            if (selectedOption.val()) {
                const price = parseInt(selectedOption.text().split('Rp ')[1].replace(/\./g, ''));
                const quantity = parseInt($jumlahInput.val()) || 0;
                const total = price * quantity;
                $totalDisplay.text(`Total: Rp ${total.toLocaleString('id-ID')}`);
            }
        }

        $produkSelect.on('change', updateTotal);
        $jumlahInput.on('input', updateTotal);
    });
</script>