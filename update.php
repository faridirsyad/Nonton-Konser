<?php
require 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $harga = $_POST['harga'];

    $result = mysqli_query($koneksi, "UPDATE event SET 
        nama='$nama', 
        deskripsi='$deskripsi', 
        tanggal='$tanggal', 
        lokasi='$lokasi', 
        harga='$harga'  
        WHERE id='$id'");

    header("Location: index.php");
    exit(); // Sebaiknya tambahkan exit setelah header
}

// Menampilkan data berdasarkan data yang kita pilih.
$id = $_GET['id'];

// Syntax untuk mengambil data berdasarkan id
$result = mysqli_query($koneksi, "SELECT * FROM event WHERE id='$id'");
while ($event_data = mysqli_fetch_array($result)) {
    $nama = $event_data['nama'];
    $deskripsi = $event_data['deskripsi'];
    $tanggal = $event_data['tanggal'];
    $lokasi = $event_data['lokasi'];
    $harga = $event_data['harga'];
}
?>

<html>

<head>
    <title>Edit Data Event</title>
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
    <form name="update" method="post" action="update.php">
        <table border="0">
            <tr>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
            </tr>
            <tr>
                <td>Nama Event</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" maxlength="255" value="<?php echo $deskripsi; ?>"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="date" name="tanggal" value="<?php echo $tanggal; ?>"></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td><input type="text" name="lokasi" value="<?php echo $lokasi; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga" value="<?php echo $harga; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>

</html>
