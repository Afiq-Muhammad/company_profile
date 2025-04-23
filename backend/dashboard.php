<section class="section">
    <div class="container-fluid">
        <!-- ========== title-wrapper start ========== -->
        <div class="title-wrapper pt-30">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="title">
                        <h2>Dashboard</h2>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- title wrapper end -->
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon purple">
                        <i class="lni lni-cart total-icon"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Produk</h6>
                        <h3 class="text-bold mb-10"><?=
                                                    mysqli_num_rows(mysqli_query($konek, "SELECT * FROM produk"));;
                                                    ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon success">
                        <i class="lni lni-gallery total-icon"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total Galeri</h6>
                        <h3 class="text-bold mb-10"><?=
                                                    mysqli_num_rows(mysqli_query($konek, "SELECT * FROM galeri"));;
                                                    ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon primary">
                        <i class="lni lni-text-format total-icon"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Total artikel</h6>
                        <h3 class="text-bold mb-10"><?=
                                                    mysqli_num_rows(mysqli_query($konek, "SELECT * FROM artikel"));;
                                                    ?></h3>
                    </div>
                </div>
                <!-- End Icon Cart -->
            </div>
            <!-- End Col -->
            <!-- <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="icon-card mb-30">
                    <div class="icon orange">
                        <i class="lni lni-sad"></i>
                    </div>
                    <div class="content">
                        <h6 class="mb-10">Cuti/Izin/Sakit</h6>
                        <h3 class="text-bold mb-10">0</h3>
                    </div>
                </div>
                
            </div> -->
            <!-- End Col -->
        </div>
    </div>
</section>