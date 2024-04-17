<?php 
include "../configs/koneksi.php";

if(isset($_POST['submit'])) {
    $UlasanID = $_POST['UlasanID'];
    // $BukuID = $_POST['BukuID'];
    // $UserID = $_POST['UserID'];
    $Ulasan = $_POST['Ulasan'];
    $Rating = $_POST['Rating'];
    
    
    
    $sql = "UPDATE ulasanbuku SET  Ulasan='$Ulasan', Rating='$Rating' WHERE UlasanID=$UlasanID";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
       
        window.location.href = '../admin/index.php?admin=rating-buku'
      </script>";
    } else {
        echo "Error updating record: " . $koneksi->error;
    }
}
?>