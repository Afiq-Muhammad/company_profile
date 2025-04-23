<?php include 'header.php'; ?>
<?php include 'navbar.php'; ?>
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 'homepage';
    if (file_exists($page . '.php')) {
        include $page . '.php';
    } else {
        include '404.php';
    }
    ?>
<?php include 'footer.php'; ?>