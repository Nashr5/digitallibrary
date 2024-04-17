<?php
session_start();

include "../configs/koneksi.php";

$UlasanID = $_POST['UlasanID'];
$UserID = $_POST['UserID'];
$BukuID = $_POST['BukuID'];
$Ulasan = $_POST['Ulasan'];
$Rating = $_POST['Rating'];
$TanggalPengembalian = $_POST['TanggalPengembalian'];


 
$sql = mysqli_query($koneksi, "SELECT * FROM ulasanbuku WHERE UlasanID='$UlasanID'");

$row = mysqli_num_rows($sql);

if ($row < 1) { 
    $sql2 = mysqli_query($koneksi, "INSERT INTO ulasanbuku (UlasanID, UserID, BukuID, Rating, Ulasan) VALUES ('$UlasanID', '$UserID', '$BukuID' ,'$Rating','$Ulasan')");
    
    if ($sql2) {
        echo "<script>
        
        window.location.href = '../admin/index.php?admin=rating-buku'
      </script>";
    }else{
        echo "<script>
        alert('Input Gagal');

        window.location.href = '../admin/index.php?admin=rating-buku';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../views/index.php?page=management-data';
    </script>";
}
?>  