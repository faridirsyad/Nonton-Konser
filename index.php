<?php 
require 'koneksi.php';
require 'cek.php';

$result = mysqli_query($koneksi, "SELECT * FROM event");

// Check if the form is submitted
if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];

    // Use prepared statement to prevent SQL injection
    $stmt = $koneksi->prepare("SELECT * FROM event WHERE nama LIKE ?");
    $searchTerm = "%" . $searchTerm . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();

    $result = $stmt->get_result();
} else {
    // If the form is not submitted, show all users
    $result = $koneksi->query("SELECT * FROM event");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
<div class="content">
    <h1>Welcome to Nonton Konser</h1>
    <p>Pusing karna kerjaan? Nonton Konser Solusinya</p>
</div>
<div class="isi">
    <form method="post" action="">
        <input type="text" name="searchTerm" placeholder="Cari Event">
        <button type="submit" name="search">Search</button>
        <a href="tambah.php">Tambah Data</a>
    </form>
    
    <h2>Daftar Event</h2>
    <table width='80%' border=1>
        <tr>
            <th>ID</th>
            <th>Nama Event</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Lokasi</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        <?php
        while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['id'] . "</td>";
            echo "<td>" . $user_data['nama'] . "</td>";
            echo "<td>" . $user_data['deskripsi'] . "</td>";
            echo "<td>" . $user_data['tanggal'] . "</td>";
            echo "<td>" . $user_data['lokasi'] . "</td>";
            echo "<td>" . $user_data['harga'] . "</td>";
            echo "<td><a href='update.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a> | <a href='cetak.php ?id=$user_data[id]'>Cetak</a></td></tr>" ;
        }
        ?>

</div>
</body>
</html>
