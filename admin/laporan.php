<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['Level'] == "") {
    header("location:index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Perpustakaan</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Laporan Data Peminjaman Perpustakaan</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Judul</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php include '../function/datalaporan.php'; ?>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">window.print();</script>
</body>
</html>
