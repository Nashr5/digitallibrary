<?php
switch ($_GET['petugas']) {
    case 'dashboard':
        include "./dashboard.php";
        break;

    case 'data-buku':
        include "./buku.php";
        break;

    default:
        # code...
        break;
}
