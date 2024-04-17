<?php
session_start();

include "../configs/koneksi.php";
$KoleksiID = $_GET['KoleksiID'];
$query = "DELETE FROM koleksipribadi WHERE KoleksiID='$KoleksiID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
      
        window.location.href = '../admin/index.php?admin=koleksi'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=koleksi'
      </script>";
}
