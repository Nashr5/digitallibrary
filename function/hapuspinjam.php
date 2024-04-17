<?php
session_start();

include "../configs/koneksi.php";
$PeminjamanID = $_GET['PeminjamanID'];
$query = "DELETE FROM peminjaman WHERE PeminjamanID='$PeminjamanID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
        
        window.location.href = '../admin/index.php?admin=peminjaman'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=peminjaman'
      </script>";
}
