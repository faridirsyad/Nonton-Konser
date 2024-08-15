<?php
require 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    $result = mysqli_query($koneksi, "INSERT INTO event (nama, deskripsi, tanggal, lokasi, harga) VALUES ('$nama', '$deskripsi', '$tanggal', '$lokasi', $harga)");

    header("Location: index.php");
    exit(); // Sebaiknya tambahkan exit setelah header
}

?>


<html>

<head>
    <title>Tambah Data Event</title>
    <link rel="stylesheet" href="asset/style.css">
</head>

<body>
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Me</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <h2>Tambah Data Event</h2>
    <form name="tambah" method="post" action="tambah.php">
        <table border="0">
            <tr>
                <td>Nama Event</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" maxlength="255"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal"></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><input type="text" name="lokasi"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="tambah" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>

</html>
