<div class="container py-5 mt-5">
    <!-- Section Header -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="container section-title mt-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold">Artikel Kami</h2>
                <p class="lead text-muted">Temukan artikel terbaru dan informatif dari kami</p>
            </div>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="row g-4">
        <?php
        $tmp = mysqli_query($konek, "SELECT * FROM artikel ORDER BY id ASC");
        while ($art = mysqli_fetch_assoc($tmp)) :
        ?>
            <div class="col-12 col-md-6 col-lg-4" data-category="recent" data-aos="fade-up" data-aos-delay="300">
                <div class="card article-card">
                    <div class="article-image">
                        <img src="../backend/img/artikel/<?= $art['foto'] ?>" class="img-fluid article-img">
                        <div class="article-overlay">
                            <div class="article-icons">
                                <a href="#" class="article-modal-trigger" data-bs-toggle="modal" data-bs-target="#articleModal"
                                    data-image="../backend/img/artikel/<?= $art['foto'] ?>"
                                    data-title="<?= $art['judul'] ?>"
                                    data-description="<?= $art['deskripsi'] ?>"
                                    data-type="Teknologi"
                                    data-date="<?= $art['tanggal_terbit'] ?>">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="article-content">
                        <h3><?= $art['judul'] ?></h3>
                        <p><?= $art['sinopsis'] ?></p>
                        <a href="#" class="btn btn-primary-article article-modal-trigger" data-bs-toggle="modal" data-bs-target="#articleModal"
                            data-image="../backend/img/artikel/<?= $art['foto'] ?>"
                            data-title="<?= $art['judul'] ?>"
                            data-description="<?= $art['deskripsi'] ?>"
                            data-type="Teknologi"
                            data-date="<?= $art['tanggal_terbit'] ?>">
                            Baca Selengkapnya
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Article Modal -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <button type="button" class="btn-close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bi bi-x-lg"></i>
                    </button>
                    <div class="row g-0">
                        <div class="col-md-6">
                            <div class="modal-image-wrapper">
                                <img src="" alt="Article Image" class="modal-image" id="modalArticleImage">
                            </div>
                        </div>
                        <div class="col-md-6 p-4 d-flex flex-column">
                            <div class="flex-grow-1">
                                <h3 class="modal-title mb-3" id="modalArticleTitle"></h3>
                                <p class="modal-description" id="modalArticleDescription"></p>
                            </div>
                            <div class="article-meta mt-4 pt-3 border-top">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="article-type" id="modalArticleType"></span>
                                    <span class="article-date" id="modalArticleDate"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // Article Modal
        $('.article-modal-trigger').on('click', function() {
            const image = $(this).data('image');
            const title = $(this).data('title');
            const description = $(this).data('description');
            const type = $(this).data('type');
            const date = $(this).data('date');

            $('#modalArticleImage').attr('src', image);
            $('#modalArticleTitle').text(title);
            $('#modalArticleDescription').text(description);
            $('#modalArticleType').text(type);
            $('#modalArticleDate').text(date);
        });
    });
</script>