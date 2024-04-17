<!-- Single Page Header start -->

<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5 mt-5">
    <div class="container py-5">
        <h1 class="mb-4">Buku Perpustakaan Digital</h1>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-4">
                    <!-- <div class="col-xl-3">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div> -->
                    <div class="col-6"></div>

                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="row g-4">




                        <div class="col-lg-12">


                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row g-4 justify-content-center">
                        <?php
                        include "../configs/koneksi.php";

                        $query = "SELECT * FROM buku ";
                        $data = mysqli_query($koneksi, $query);

                        foreach ($data as $data) :
                        ?>
                            <div class="col-md-6 col-lg-6 col-xl-4">
                                <div class="rounded position-relative fruite-item">
                                    <div class="fruite-img">
                                        <img src="img/book.png" class="img-fluid w-100 rounded-top" alt="">
                                    </div>
                                    <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Buku</div>
                                    <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                        <h4><?= $data['Judul'] ?></h4>
                                        <p><?= $data['Penulis'] ?></p>
                                        <div class=" justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-3"><?= $data['Penerbit'] ?></p>
                                            <?php
                                            // Misalkan $status berisi status peminjaman dari database

                                            $status = "dipinjam"; // Anda bisa mengganti ini dengan status yang sesuai dari database

                                            // Ubah teks tombol berdasarkan status dari database
                                            if ($status == "menunggu konfirmasi") {
                                                $butext = '<i class="fa fa-exclamation-circle me-2 text-warning"></i>Menunggu Konfirmasi Admin';
                                            } else {
                                                $butext = 'Pinjam';
                                            }
                                            ?>
                                            <button class="btn border border-secondary rounded-pill px-3 text-primary" data-bs-toggle="modal" data-bs-target="#inputbuku<?= $data['BukuID'] ?>"><i class="fa fa-shopping-bag me-2 text-primary"></i><?= $butext; ?></button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal  -->

                            <div class="modal fade" id="inputbuku<?= $data['BukuID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST" action="../function/tambahpinjaman.php">
                                                <!-- <div class="form-group">
                                     <label class="control-label">ID Buku</label>
                                     <div>
                                       </div>
                                     </div> -->
                                                <input type="hidden" name="PeminjamanID">
                                                <input type="hidden" name="UserID" value="<?= $_SESSION['UserID']; ?>">
                                                <input type="hidden" name="KoleksiID">


                                                <div class="form-group mb-3">
                                                    <label class="control-label mb-2">Judul Buku</label>
                                                    <div>
                                                        <input type="hidden" class="form-control input-lg" name="BukuID" value="<?= $data['BukuID']; ?>">
                                                        <input type="text" class="form-control input-lg" placeholder="<?= $data['Judul'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label class="control-label">Tanggal Pinjam Buku</label>
                                                    <div>
                                                        <input type="text" class="form-control input-lg" placeholder="Masukkan Tahun Terbit Buku..." name="TanggalPeminjaman" value="<?= date('Y-m-d'); ?>">
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group mb-3">
                                                    <label class="control-label">Status Peminjaman</label>
                                                    <select class="form-select" name="StatusPeminjaman">
                                                        <option value="dipinjam" selected>dipinjam</option>
                                                    </select>
                                                </div> -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary" name="submit">Pinjam Buku</button>
                                                </div>
                                            </form>
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
<!-- Fruits Shop End-->