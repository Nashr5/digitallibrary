<?php
session_start();

include "../configs/koneksi.php";
$KategoriID = $_GET['KategoriID'];
$query = "DELETE FROM kategoribuku WHERE KategoriID='$KategoriID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
        alert('Hapus Data Berhasil');
        window.location.href = '../admin/index.php?admin=kategori-buku'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=kategori-buku'
      </script>";
}
