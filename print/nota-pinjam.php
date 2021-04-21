<?php
include('../api/config.php');
require('../library/fpdf182/image_alpha.php');

$pdf = new PDF_ImageAlpha();
$pdf->AddPage('P','A4');
$title = 'Nota Transaksi';
$pdf->SetTitle($title);

$tgl = date('Y/m/d');
$pdf->ImagePngWithAlpha('../assets/image/logo-unas3.png',150,10,50,20);
$pdf->setFont('Arial','B',12);
$pdf->Cell(150,5,'PERPUSTAKAAN',0,1,'L');
$pdf->setFont('Arial','B',12);
$pdf->Cell(150,5,'UNIVERSITAS NASIONAL',0,1,'L');
$pdf->setFont('Arial','B',8);
$pdf->Cell(150,5,'Jl. Sawo Manila Pejaten Ps. Minggu Jakarta Selatan 12520, Telp (021) 7806700',0,1,'L');
$pdf->setFont('Arial','B',8);
$pdf->Ln(3);
$pdf->Cell(150,5,'Jakarta, '.$tgl,0,1,'L');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,34,200,34);
$pdf->Ln(5);

$id_transaksi = $_GET['id'];
$id_anggota   = $_GET['anggota'];
$query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, pinjam.tgl_pinjam FROM transaksi 
JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi 
WHERE transaksi.id_transaksi='$id_transaksi' AND transaksi.id_anggota='$id_anggota' 
GROUP BY transaksi.id_transaksi");

while($data = mysqli_fetch_array($query)) {
    $pdf->Ln(5);
	$pdf->setFont('Arial','B',10);
    $pdf->Cell(30,5,'ID. TRANSAKSI',0,1,'L');
    $pdf->setFont('Arial','',9);
    $pdf->Cell(50,5,$data['id_transaksi'],0,1,'L');
    $pdf->setFont('Arial','B',10);
    $pdf->Cell(30,5,'ID. ANGGOTA',0,1,'L');
    $pdf->setFont('Arial','',9);
	$pdf->Cell(40,5,$data['id_anggota'],0,0,'L');
	$pdf->Cell(150,5,'TANGGAL PINJAM : '.$data['tgl_pinjam'],0,1,'R');
    $pdf->Ln(5);
}

$query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, buku.id_buku, buku.judul, 
    kategori_buku.nama_kategori, kembali.status FROM transaksi 
    LEFT JOIN buku ON buku.id_buku = transaksi.id_buku 
    LEFT JOIN kategori_buku ON kategori_buku.id_kategori = buku.id_kategori
    LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
    WHERE transaksi.id_transaksi='$id_transaksi' AND transaksi.id_anggota='$id_anggota'");

$pdf->setFont('Arial','',10);
$pdf->Cell(10,10,'NO',1,0,'C');
$pdf->Cell(50,10,'ID BUKU',1,0,'C');
$pdf->Cell(70,10,'JUDUL',1,0,'C');
$pdf->Cell(30,10,'KATEGORI',1,0,'C');
$pdf->Cell(30,10,'STATUS',1,0,'C');
$pdf->Ln(10);

$nomor = 0;
while($data = mysqli_fetch_array($query)) {
    $nomor++;
    $pdf->setFont('Arial','',8);
    $pdf->Cell(10,5,$nomor,1,0,'C');
    $pdf->Cell(50,5,$data['id_buku'],1,0,'C');
    $pdf->Cell(70,5,$data['judul'],1,0,'L');
    $pdf->Cell(30,5,$data['nama_kategori'],1,0,'C');
    $pdf->Cell(30,5,$data['status'],1,1,'C');
}

$setting = mysqli_query($conn, "SELECT * FROM setting 
    JOIN anggota ON anggota.id_aplikasi = setting.id_aplikasi
    AND id_anggota='$id_anggota'");
$setting = mysqli_fetch_array($setting);

$pdf->Ln(1);
$pdf->Cell(187,6,'*Lama pengembalian adalah '.$setting['max_hari'].' hari dari tanggal peminjaman',0,1,'L');

$total = mysqli_query($conn, "SELECT SUM(denda) AS total FROM kembali 
    WHERE id_transaksi='$id_transaksi'");
$total = mysqli_fetch_array($total);

$pdf->Ln(5);
$pdf->setFont('Arial','B',10);
$pdf->Cell(30,5,'PERHITUNGAN BIAYA DENDA PENGEMBALIAN',0,0,'L');
$pdf->Ln(5);
$pdf->setFont('Arial','',8);
$pdf->Cell(50,5,'Harga Denda x Hari Keterlambatan',0,0,'L');
$pdf->Cell(140,5,'Rp. '.number_format($setting['jml_denda'],2,',','.').' x '.$total['total']/$setting['jml_denda'].' Hari',0,1,'L');
$pdf->Cell(50,5,'Total Biaya Denda',0,0,'L');
$pdf->Cell(140,5,'Rp. '.number_format($total['total'],2,',','.'),0,1,'L');
$pdf->Ln(10);
$pdf->Ln(5);
$pdf->Cell(187,6,'TERIMA KASIH TELAH BERKUNJUNG',0,1,'C');

$pdf->Output($id_transaksi,'I');
?>