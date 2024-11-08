<?php 
include 'report_header.php';
$pdf->SetFont('Times', 'B', 18);
$pdf->SetFont('Times', 'B', 14);
$pdf->Cell(0, 5, 'LAPORAN DATA BARANG', 0, 1, 'C');
$pdf->Cell(30, 8, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);

$pdf->Cell(10, 6, 'NO', 1, 0, 'C');
$pdf->Cell(10, 6, 'ID', 1, 0, 'C');
$pdf->Cell(20, 6, 'BARKODE', 1, 0, 'C');
$pdf->Cell(27, 6, 'NAME', 1, 0, 'C');
$pdf->Cell(20, 6, 'JUAL', 1, 0, 'C');
$pdf->Cell(20, 6, 'BELI', 1, 0, 'C');
$pdf->Cell(15, 6, 'STOK', 1, 0, 'C');
$pdf->Cell(20, 6, 'KATEGORI', 1, 0, 'C');
$pdf->Cell(15, 6, 'SATUAN', 1, 0, 'C');
$pdf->Cell(20, 6, 'SUPPLIER', 1, 0, 'C');
$pdf->Cell(20, 6, 'USER', 1, 1, 'C'); // Pindah ke baris baru

$i = 1;
$data = $this->db->get('barang')->result_array();
foreach ($data as $d) {
    $pdf->SetFont('Times', '', 9);
    $pdf->Cell(10, 6, $i++, 1, 0, 'C');
    $pdf->Cell(10, 6, $d['id'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['barkode'], 1, 0, 'C');
    $pdf->Cell(27, 6, $d['name'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['harga_jual'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['harga_beli'], 1, 0, 'C');
    $pdf->Cell(15, 6, $d['stok'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['kategori_id'], 1, 0, 'C');
    $pdf->Cell(15, 6, $d['satuan_id'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['supplier_id'], 1, 0, 'C');
    $pdf->Cell(20, 6, $d['user_id'], 1, 1, 'C'); // Pindah ke baris baru
}

$pdf->SetFont('Times', '', 10);
$pdf->Output('I', 'laporan_barang.pdf');
?>