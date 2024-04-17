<?php 
include "../configs/koneksi.php";

$BukuID = $_POST['BukuID'];
$Judul = $_POST['Judul'];
$Penulis = $_POST['Penulis'];
$Penerbit = $_POST['Penerbit'];
$TahunTerbit = $_POST['TahunTerbit'];
$KategoriID = $_POST['KategoriID'];

$sql = mysqli_query($koneksi, "SELECT * FROM buku WHERE BukuID='$BukuID'");
$row = mysqli_num_rows($sql);

if ($row < 1) {
    $sql2 = mysqli_query($koneksi, "INSERT INTO buku (BukuID, Judul, Penulis, Penerbit, TahunTerbit) VALUES ('$BukuID', '$Judul', '$Penulis', '$Penerbit', '$TahunTerbit')" );
    $idbukubaru = $koneksi->insert_id;

    $sql_kategori = "INSERT INTO kategoribuku_relasi (BukuID, KategoriID) VALUES ('$idbukubaru','$KategoriID')";
    $result_kategori = $koneksi->query($sql_kategori);

    if ($sql2) {
        echo "<script>
       
    
        window.location.href = '../petugas/index.php?petugas=data-buku';
      </script>";
    }else{
        echo "<script>
        alert('Input Gagal');

        window.location.href = '../petugas/index.php?petugas=data-buku';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../petugas/index.php?petugas=data-buku';
    </script>";
}
?>