<?php 
session_start();

include "../configs/koneksi.php";

$UserID = $_POST['UserID'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$NamaLengkap = $_POST['NamaLengkap'];
$Email = $_POST['Email'];
$Alamat = $_POST['Alamat'];
$Level = $_POST['Level'];

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$Username'");

$row = mysqli_num_rows($sql);

if ($row < 1) { 
    $pass = password_hash($Password, PASSWORD_DEFAULT);

    $sql2 = mysqli_query($koneksi, "INSERT INTO user (UserID, NamaLengkap, Username, Password, Email, Alamat, Level) VALUES ('$UserID','$NamaLengkap', '$Username', '$pass','$Email','$Alamat','$Level')");
    
    if ($sql2) {
        echo "<script>
        alert('Register berhasil');
    
        window.location.href = '../index.php';
      </script>";
    }else{
        echo "<script>
        alert('Register Gagal');

        window.location.href = '../register.php';
        </script>";
    
    }

}else{
    echo "<script>
    alert('Username sudah digunakan');

    window.location.href = '../register.php';
    </script>";
}