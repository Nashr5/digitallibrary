<?php
session_start();

include "../configs/koneksi.php";

$PeminjamanID = $_POST['PeminjamanID'];
$UserID = $_POST['UserID'];
$BukuID = $_POST['BukuID'];
$StatusPeminjaman = $_POST['StatusPeminjaman'];
$TanggalPeminjaman = $_POST['TanggalPeminjaman'];
$TanggalPengembalian = $_POST['TanggalPengembalian'];


 
$sql = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE PeminjamanID='$PeminjamanID'");

$row = mysqli_num_rows($sql);

if ($row < 1) { 
    $sql2 = mysqli_query($koneksi, "INSERT INTO peminjaman (PeminjamanID, UserID, BukuID, TanggalPeminjaman, TanggalPengembalian, StatusPeminjaman) VALUES ('$PeminjamanID', '$UserID', '$BukuID' ,'$TanggalPeminjaman', '$TanggalPengembalian','$StatusPeminjaman')");
    
    if ($sql2) {
        echo "<script>
        
        window.location.href = '../admin/index.php?admin=peminjaman'
      </script>";
    }else{
        echo "<script>
        alert('Input Gagal');

        window.location.href = '../admin/index.php?admin=peminjaman';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../views/index.php?page=management-data';
    </script>";
}
?>  