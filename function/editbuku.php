<?php 
include "../configs/koneksi.php";

if(isset($_POST['submit'])) {
    $BukuID = $_POST['BukuID'];
    $Judul = $_POST['Judul'];
    $Penulis = $_POST['Penulis'];
    $Penerbit = $_POST['Penerbit'];
    $TahunTerbit = $_POST['TahunTerbit'];
    
    
    
    $sql = "UPDATE buku SET Judul='$Judul', Penulis='$Penulis', Penerbit='$Penerbit', TahunTerbit='$TahunTerbit' WHERE BukuID=$BukuID";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
       
        window.location.href = '../admin/index.php?admin=data-buku'
      </script>";
    } else {
        echo "Error updating record: " . $koneksi->error;
    }
}
?>