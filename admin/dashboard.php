<?php 
include "../configs/koneksi.php";

$query = mysqli_query($koneksi, "SELECT COUNT(BukuID) as jumlah_buku FROM buku");
$jumlah_buku = mysqli_fetch_assoc($query);

$query2 = mysqli_query($koneksi, "SELECT COUNT(PeminjamanID) as jumlah_peminjam FROM peminjaman");
$jumlah_peminjam = mysqli_fetch_assoc($query2);

$query3 = mysqli_query($koneksi, "SELECT COUNT(PeminjamanID) as buku_kembali FROM peminjaman WHERE StatusPeminjaman = 'dikembalikan'");
$buku_kembali = mysqli_fetch_assoc($query3);

$query4 = mysqli_query($koneksi, "SELECT COUNT(PeminjamanID) as buku_dipinjam FROM peminjaman WHERE StatusPeminjaman = 'dipinjam'");
$buku_dipinjam = mysqli_fetch_assoc($query4);


?>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-3 text-uppercase font-weight-bold">Jumlah Buku</p>
                    <h5 class="font-weight-bolder">
                     <?= $jumlah_buku['jumlah_buku'] ?>
                    </h5>
                    <!-- <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+55%</span>
                      since yesterday
                    </p> -->
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-3 text-uppercase font-weight-bold">Jumlah Peminjam</p>
                    <h5 class="font-weight-bolder">
                     <?= $jumlah_peminjam['jumlah_peminjam'] ?>
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-tag text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Buku Dikembalikan</p>
                    <h5 class="font-weight-bolder">
                     <?= $buku_kembali['buku_kembali'] ?>
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Buku Dipinjam</p>
                    <h5 class="font-weight-bolder">
                      <?= $buku_dipinjam['buku_dipinjam'] ?>
                    </h5>
                    
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Peminjaman Buku</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <?php 
                include "../configs/koneksi.php";

                $query = "SELECT * FROM peminjaman INNER JOIN buku ON peminjaman.BukuID = buku.BukuID INNER JOIN user ON peminjaman.UserID = user.UserID ";
                $data = mysqli_query($koneksi, $query);

                $no = 1;
                foreach ($data as $data) : 
                  ?>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Username:</p>
                          <h6 class="text-sm mb-0"><?= $data['Username'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Buku:</p>
                        <h6 class="text-sm mb-0"><?= $data['Judul'] ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Status:</p>
                        <h6 class="text-sm mb-0"><?= $data['StatusPeminjaman'] ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                      <?php 
                      $tanggal_pengembalian = $data["TanggalPengembalian"];
                      if ($tanggal_pengembalian === null) {
                        $tanggal_pengembalian = "Belum Dikembalikan";
                    }
                      ?>
                        <p class="text-xs font-weight-bold mb-0">Tanggal Dikembalikan:</p>
                        <h6 class="text-sm mb-0"><?= $tanggal_pengembalian ?></h6>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>