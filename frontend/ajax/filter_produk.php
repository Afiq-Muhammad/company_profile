<?php
require_once '../koneksi.php';

$filter = isset($_POST['filter']) ? $_POST['filter'] : 'default';

// Base query
$query = "SELECT * FROM produk";

// Add sorting based on filter type
if ($filter === 'ekonomis') {
    $query .= " ORDER BY CAST(REPLACE(REPLACE(harga, '.', ''), ',', '') AS UNSIGNED) ASC";
} else {
    $query .= " ORDER BY id ASC";
}

$tmp = mysqli_query($konek, $query);

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
        </div>
    </div>
<?php endwhile;
