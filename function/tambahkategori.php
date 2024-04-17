<?php 
include "../configs/koneksi.php";

$KategoriID = $_POST['KategoriID'];
$NamaKategori = $_POST['NamaKategori'];

$sql = mysqli_query($koneksi, "SELECT * FROM kategoribuku WHERE KategoriID='$KategoriID'");
$row = mysqli_num_rows($sql);

if ($row < 1) {
    $sql2 = mysqli_query($koneksi, "INSERT INTO kategoribuku (KategoriID, NamaKategori) VALUES ('$KategoriID','$NamaKategori')" );

    if ($sql2) {
        echo "<script>
      
    
        window.location.href = '../admin/index.php?admin=kategori-buku';
      </script>";
    }else{
        echo "<script>
        alert('tambah Gagal');

        window.location.href = '../admin/index.php?admin=kategori-buku';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../admin/index.php?admin=kategori-buku';
    </script>";
}
?>