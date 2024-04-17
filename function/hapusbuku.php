<?php
session_start();

include "../configs/koneksi.php";
$BukuID = $_GET['BukuID'];
$query = "DELETE FROM buku WHERE BukuID='$BukuID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
      
        window.location.href = '../admin/index.php?admin=data-buku'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=data-buku'
      </script>";
}
