<?php
include('../api/config.php');
require('../library/fpdf182/image_alpha.php');

$pdf = new PDF_ImageAlpha();
$pdf->AddPage('L','A4');
$title = 'Laporan';
$pdf->SetTitle($title);

$id_anggota = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
$tgl  = date('Y/m/d');
$data = mysqli_fetch_array($query);

$pdf->Image('../assets/image/card/card-background.jpg',5,5,120,60);
$pdf->ImagePngWithAlpha('../assets/image/logo-unas3.png',93,48,30,15);
$pdf->Image('../assets/image/upload/user/'.$data['foto'],10,25,25,35);
$pdf->setFont('Arial','B',11);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(120,5,'KARTU ANGGOTA PERPUSTAKAAN',0,1,'C');
$pdf->Cell(120,5,'UNIVERSITAS NASIONAL',0,1,'C');
$pdf->Ln(15);
$pdf->SetTextColor(255,255,255);
$pdf->setFont('Arial','',9);
$pdf->Cell(30,5,'',0,0,'L');
$pdf->Cell(90,5,$data['nim'],0,1,'L');
$pdf->setFont('Arial','B',10);
$pdf->Cell(30,5,'',0,0,'L');
$pdf->Cell(90,5,$data['nama_lengkap'],0,1,'L');
$pdf->setFont('Arial','',9);
$pdf->Cell(30,5,'',0,0,'L');
$pdf->Cell(90,5,$data['tmpt_tgl_lahir'],0,1,'L');


// $r_anggota = mysqli_fetch_array($q_anggota);
// $pdf->setFont('Arial','',10);
// $pdf->Cell(14,5,'ID User',0,0,'L');
// $pdf->Cell(76,5,': '.$r_anggota['id_anggota'],0,0,'L');
// $pdf->Cell(10,5,'',0,1,'C');
// $pdf->setFont('Arial','',10);
// $pdf->Cell(14,5,'Nama',0,0,'L');
// $pdf->Cell(36,5,': '.$r_anggota['nama_lengkap'],0,1,'L');
// $pdf->Cell(14,5,'Alamat',0,0,'L');
// $pdf->Cell(36,5,': '.$r_anggota['alamat'],0,1,'L');
// $pdf->Ln(2);

$pdf->Output('cetak-kartu-identitas-anggota.pdf','I');
?>	