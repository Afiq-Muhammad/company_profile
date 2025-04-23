<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div
      class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <?php
        $tmp = mysqli_query($konek, "SELECT * FROM profile ORDER BY id ASC");
        while ($pro = mysqli_fetch_assoc($tmp)) :
        ?>
          <img src="../backend/img/profile/<?= $pro['logo'] ?>" alt="">
          <h1 class="sitename"><?= $pro['nama_perusahaan'] ?></h1>
        <?php endwhile; ?>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="?page=homepage">Home</a></li>
          <li><a href="?page=profil">Profil</a></li>
          <li><a href="?page=galeri">Galeri</a></li>
          <li><a href="?page=artikel">Artikel</a></li>
          <li><a href="?page=produk">Produk</a></li>

        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="?page=kontak">Kontak</a>

    </div>
  </header>