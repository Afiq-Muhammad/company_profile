<!-- Pricing Section -->
<section id="pricing" class="pricing section light-background mt-5">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Produk Kami</h2>
        <p>Produk kami yang berkualitas dan terjamin</p>
    </div><!-- End Section Title -->

    <!-- Filter Button -->
    <div class="container mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            <i class="bi bi-funnel me-2"></i>Filter Paket
        </button>
    </div>

    <!-- Filter Modal -->
    <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="filterModalLabel">Filter Paket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Filter by Package Type -->
                    <div class="mb-4">
                        <h6 class="mb-3">Harga</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <button class="btn btn-outline-primary filter-btn" data-filter="type" data-value="default">
                                Default
                            </button>
                            <button class="btn btn-outline-primary filter-btn" data-filter="type" data-value="ekonomis">
                                Paling ekonomis
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="resetFilters">Reset</button>
                    <button type="button" class="btn btn-primary" id="applyFilters">Terapkan</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 justify-content-center" id="productContainer">
            <?php
            $tmp = mysqli_query($konek, "SELECT * FROM produk ORDER BY id ASC");
            while ($pro = mysqli_fetch_assoc($tmp)) :
            ?>
                <!-- Standard Plan -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="pricing-card popular">
                        <h3><?= $pro['nama'] ?></h3>
                        <div class="price">
                            <span class="currency">Rp</span>
                            <span class="amount"><?= $pro['harga'] ?></span>
                            <span class="period">/ Bulan</span>
                        </div>
                        <p class="description"><?= $pro['deskripsi'] ?></p>

                        <h4>Featured Included:</h4>
                        <ul class="features-list">
                            <?php
                            $fiturArray = explode(', ', $pro['fitur']);
                            foreach ($fiturArray as $fitur) :
                            ?>
                                <li>
                                    <i class="bi bi-check-circle-fill"></i>
                                    <?= trim($fitur) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="?page=form_beli" class="btn btn-light">
                            Beli Sekarang
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endwhile ?>
        </div>
    </div>

</section><!-- /Pricing Section -->

<script>
    $(document).ready(function() {
        const filterButtons = $('.filter-btn');
        const applyFiltersBtn = $('#applyFilters');
        const resetFiltersBtn = $('#resetFilters');
        const productContainer = $('#productContainer');
        const filterModal = $('#filterModal');

        let currentFilter = 'default';

        // Reset button states when modal is shown
        filterModal.on('show.bs.modal', function() {
            filterButtons.removeClass('active btn-primary').addClass('btn-outline-primary');
        });

        filterButtons.on('click', function() {
            // Remove active class and reset to outline style from all buttons
            filterButtons.removeClass('active btn-primary').addClass('btn-outline-primary');

            // Add active class and change to filled style for clicked button
            $(this).removeClass('btn-outline-primary').addClass('active btn-primary');
            currentFilter = $(this).data('value');
        });

        applyFiltersBtn.on('click', function() {
            filterModal.modal('hide');

            // Show loading state
            productContainer.html('<div class="col-12 text-center"><div class="spinner-border text-primary" role="status"></div></div>');

            // Make AJAX request
            $.ajax({
                url: 'ajax/filter_produk.php',
                type: 'POST',
                data: {
                    filter: currentFilter
                },
                success: function(response) {
                    productContainer.html(response);
                },
                error: function() {
                    productContainer.html('<div class="col-12 text-center text-danger">Terjadi kesalahan saat memuat data</div>');
                }
            });
        });

        resetFiltersBtn.on('click', function() {
            // Reset all buttons to outline style
            filterButtons.removeClass('active btn-primary').addClass('btn-outline-primary');
            currentFilter = 'default';

            // Reload products with default filter
            applyFiltersBtn.trigger('click');
        });
    });
</script>