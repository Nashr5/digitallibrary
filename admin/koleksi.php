


<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="row" style="margin-left: 0; margin-right:0;">
          <div class="card-header pb-0 d-flex col-6">
            <h6>Koleksi Pribadi</h6>
          </div>
          <div class="col-6 text-end mt-3 mb-2">
           
            <button type="button" class="btn bg-gradient-success mb-0" data-bs-toggle="modal" data-bs-target="#inputbuku"><i class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Tambah Koleksi</button>
          </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Buku</th>
                 
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../configs/koneksi.php";

                $query = "SELECT * FROM koleksipribadi INNER JOIN user ON koleksipribadi.UserID = user.UserID INNER JOIN buku ON koleksipribadi.BukuID = buku.BukuID";
                $data = mysqli_query($koneksi, $query);

                $no = 1;
                foreach ($data as $data) : ?>
                  <tr>
                  <td >
                      <p class="text-xs font-weight-bold mb-0" style="margin-left: 20px;"><?= $no++ ?></p>
                    
                    </td>
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
                  
                  
                    <td class="align-middle">
                   
                      <a class="text-danger font-weight-bold text-xs" style="margin-left: 8px;" href="../function/hapuskoleksi.php?KoleksiID=<?= $data['KoleksiID']; ?>" onclick="return confirm('are you sure?')"> Hapus </a>
                    </td>
                  </tr>
              </tbody>



              
              <div class="modal fade" id="editbuku<?= $data['KoleksiID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form role="form" method="POST" action="../function/editkoleksi.php">


                       
                            <input type="hidden" class="form-control input-lg" name="KoleksiID" value="<?= $data['KoleksiID']; ?>" readonly>
                        

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





  <!-- Modal -->
  <div class="modal fade" id="inputbuku" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="../function/tambahkoleksi.php">
         
                <input type="hidden" class="form-control input-lg" placeholder="Masukkan Judul Buku..." name="KoleksiID">
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
              <label class="control-label">Nama Buku</label>
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
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button class="btn btn-primary" name="submit">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  


