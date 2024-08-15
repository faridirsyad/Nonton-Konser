<?php
include "koneksi.php"; 

function isNameValid($nama){
    return preg_match('/^[a-zA-Z]+$/', $nama);
}


if(isset($_POST['register'])){
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if (!isNameValid($nama)) {
            echo '<script>alert("Nama hanya boleh terdiri dari huruf tanpa angka dan karakter spesial.")</script>';
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO login(nama,username,password) values('$nama','$username','$password') ");
            if($query){ 
                echo '<script>alert("SELAMAT PENDAFTARAN BERHASIL, SILAHKAN LOGIN.")</script>';
            } else {
                echo '<script>alert("PENDAFTARAN GAGAL.")</script>';
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="asset/stylelogreg.css">
</head>
<body>

    <form method="post" action="">
        <h1>REGISTER</h1>
        <input type="text" name="nama" id="inputNama" placeholder="Masukkan Nama Anda" required>
        <input type="text" name="username" id="inputUsername" placeholder="Masukkan Username Anda" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="register">REGISTER</button>
        <a href="login.php">Login</a>
    </form>

    
</body>
</html>