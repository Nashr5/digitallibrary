<?php

include "../configs/koneksi.php";

$sql = "SELECT * FROM buku INNER JOIN kategoribuku_relasi ON buku.BukuID = kategoribuku_relasi.BukuID INNER JOIN kategoribuku ON kategoribuku_relasi.KategoriID = kategoribuku.KategoriID
INNER JOIN ulasanbuku ON buku.BukuID = ulasanbuku.BukuID";

$result = $koneksi->query($sql);

// Tampilkan data dalam tabel
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Judul'] . "</td>";
        echo "<td>" . $row['Penulis'] . "</td>";
        echo "<td>" . $row['Penerbit'] . "</td>";
        echo "<td>" . $row['TahunTerbit'] . "</td>";
        echo "<td>" . $row['NamaKategori'] . "</td>";
        echo "<td>" . $row['Rating'] . " / 10 </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
}

$koneksi->close();
?>