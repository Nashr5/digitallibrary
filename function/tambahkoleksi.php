<?php
session_start();

include "../configs/koneksi.php";

$KoleksiID = $_POST['KoleksiID'];
$UserID = $_POST['UserID'];
$BukuID = $_POST['BukuID'];


 
$sql = mysqli_query($koneksi, "SELECT * FROM koleksipribadi WHERE KoleksiID='$KoleksiID'");

$row = mysqli_num_rows($sql);

if ($row < 1) { 
    $sql2 = mysqli_query($koneksi, "INSERT INTO koleksipribadi (KoleksiID, UserID, BukuID) VALUES ('$KoleksiID', '$UserID', '$BukuID' )");
    
    if ($sql2) {
        echo "<script>
        
        window.location.href = '../admin/index.php?admin=koleksi'
      </script>";
    }else{
        echo "<script>
        alert('Input Gagal');

        window.location.href = '../admin/index.php?admin=koleksi';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../views/index.php?page=management-data';
    </script>";
}
?>  