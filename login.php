<?php
require 'koneksi.php';

// cek login
if(isset($_POST['login'])){

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    // Cocokan dengan database
    $cekdatabase = mysqli_query($koneksi, "SELECT * FROM login WHERE username='$username' AND password='$password'");
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung > 0){
        $_SESSION['log'] = 'True';
        header('location:index.php');
        exit();
    } else {
        echo '<script>alert("Username atau Password salah");</script>';
    }
}

// agar tidak bisa kembali ke login setelah login
if (isset($_SESSION['log'])) { 
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/stylelogreg.css">
</head>
<body>
    <form method="post" action="">
        <h1>LOGIN</h1>
        <input type="text" name="username" id="inputUsername" placeholder="Masukkan Username Anda" required>
        <input type="password" name="password" placeholder="Password" required>
        </td>

        <button type="submit" name="login">LOGIN</button>
        <a href="register.php">Register</a>
    </form>
</body>
</html>
