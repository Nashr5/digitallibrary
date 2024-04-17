<?php
include "../configs/koneksi.php";

if(isset($_POST['submit'])) {
    $PeminjamanID = $_POST['PeminjamanID'];
    $UserID = $_POST['UserID'];
    $BukuID = $_POST['BukuID'];

    // Perbarui tabel peminjaman
    $TanggalPengembalian = date("Y-m-d");
    $StatusPeminjaman = "dikembalikan";
    $sql_update_peminjaman = "UPDATE peminjaman SET TanggalPengembalian='$TanggalPengembalian', StatusPeminjaman='$StatusPeminjaman' WHERE PeminjamanID='$PeminjamanID'";

    if ($koneksi->query($sql_update_peminjaman) === TRUE) {
        // Hapus entri buku terkait dari tabel koleksi
        $sql_delete_koleksi = "DELETE FROM koleksipribadi WHERE UserID='$UserID' AND PeminjamanID='$PeminjamanID'";
        
        if ($koneksi->query($sql_delete_koleksi) === TRUE) {
            echo "<script>
                window.location.href = '../peminjam/index.php?peminjam=koleksi';
            </script>";
        } else {
            echo "Error deleting record from koleksi table: " . $koneksi->error;
        }
    } else {
        echo "Error updating record in peminjaman table: " . $koneksi->error;
    }
}
?>
