<?php
session_start();

include "../configs/koneksi.php";
$UlasanID = $_GET['UlasanID'];
$query = "DELETE FROM ulasanbuku WHERE UlasanID='$UlasanID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
        
        window.location.href = '../admin/index.php?admin=rating-buku'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=rating-buku'
      </script>";
}
