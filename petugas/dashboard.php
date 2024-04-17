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
      
      
     
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
             
            </div>
          </div>
        </div>
      </footer>
    </div>