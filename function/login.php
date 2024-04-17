<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include '../configs/koneksi.php';
 
// menangkap data yang dikirim dari form login
$Username = $_POST['Username'];
$Password = $_POST['Password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where Username='$Username' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
    
    if (password_verify($Password, $data['Password'])) {

	if($data['Level']=="admin"){
        
		// buat session login dan username
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:../admin/index.php?admin=dashboard");
 
	// cek jika user login sebagai pegawai
	}else if($data['Level']=="petugas"){
		// buat session login dan username
		$_SESSION['Username'] = $Username;
		$_SESSION['Level'] = "petugas";
		// alihkan ke halaman dashboard pegawai
		header("location:../petugas/index.php?petugas=dashboard");
 
	// cek jika user login sebagai pengurus
	}else if($data['Level']=="peminjam"){
		// buat session login dan Username
		$_SESSION['Username'] = $Username;
		$_SESSION['UserID'] = $data['UserID'];
		$_SESSION['Level'] = "peminjam";
		// alihkan ke halaman dashboard pengurus
		header("location:../peminjam/index.php?peminjam=dashboard");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}
}
?>