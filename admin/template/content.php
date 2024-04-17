<?php
switch ($_GET['admin']) {
    case 'dashboard':
        include "./dashboard.php";
        break;

    case 'data-buku':
        include "./buku.php";
        break;

    case 'rating-buku':
        include "./ratingbuku.php";
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
