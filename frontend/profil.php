<!-- About Section -->
<?php
$tmp = mysqli_query($konek, "SELECT * FROM profile");
while ($pro = mysqli_fetch_assoc($tmp)) :
?>
    <section id="about" class="about section mt-5">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 align-items-center justify-content-between">

                <div class="col-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <h2 class="about-title"><?= $pro['nama_perusahaan'] ?>: <?= $pro['slogan'] ?></h2>
                    <p class="about-description"><?= $pro['deskripsi'] ?></p>

                    <div class="info-wrapper">
                        <div class="row gy-4">
                            <div class="col-lg-5">
                                <div class="profile d-flex align-items-center gap-3">
                                    <img src="../backend/img/profile/<?= $pro['foto_ceo'] ?>" alt="CEO Profile" class="profile-image">
                                    <div>
                                        <h4 class="profile-name"><?= $pro['nama_ceo'] ?></h4>
                                        <p class="profile-position">CEO &amp; Founder</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="contact-info d-flex align-items-center gap-2">
                                    <i class="bi bi-telephone-fill"></i>
                                    <div>
                                        <p class="contact-label">Telpon kapan saja</p>
                                        <p class="contact-number"><?= $pro['telp'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="image-wrapper">
                        <div class="images position-relative" data-aos="zoom-out" data-aos-delay="400">
                            <img src="../backend/img/profile/<?= $pro['cover'] ?>" alt="Cover"
                                class="img-fluid main-image rounded-4">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->
<?php endwhile; ?>

<!-- Vision & Mission Section -->
<section id="vision-mission" class="vision-mission section py-5">
    <div class="container">
        <div class="section-title text-center mb-5" data-aos="fade-up">
            <h2>Visi & Misi</h2>
            <p>Mengenal lebih dekat tujuan dan komitmen kami</p>
        </div>

        <div class="row g-4">
            <!-- Vision Card -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <div class="about-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-wrapper mb-4">
                            <i class="bi bi-eye-fill"></i>
                        </div>
                        <h3 class="card-title mb-3">Visi Kami</h3>
                        <p class="card-text">Menjadi penyedia layanan internet terdepan yang menghubungkan jutaan keluarga dan bisnis di Indonesia dengan konektivitas berkualitas tinggi, mendukung transformasi digital, dan menciptakan masa depan yang lebih terhubung.</p>
                    </div>
                </div>
            </div>

            <!-- Mission Card -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="about-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="icon-wrapper mb-4">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h3 class="card-title mb-3">Misi Kami</h3>
                        <ul class="mission-list list-unstyled">
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Menyediakan layanan internet yang cepat, stabil, dan terjangkau</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Membangun infrastruktur jaringan yang handal dan berkelanjutan</span>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Memberikan layanan pelanggan yang prima dan responsif</span>
                            </li>
                            <li class="d-flex align-items-center">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Mendukung inovasi dan pengembangan teknologi digital</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <div class="values-section mt-5" data-aos="fade-up" data-aos-delay="300">
            <h3 class="text-center mb-4">Nilai-nilai Kami</h3>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h5>Integritas</h5>
                        <p class="small">Menjunjung tinggi kejujuran dan transparansi</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-lightning-fill"></i>
                        </div>
                        <h5>Inovasi</h5>
                        <p class="small">Terus berinovasi untuk layanan terbaik</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h5>Kolaborasi</h5>
                        <p class="small">Bekerja sama untuk hasil terbaik</p>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="value-card text-center h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <h5>Keunggulan</h5>
                        <p class="small">Memberikan layanan terbaik</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Clients Section -->
<section id="clients" class="clients section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 2,
                            "spaceBetween": 40
                        },
                        "480": {
                            "slidesPerView": 3,
                            "spaceBetween": 60
                        },
                        "640": {
                            "slidesPerView": 4,
                            "spaceBetween": 80
                        },
                        "992": {
                            "slidesPerView": 6,
                            "spaceBetween": 120
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
                <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Clients Section -->