<!-- Single Page Header start -->
<div class="container-fluid py-5">

</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
    <div class="container py-5">
        <h1 class="mb-4">Perpustakaan Digital</h1>
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
            
                <div class="col-lg-9">
                    <div class="row g-4">
                        <?php
                        include "../configs/koneksi.php";
                        $user_id = $_SESSION['UserID'];

                        $query = "SELECT * FROM koleksipribadi INNER JOIN buku ON koleksipribadi.BukuID = buku.BukuID INNER JOIN user ON koleksipribadi.UserID = user.UserID WHERE koleksipribadi.UserID = $user_id ";
                        $data = mysqli_query($koneksi, $query);
                        if(mysqli_num_rows($data) === 0) {
                            echo "Tidak ada buku yang Anda pinjam";
                        }

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
                                        <div class="d-flex justify-content-between flex-lg-wrap">
                                            <p class="text-dark fs-5 fw-bold mb-3"><?= $data['Penerbit'] ?></p>
                                            <button class="btn border border-secondary rounded-pill px-3 text-primary" data-bs-toggle="modal" data-bs-target="#ulasan<?= $data['BukuID']; ?>"><i class="fa fa-star me-2 text-primary"></i>Berikan Ulasan</button>
                                            <button class="btn border border-secondary rounded-pill px-3 text-primary mt-4" data-bs-toggle="modal" data-bs-target="#inputbuku<?= $data['PeminjamanID'] ?>"><i class="fa fa-arrow-rotate-left me-2 text-primary"></i>Kembalikan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal  kembalikan -->
                            <div class="modal fade" id="inputbuku<?= $data['PeminjamanID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST" action="../function/kembalikan.php">
                                                <!-- <div class="form-group">
                                     <label class="control-label">ID Buku</label>
                                     <div>
                                       </div>
                                     </div> -->

                                                <input type="hidden" name="PeminjamanID" value="<?= $data['PeminjamanID']; ?>">
                                                <input type="hidden" name="BukuID" value="<?= $data['BukuID']; ?>">
                                                <input type="hidden" name="UserID" value="<?= $_SESSION['UserID']; ?>">

                                                <div class="modal-body">
                                                    <p>Apakah Anda ingin mengembalikan buku <b><i> <?= $data['Judul']; ?> </i></b> </p>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" name="submit">Kembalikan Buku</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- modal ulasan -->
                            
                            <div class="modal fade" id="ulasan<?= $data['BukuID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Ulasan Buku</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" method="POST" action="../function/kirimulasan.php">
                                                <!-- <div class="form-group">
                                                                 <label class="control-label">ID Buku</label>
                                                                 <div>
                                                                   </div>
                                                                 </div> -->
                                                <input type="hidden" name="BukuID" value="<?= $data['BukuID']; ?>">
                                                <input type="hidden" name="UserID" value="<?= $_SESSION['UserID']; ?>">
                            
                                                <div class="form-group mb-3">
                                                    <label class="control-label mb-2">Rating</label>
                                                    <div class="d-flex">
                                                        <i class="fa fa-star fa-lg text-warning" style="margin-right: 3%; margin-top: 15px;"></i> <input type="number" class="form-control " style="width: 25%;" name="Rating" placeholder="1-10" min="1" max="10">
                                                    </div>
                                                </div>
                            
                                                <div class="form-group mb-3">
                                                    <label class="control-label mb-2">Ulasan</label>
                                                    <div>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Masukkan Ulasan Anda" name="Ulasan"></textarea>
                                                        <!-- <input type="text" style="height: 150px;" class="form-control input-lg" name="Ulasan" placeholder="Masukan Ulasan Anda"> -->
                                                    </div>
                                                </div>
                            
                            
                            
                            
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" name="submit">Kirim Ulasan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>

                        <!-- <div class="col-12">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    <a href="#" class="rounded">&laquo;</a>
                                <a href="#" class="active rounded">1</a>
                                <a href="#" class="rounded">2</a>
                                <a href="#" class="rounded">3</a>
                                <a href="#" class="rounded">4</a>
                                <a href="#" class="rounded">5</a>
                                <a href="#" class="rounded">6</a>
                                <a href="#" class="rounded">&raquo;</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Fruits Shop End-->
