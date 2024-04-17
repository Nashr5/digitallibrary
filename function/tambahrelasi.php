<?php 
include "../configs/koneksi.php";

$KategoriBukuID = $_POST['KategoriBukuID'];
$BukuID = $_POST['BukuID'];
$KategoriID = $_POST['KategoriID'];

$sql = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi WHERE KategoriBukuID='$KategoriBukuID'");
$row = mysqli_num_rows($sql);

if ($row < 1) {
    $sql2 = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi (KategoriBukuID, BukuID, KategoriID) VALUES ('$KategoriBukuID','$BukuID','$KategoriID')" );

    if ($sql2) {
        echo "<script>
      
    
        window.location.href = '../admin/index.php?admin=relasi';
      </script>";
    }else{
        echo "<script>
        alert('tambah Gagal');

        window.location.href = '../admin/index.php?admin=relasi';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../admin/index.php?admin=relasi';
    </script>";
}
?>