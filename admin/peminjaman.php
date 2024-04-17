<!-- End Navbar -->


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row" style="margin-left: 0; margin-right:0;">
          <div class="card-header pb-0 d-flex col-6">
            <h6>peminjaman</h6>
          </div>
          <div class="col-6 text-end mt-3 mb-2">
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->
            <!-- <button type="button" class="btn bg-gradient-success mb-0" data-bs-toggle="modal" data-bs-target="#inputbuku"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Peminjaman</button> -->
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Buku</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Peminjaman </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Peminjaman</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengembalian</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../configs/koneksi.php";

                $query = "SELECT * FROM peminjaman INNER JOIN user ON peminjaman.UserID = user.UserID INNER JOIN buku ON peminjaman.BukuID = buku.BukuID";
                $data = mysqli_query($koneksi, $query);

                $no = 1;
                foreach ($data as $data) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <!-- <img src="../image/book.png" class="avatar avatar-sm me-3" alt="user1"> -->
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $data['NamaLengkap'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $data['Judul'] ?></p>

                    </td>
                    <td class="align-middle text-center text-sm">

                      <?php
                      
                      $status = $data['StatusPeminjaman']; 

                      $warna = ($status == "dipinjam") ? "bg-gradient-danger" : "bg-gradient-success";
                      ?>

                      <span class="badge badge-sm text-sm <?= $warna; ?>"><?= $data['StatusPeminjaman'] ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['TanggalPeminjaman']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <?php 
                      $tanggal_pengembalian = $data["TanggalPengembalian"];
                      if ($tanggal_pengembalian === null) {
                        $tanggal_pengembalian = "Belum Dikembalikan";
                    }
                      ?>
                      <span class="text-secondary text-xs font-weight-bold"><?= $tanggal_pengembalian; ?></span>
                    </td>
                    <td class="align-middle">
                      <a class="text-danger font-weight-bold text-xs" style="margin-left: 8px; margin-right: 10px;" href="../function/hapuspinjam.php?PeminjamanID=<?= $data['PeminjamanID']; ?>" onclick="return confirm('are you sure?')"> Hapus </a>
                    </td>
                    
              </tbody>



              <!-- modal edit -->
              <div class="modal fade" id="editbuku<?= $data['PeminjamanID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form" method="POST" action="../function/editpinjam.php">


                            <input type="hidden" class="form-control input-lg" name="PeminjamanID" value="<?= $data['PeminjamanID']; ?>" readonly>
                        
                        <div class="form-group">
                          <label class="control-label">Nama User</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Nama User..." name="UserID" value="<?= $data['NamaLengkap']; ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Judul Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Judul Buku..." name="Judul" value="<?= $data['Judul']; ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Tanggal Peminjaman</label>
                          <div>
                            <input type="date" class="form-control input-lg" placeholder="Tanggal Peminjaman" name="TanggalPeminjaman" value="<?= $data['TanggalPeminjaman']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Tanggal Pengembalian</label>
                          <div>
                            <input type="date" class="form-control input-lg" placeholder="Masukkan Tanggal Pengembalian..." name="TanggalPengembalian" value="<?= $data['TanggalPengembalian'] ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Status Peminjaman</label>
                          <div>
                            <select class="form-select" name="StatusPeminjaman">
                              <option value="dipinjam">dipinjam</option>
                              <option value="dikembalikan">dikembalikan</option>
                            </select>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button class="btn btn-primary" name="submit">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

              </div>


            <?php
                endforeach;

            ?>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>





  <!-- Modal -->
  <div class="modal fade" id="inputbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="../function/tambahpeminjam.php">
            <!-- <div class="form-group">
              <label class="control-label">ID Buku</label>
              <div>
                  </div>
                </div> -->
            <input type="hidden" class="form-control input-lg" placeholder="Masukkan Judul Buku..." name="PeminjamanID">
            <div class="form-group">
              <label class="control-label">Nama User</label>
              <div>
                <select class="form-select" name="UserID">
                  <option selected>User</option>
                  <?php
                  $query = "SELECT * FROM user";
                  $de = mysqli_query($koneksi, $query);
                  foreach ($de as $d) :
                  ?>
                    <option value="<?= $d['UserID']; ?>"><?= $d['NamaLengkap']; ?></option>
                  <?php
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Kategori Buku</label>
              <div>

                <select class="form-select" name="BukuID">
                  <option selected>Nama Buku</option>
                  <?php
                  $query = "SELECT * FROM buku ";
                  $de = mysqli_query($koneksi, $query);
                  foreach ($de as $d) :
                  ?>
                    <option value="<?= $d['BukuID']; ?>"><?= $d['Judul']; ?></option>
                  <?php
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Tanggal Peminjaman</label>
              <div>
                <input type="date" class="form-control input-lg" placeholder="Masukkan Tanggal Peminjaman..." name="TanggalPeminjaman">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label">Tanggal Pengembalian</label>
              <div>
                <input type="date" class="form-control input-lg" placeholder="Penerbit Buku" name="TanggalPengembalian">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Status Peminjaman</label>
              <div>
                <input type="text" class="form-control input-lg" placeholder="Masukkan Status..." name="StatusPeminjaman">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" name="submit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    <!-- end input -->