<!-- End Navbar -->


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row" style="margin-left: 0; margin-right:0;">
          <div class="card-header pb-0 d-flex col-6">
            <h6>Data User</h6>
          </div>
         
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Lengkap</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Alamat</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">level</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../configs/koneksi.php";

                $query = "SELECT * FROM user";
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
                          <h6 class="mb-0 text-sm"><?= $data['UserID'] ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $data['Username'] ?></p>
                    
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm text-sm bg-gradient-success">********</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['Email']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['NamaLengkap']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['Alamat']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['Level']; ?></span>
                    </td>
                  
                    <td class="align-middle">
                      <!-- <a class="text-secondary font-weight-bold text-xs" href="#" data-bs-toggle="modal" data-bs-target="#editbuku<?= $data['UserID']; ?>">
                        Edit
                      </a> -->
                      <a class="text-danger font-weight-bold text-xs" style="margin-left: 8px;" href="../function/hapususer.php?UserID=<?= $data['UserID']; ?>" onclick="return confirm('are you sure?')"> Hapus </a>
                    </td>
                  </tr>
              </tbody>



              <!-- modal edit -->
              <div class="modal fade" id="editbuku<?= $data['UserID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form" method="POST" action="../function/edituser.php">


                        <div class="form-group">
                          <label class="control-label">Judul Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" name="BukuID" value="<?= $data['BukuID']; ?>" readonly>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Judul Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Judul Buku..." name="Judul" value="<?= $data['Judul']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Penulis Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Penulis Buku..." name="Penulis" value="<?= $data['Penulis']; ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label">Penerbit Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Penerbit Buku" name="Penerbit" value="<?= $data['Penerbit']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Tahun Terbit Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Tahun Terbit Buku..." name="TahunTerbit" value="<?= $data['TahunTerbit'] ?>">
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
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
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





  