<?php
include('../api/config.php');
require('../library/fpdf182/image_alpha.php');

$pdf = new PDF_ImageAlpha();
$pdf->AddPage('L','A4');
$title = 'Laporan';
$pdf->SetTitle($title);

$tgl = date('Y/m/d');

$pdf->ImagePngWithAlpha('../assets/image/logo-unas3.png',230,10,50,20);
$pdf->setFont('Arial','B',14);
$pdf->Cell(150,5,'PERPUSTAKAAN',0,1,'L');
$pdf->setFont('Arial','B',14);
$pdf->Cell(150,5,'UNIVERSITAS NASIONAL',0,1,'L');
$pdf->Ln(2);
$pdf->setFont('Arial','',12);
$pdf->Cell(150,5,'Jl. Sawo Manila Pejaten Ps. Minggu Jakarta Selatan 12520, Telp (021) 7806700',0,1,'L');
$pdf->setFont('Arial','',10);
$pdf->Ln(2);
$pdf->Cell(150,5,'Jakarta, '.$tgl,0,1,'L');
$pdf->SetLineWidth(0.3);
$pdf->Line(10,34,280,34);
$pdf->Ln(5);

$tgl_awal  = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$jenis     = $_POST['jenis'];

if($jenis == "Peminjaman") {
    
    $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, pinjam.tgl_pinjam, pinjam.status, buku.* FROM transaksi 
    LEFT JOIN buku ON buku.id_buku = transaksi.id_buku
    LEFT JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi
    WHERE pinjam.tgl_pinjam BETWEEN '$tgl_awal' AND '$tgl_akhir' AND pinjam.status!='Returned'");
    $nomor = 0;

    $pdf->setFont('Arial','B',12);
    $pdf->Cell(280,5,'LAPORAN PEMINJAMAN BUKU',0,1,'C');
    $pdf->Cell(280,5,'PERIODE',0,1,'C');
    $pdf->setFont('Arial','',10);
    $pdf->Cell(280,5,$tgl_awal.' s/d '.$tgl_akhir,0,1,'C');
    $pdf->Ln(5);

    $pdf->setFont('Arial','',10);
    $pdf->Cell(10,10,'NO',1,0,'C');
    $pdf->Cell(50,10,'ID TRANSAKSI',1,0,'C');
    $pdf->Cell(40,10,'ID ANGGOTA',1,0,'C');
    $pdf->Cell(40,10,'ID BUKU',1,0,'C');
    $pdf->Cell(90,10,'JUDUL',1,0,'C');
    $pdf->Cell(40,10,'TANGGAL PINJAM',1,0,'C');
    $pdf->Ln(10);

    while($data = mysqli_fetch_array($query)) {
        $nomor++;
        $pdf->setFont('Arial','',8);
        $pdf->Cell(10,6,$nomor,1,0,'C');
        $pdf->Cell(50,6,$data['id_transaksi'],1,0,'C');
        $pdf->Cell(40,6,$data['id_anggota'],1,0,'C');
        $pdf->Cell(40,6,$data['id_buku'],1,0,'C');
        $pdf->Cell(90,6,' '.$data['judul'],1,0,'L');
        $pdf->Cell(40,6,$data['tgl_pinjam'],1,1,'C');
    }

    $total = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_buku, 
    pinjam.status FROM transaksi 
    JOIN pinjam ON pinjam.id_transaksi = transaksi.id_transaksi");
    $jml   = mysqli_num_rows($total);

    $pdf->Ln(5);
    $pdf->setFont('Arial','B',10);
    $pdf->Cell(30,5,'KETERANGAN LAPORAN PEMINJAMAN BUKU',0,0,'L');
    $pdf->Ln(5);
    $pdf->setFont('Arial','',9);
    $pdf->Cell(50,6,'TOTAL PEMINJAMAN BUKU ',0,0,'L');
    $pdf->Cell(230,5,': '.$jml.' Buku',0,1,'L');

} else {

    $query = mysqli_query($conn, "SELECT transaksi.id_transaksi, transaksi.id_anggota, kembali.tgl_kembali, kembali.denda, kembali.status, buku.* FROM transaksi 
    LEFT JOIN buku ON buku.id_buku = transaksi.id_buku
    LEFT JOIN kembali ON kembali.id_transaksi = transaksi.id_transaksi
    WHERE kembali.tgl_kembali BETWEEN '$tgl_awal' AND '$tgl_akhir' AND kembali.status='Returned'");
    $nomor = 0;

    $pdf->setFont('Arial','B',12);
    $pdf->Cell(280,5,'LAPORAN PENGEMBALIAN BUKU',0,1,'C');
    $pdf->Cell(280,5,'PERIODE',0,1,'C');
    $pdf->setFont('Arial','',10);
    $pdf->Cell(280,5,$tgl_awal.' s/d '.$tgl_akhir,0,1,'C');
    $pdf->Ln(5);

    $pdf->setFont('Arial','',10);
    $pdf->Cell(10,10,'NO',1,0,'C');
    $pdf->Cell(50,10,'ID TRANSAKSI',1,0,'C');
    $pdf->Cell(40,10,'ID ANGGOTA',1,0,'C');
    $pdf->Cell(40,10,'ID BUKU',1,0,'C');
    $pdf->Cell(80,10,'JUDUL',1,0,'C');
    $pdf->Cell(20,10,'TANGGAL',1,0,'C');
    $pdf->Cell(30,10,'DENDA',1,0,'C');
    $pdf->Ln(10);

    while($data = mysqli_fetch_array($query)) {
        $nomor++;
        
        $pdf->setFont('Arial','',8);
        $pdf->Cell(10,6,$nomor,1,0,'C');
        $pdf->Cell(50,6,$data['id_transaksi'],1,0,'C');
        $pdf->Cell(40,6,$data['id_anggota'],1,0,'C');
        $pdf->Cell(40,6,$data['id_buku'],1,0,'C');
        $pdf->Cell(80,6,' '.$data['judul'],1,0,'L');
        $pdf->Cell(20,6,$data['tgl_kembali'],1,0,'C');
        $pdf->Cell(30,6,'Rp. '.number_format($data['denda'],2,',','.').' ',1,1,'R');
    }

    $total = mysqli_query($conn, "SELECT *, SUM(denda) AS total FROM kembali WHERE tgl_kembali 
        BETWEEN '$tgl_awal' AND '$tgl_akhir' AND status='Returned'") or die(mysqli_error($conn));
    $data  = mysqli_fetch_array($total);
    $jml   = mysqli_num_rows($query);
    
    $pdf->Ln(5);
    $pdf->setFont('Arial','B',10);
    $pdf->Cell(30,5,'KETERANGAN LAPORAN PENGEMBALIAN BUKU',0,0,'L');
    $pdf->Ln(5);
    $pdf->setFont('Arial','',9);
    $pdf->Cell(50,5,'TOTAL PENGEMBALIAN BUKU ',0,0,'L');
    $pdf->Cell(230,5,': '.$jml.' Buku',0,1,'L');
    $pdf->Cell(50,5,'TOTAL DENDA ',0,0,'L');
    $pdf->Cell(230,5,': Rp. '.number_format($data['total'],2,',','.'),0,1,'L');
}

$pdf->Output('Laporan Pepustakaan','I');
?>