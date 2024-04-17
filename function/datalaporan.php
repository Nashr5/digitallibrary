<?php

include "../configs/koneksi.php";

$sql = "SELECT * FROM peminjaman INNER JOIN user ON peminjaman.UserID = user.UserID INNER JOIN buku ON peminjaman.BukuID = buku.BukuID";

$result = $koneksi->query($sql);

// Tampilkan data dalam tabel
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $tanggal_pengembalian = $row["TanggalPengembalian"];
        if ($tanggal_pengembalian === null) {
          $tanggal_pengembalian = "Belum Dikembalikan";
        }
        echo "<tr>";
        echo "<td>" . $row['NamaLengkap'] . "</td>";
        echo "<td>" . $row['Judul'] . "</td>";
        echo "<td>" . $row['TanggalPeminjaman'] . "</td>";
        echo "<td>" . $tanggal_pengembalian . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>Tidak ada data ditemukan</td></tr>";
}

$koneksi->close();
?>