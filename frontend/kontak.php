<!-- Contact Section -->
<section id="contact" class="contact section light-background mt-5">

    <!-- Section Title -->
    <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-white">Info Kontak</h3>
                    <p class="text-white">Untuk pertanyaan lebih lanjut, silakan hubungi kami melalui informasi di bawah ini.</p>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="content">
                            <h4 class="text-white">Lokasi Kami</h4>
                            <p class="text-white">A108 Adam Street</p>
                            <p class="text-white">New York, NY 535022</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4 class="text-white">Nomor Telepon</h4>
                            <p class="text-white">+1 5589 55488 55</p>
                            <p class="text-white">+1 6678 254445 41</p>
                        </div>
                    </div>

                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4 class="text-white">Email Address</h4>
                            <p class="text-white">info@example.com</p>
                            <p class="text-white">contact@example.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <h3 class="text-white">Hubungi Kami</h3>
                    <p class="text-white"> Silakan isi formulir di bawah ini untuk menghubungi kami.</p>

                    <form action="?page=pesan_proses" method="post" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama anda" required>
                                    <div class="form-icon">
                                        <i class="bi bi-person"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email anda" required>
                                    <div class="form-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subjek" placeholder="Subjek" required>
                                    <div class="form-icon">
                                        <i class="bi bi-chat-dots"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="pesan" rows="6" placeholder="Pesan" required></textarea>
                                    <div class="form-icon">
                                        <i class="bi bi-pencil"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    <span class="btn-text">Send Message</span>
                                    <span class="btn-icon"><i class="bi bi-send"></i></span>
                                </button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

</section><!-- /Contact Section -->

<style>
    /* Form Styles */
    .contact-form {
        background: #0d83fd;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .contact-form .form-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .contact-form .form-control {
        border: 1px solid #bbdefb;
        padding: 0.75rem 1rem 0.75rem 3rem;
        border-radius: 8px;
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .contact-form .form-control:focus {
        border-color: #64b5f6;
        box-shadow: 0 0 0 0.2rem rgba(100, 181, 246, 0.25);
        background-color: #fff;
    }

    .contact-form .form-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64b5f6;
        transition: all 0.3s ease;
    }

    .contact-form .form-control:focus+.form-icon {
        color: #1976d2;
    }

    .contact-form .btn-primary {
        background: #64b5f6;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        border: none;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .contact-form .btn-primary:hover {
        background: #42a5f5;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(100, 181, 246, 0.2);
    }

    .contact-form .btn-primary:active {
        transform: translateY(0);
        box-shadow: none;
    }

    .contact-form .btn-primary .btn-icon {
        transition: transform 0.3s ease;
    }

    .contact-form .btn-primary:hover .btn-icon {
        transform: translateX(5px);
    }

    /* Info Box Styles */
    .info-box {
        background: #0d83fd;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.5rem;
    }

    .info-item .icon-box {
        width: 50px;
        height: 50px;
        background: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .info-item .icon-box i {
        font-size: 1.5rem;
        color: #64b5f6;
    }

    .info-item .content h4 {
        color: #1976d2;
        margin-bottom: 0.5rem;
    }

    .info-item .content p {
        color: #666;
        margin: 0;
    }

    /* Disable pointer events on loading state */
    .contact-form.loading .btn-primary {
        pointer-events: none;
        opacity: 0.7;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .contact-form .form-control {
            padding-left: 2.5rem;
        }

        .contact-form .form-icon {
            left: 0.75rem;
        }
    }
</style>