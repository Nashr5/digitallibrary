<!-- End Navbar -->


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row" style="margin-left: 0; margin-right:0;">
          <div class="card-header pb-0 d-flex col-6">
            <h6>Rating Buku</h6>
          </div>
          <div class="col-6 text-end mt-3 mb-2">
        
            <button type="button" class="btn bg-gradient-success mb-0" data-bs-toggle="modal" data-bs-target="#inputbuku"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Rating</button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama User</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Buku</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ulasan </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../configs/koneksi.php";

                $query = "SELECT * FROM ulasanbuku INNER JOIN buku ON ulasanbuku.BukuID = buku.BukuID INNER JOIN user ON ulasanbuku.UserID = user.UserID";
                $data = mysqli_query($koneksi, $query);

                $no = 1;
                foreach ($data as $data) : ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                        
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
                      <span class="badge badge-sm text-sm bg-gradient-success"><?= $data['Rating'];?></span>
                    </td>
                    <td class="align-middle text-center" style="width: 50%;">
                      <span class="text-secondary text-xs font-weight-bold"><?= $data['Ulasan']; ?></span>
                    </td>
                    <td class="align-middle">
                      <a class="text-secondary font-weight-bold text-xs" href="#" data-bs-toggle="modal" data-bs-target="#editbuku<?= $data['UlasanID']; ?>">
                        Edit
                      </a>
                      <a class="text-danger font-weight-bold text-xs" style="margin-left: 8px;" href="../function/hapusrating.php?UlasanID=<?= $data['UlasanID']; ?>" onclick="return confirm('are you sure?')"> Hapus </a>
                    </td>
                  </tr>
              </tbody>



             
              <div class="modal fade" id="editbuku<?= $data['UlasanID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form" method="POST" action="../function/editrating.php">


                        
                            <input type="hidden" class="form-control input-lg" name="UlasanID" value="<?= $data['UlasanID']; ?>" readonly>
                         
                        
                     
                      

                        <div class="form-group">
                          <label class="control-label">Ulasan Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Ulasan Buku" name="Ulasan" value="<?= $data['Ulasan']; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label">Rating Buku</label>
                          <div>
                            <input type="text" class="form-control input-lg" placeholder="Masukkan Rating Buku 1-10..." name="Rating" value="<?= $data['Rating'] ?>">
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
 




  <div class="modal fade" id="inputbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="../function/tambahulasan.php">
            <!-- <div class="form-group">
              <label class="control-label">ID Buku</label>
              <div>
                  </div>
                </div> -->
                <input type="hidden" class="form-control input-lg" placeholder="Masukkan Judul Buku..." name="UlasanID">
            <div class="form-group">
              <label class="control-label">Nama User</label>
              <div>
              <select class="form-select" name="UserID">
              <option selected>Pilih User</option>
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
              <label class="control-label">Judul buku</label>
              <div>
                
                <select class="form-select" name="BukuID">
                  <option selected>Kategori buku</option>
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
              <label class="control-label">Ulasan Buku</label>
              <div>
                <input type="text" class="form-control input-lg" placeholder="Masukkan Kategori Buku..." name="Ulasan">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label">Rating Buku</label>
              <div>
                <input type="text" class="form-control input-lg" placeholder="Masukkan Rating Buku..." name="Rating">
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