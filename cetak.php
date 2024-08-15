<?php
// memanggil library FPDF
require('fpdf/fpdf.php');

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l', 'mm', 'A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial', 'B', 16);
// mencetak string
$pdf->Cell(190, 10, 'Tiket Konser', 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, 'Data Tiket Anda', 0, 1, 'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10, 10, '', 0, 1);

// Data
$pdf->SetFont('Arial', 'B', 10);
$fill = false; // Alternate row fill color


// Header
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(200, 220, 255); // Header background color
$pdf->Cell(50, 8, 'Nama', 1, 0, 'C', true);
$pdf->Cell(60, 8, 'Deskripsi', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Tanggal', 1, 0, 'C', true);
$pdf->Cell(30, 8, 'Lokasi', 1, 0, 'C', true);
$pdf->Cell(20, 8, 'Harga', 1, 1, 'C', true);


include 'koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$tiket = mysqli_query($koneksi, "SELECT * FROM event WHERE id='$id'");

while ($row = mysqli_fetch_array($tiket)) {
    $pdf->Cell(50, 8, $row['nama'], 1, 0, 'C', $fill);
    $pdf->Cell(60, 8, $row['deskripsi'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 8, $row['tanggal'], 1, 0, 'C', $fill);
    $pdf->Cell(30, 8, $row['lokasi'], 1, 0, 'C', $fill);
    $pdf->Cell(20, 8, $row['harga'], 1, 0, 'C', $fill);
    $fill = !$fill; // Toggle row fill color
}

// Simpan PDF sebagai file
$pdf->Output('F', 'Tiket.pdf');

// Berikan tautan kepada pengguna untuk mengunduh file
echo '<a href="Tiket.pdf" target="_blank">Download Tiket</a>';
?>
