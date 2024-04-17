<?php
session_start();

include "../configs/koneksi.php";
$BukuID = $_GET['BukuID'];
$query = "DELETE FROM buku WHERE BukuID='$BukuID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
      
        window.location.href = '../petugas/index.php?petugas=data-buku'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../petugas/index.php?petugas=data-buku'
      </script>";
}
