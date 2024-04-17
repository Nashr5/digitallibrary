<div class="container-fluid py-5 mb-5 hero-header">


    <!-- <div class="col-md-12 col-lg-5">
                    <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active rounded">
                                <img src="img/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                            </div>
                            <div class="carousel-item rounded">
                                <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <div class="container-fluid fruite py-5">
        <div class="container py-5">
            <div class="tab-class text-center">
                <div class="row g-4">
                    <div class="col-lg-7 text-start mb-3">
                        <h1>Buku-Buku di Perpustakaan</h1>
                    </div>

                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row ">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <?php
                                    include "../configs/koneksi.php";
                                    $query = "SELECT * FROM buku INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID";
                                    $data =  mysqli_query($koneksi, $query);

                                    foreach ($data as $data) :
                                    ?>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="img/book.png" class="img-fluid w-100 rounded-top" alt="">
                                                </div>

                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?= $data['Judul'] ?> </h4>
                                                    <p><?= $data['Penulis'] ?></p>
                                                    <p><?= $data['Penerbit'] ?></p>
                                                    <p><?= $data['NamaKategori'] ?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <!-- <p class="text-dark fs-5 fw-bold mb-0"></p> -->
                                                        <a href="index.php?peminjam=shop" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i>go to shop</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Fruits Shop End-->

    <!-- Tastimonial Start -->
    <div class="container-fluid testimonial py-5">
        <div class="container py-5">
            <div class="testimonial-header text-center">
                <h4 class="text-primary">Ulasan dari Pengguna</h4>
                <h1 class="display-5 mb-5 text-dark">Rating Buku dari Peminjam</h1>
            </div>
                <div class="owl-carousel testimonial-carousel">
            <?php
            include "../configs/koneksi.php";
            $query = "SELECT * FROM ulasanbuku INNER JOIN user ON ulasanbuku.UserID = user.UserID INNER JOIN buku ON ulasanbuku.BukuID = buku.BukuID";
            $data =  mysqli_query($koneksi, $query);

            foreach ($data as $d) :
            ?>
                    <div class="testimonial-item img-border-radius bg-light rounded p-4">
                        <div class="position-relative">
                            <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                            <div class="mb-4 pb-4 border-bottom border-secondary">
                                <p class="mb-0"><?= $d['Ulasan'] ?>
                                </p>
                            </div>
                            <div class="d-flex align-items-center flex-nowrap">
                                <div class="bg-secondary rounded">
                                    <img src="img/anonim.jpg" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                </div>
                                <div class="ms-4 d-block">
                                    <h4 class="text-dark"><?= $d['Judul'] ?></h4>
                                    <p class="m-0 pb-3"><?= $d['NamaLengkap'] ?></p>
                                    <div class="d-flex pe-5">
                                    <h4 class="text-dark"><?= $d['Rating'] ?> / 10</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </div>
<!-- Tastimonial End -->