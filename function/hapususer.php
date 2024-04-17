<?php
session_start();

include "../configs/koneksi.php";
$UserID = $_GET['UserID'];
$query = "DELETE FROM user WHERE UserID='$UserID'";

$sql = mysqli_query($koneksi, $query);

if ($sql) {
    echo "<script>
        
        window.location.href = '../admin/index.php?admin=user'
      </script>";
} else {
    echo "<script>
        alert('Hapus Data Gagal');
        window.location.href = '../admin/index.php?admin=user'
      </script>";
}
