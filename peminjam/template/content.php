<?php
switch ($_GET['peminjam']) {
    case 'dashboard':
        include "./dashboard.php";
        break;

    case 'shop':
        include "./shop.php";
        break;

    case 'koleksi':
        include "./koleksi.php";
        break;

        case 'kategori-buku':
            include "./kategori.php";
            break;

        case 'peminjaman':
            include "./peminjaman.php";
            break;

        case 'koleksi':
            include "./koleksi.php";
            break;

        case 'user':
            include "./user.php";
            break;

        case 'relasi':
            include "./kategoribukurelasi.php";
            break;


    default:
        # code...
        break;
}
