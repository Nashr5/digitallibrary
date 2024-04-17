<?php
session_start();



include "../configs/koneksi.php";

$UserID = $_SESSION['UserID'];
$PeminjamanID = $_POST['PeminjamanID'];
$BukuID = $_POST['BukuID'];
$TanggalPeminjaman = date("Y-m-d");
$StatusPeminjaman = "dipinjam";
// $TanggalPengembalian = date("Y-m-d");



 
$sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE PeminjamanID='$PeminjamanID'");

$row = mysqli_num_rows($sql);

if ($row < 1) { 
    $sql2 = mysqli_query($koneksi, "INSERT INTO peminjaman (PeminjamanID, BukuID, UserID, TanggalPeminjaman, StatusPeminjaman) VALUES ('$PeminjamanID', '$BukuID' ,'$UserID' , '$TanggalPeminjaman','$StatusPeminjaman')");
    $id_buku_baru = $koneksi->insert_id;

    // Simpan data ke dalam tabel kategoribuku
    $sql_kategori = "INSERT INTO koleksipribadi (PeminjamanID, UserID, BukuID) VALUES ('$id_buku_baru','$UserID','$BukuID')";
    $result_kategori = $koneksi->query($sql_kategori);


    if ($sql2) {
        echo "<script>
        
        window.location.href = '../peminjam/index.php?peminjam=shop'
      </script>";
    }else{
        echo "<script>
        alert('Input Gagal');

        window.location.href = '../peminjam/index.php?peminjam=shop';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../views/index.php?page=management-data';
    </script>";
}
?>  