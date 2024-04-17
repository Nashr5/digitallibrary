<?php 
include "../configs/koneksi.php";

if(isset($_POST['submit'])) {
    $KategoriID = $_POST['KategoriID'];
    $NamaKategori = $_POST['NamaKategori'];

    
    
    
    $sql = "UPDATE kategoribuku SET  NamaKategori='$NamaKategori' WHERE KategoriID=$KategoriID";
    
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
       
        window.location.href = '../admin/index.php?admin=kategori-buku'
      </script>";
    } else {
        echo "Error updating record: " . $koneksi->error;
    }
}
?>