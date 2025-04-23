<footer id="footer" class="footer">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="?page=homepage" class="logo d-flex align-items-center">
                    <?php
                    $tmp = mysqli_query($konek, "SELECT * FROM profile");
                    while ($pro = mysqli_fetch_assoc($tmp)) :
                    ?>
                        <img src="../backend/img/profile/<?= $pro['logo'] ?>" alt="Logo" class="img-fluid me-2">
                        <span class="sitename"><?= $pro['nama_perusahaan'] ?></span>
                </a>
                <p><?= $pro['deskripsi'] ?></p>

            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Link Lainnya</h4>
                <ul>
                    <li><a href="?page=produk">Produk</a></li>
                    <li><a href="?page=galeri">Galeri</a></li>
                    <li><a href="?page=artikel">Artikel</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Lokasi</h4>
                <div class="footer-contact">
                    <p><?= $pro['alamat_perusahaan'] ?></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Kontak</h4>
                <div class="footer-contact">
                    <p class="mt-3"><strong>Telp</strong> <span><?= $pro['telp'] ?></span></p>
                    <p><strong>Email:</strong> <span><?= $pro['email_perusahaan'] ?></span></p>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Media Sosial</h4>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>



        </div>
    </div>

    <div class="container copyright text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename"><?= $pro['nama_perusahaan'] ?></strong> <span>All Rights Reserved</span>
        </p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">Afiq</a>
        </div>
    </div>
<?php endwhile; ?>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<!-- AOS Animation JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- GLightbox -->
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<!-- Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>