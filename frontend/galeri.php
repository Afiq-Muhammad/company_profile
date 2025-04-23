<!-- Gallery Section -->
<section class="gallery-section py-5 mt-5">
    <div class="container">
        <!-- Section Title -->
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mt-5">Galeri Kami</h2>
            <p class="lead text-muted">Temukan momen berharga dan aktivitas kami</p>
        </div>

        <!-- Gallery Grid -->
        <div class="row g-4 gallery-container">
            <?php
            $tmp = mysqli_query($konek, "SELECT * FROM galeri");
            while ($gal = mysqli_fetch_assoc($tmp)) :
            ?>
                <div class="col-md-4 gallery-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="gallery-card">
                        <div class="gallery-image-container">
                            <img src="../backend/img/galeri/<?= $gal['foto'] ?>" class="gallery-cover" alt="Gallery Image">
                            <div class="gallery-overlay">
                                <button class="btn btn-light gallery-modal-trigger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#galleryModal"
                                    data-image="../backend/img/galeri/<?= $gal['foto'] ?>"
                                    data-title="<?= $gal['judul'] ?>"
                                    data-description="<?= $gal['deskripsi'] ?>">
                                    <i class="bi bi-zoom-in me-2"></i>Lihat Detail
                                </button>
                            </div>
                        </div>
                        <div class="gallery-content">
                            <h3 class="gallery-title"><?= $gal['judul'] ?></h3>
                            <p class="gallery-description"><?= $gal['sinopsis'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Gallery Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="modal-image-wrapper">
                                <img src="" alt="Gallery Image" class="modal-image" id="modalImage">
                            </div>
                        </div>
                        <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                            <h3 class="modal-title mb-3" id="modalTitle"></h3>
                            <p class="modal-description" id="modalDescription"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Gallery Modal
        $('.gallery-modal-trigger').on('click', function() {
            const image = $(this).data('image');
            const title = $(this).data('title');
            const description = $(this).data('description');

            $('#modalImage').attr('src', image);
            $('#modalTitle').text(title);
            $('#modalDescription').text(description);
        });
    });
</script>