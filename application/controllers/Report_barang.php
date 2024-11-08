<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function baranglap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA BARANG', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'ID', 1, 0, 'C');
        $pdf->Cell(37, 6, 'BARKODE', 1, 1, 'C');
        $pdf->Cell(37, 6, 'NAME', 1, 1, 'C');
        $pdf->Cell(37, 6, 'HARGA JUAL', 1, 1, 'C');
        $pdf->Cell(37, 6, 'HARGA BELI', 1, 1, 'C');
        $pdf->Cell(37, 6, 'STOK', 1, 1, 'C');
        $pdf->Cell(37, 6, 'KATEGORI ID', 1, 1, 'C');
        $pdf->Cell(37, 6, 'SATUAN ID', 1, 1, 'C');
        $pdf->Cell(37, 6, 'SUPPLIER ID', 1, 1, 'C');
        $pdf->Cell(37, 6, 'USER ID', 1, 1, 'C');
        $i = 1;
        $data = $this->db->get('barang')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(37, 6, $d['id'], 1, 0);
            $pdf->Cell(37, 6, $d['barkode'], 1, 1);
            $pdf->Cell(37, 6, $d['name'], 1, 1);
            $pdf->Cell(37, 6, $d['harga_jual'], 1, 1);
            $pdf->Cell(37, 6, $d['harga_beli'], 1, 1);
            $pdf->Cell(37, 6, $d['stok'], 1, 1);
            $pdf->Cell(37, 6, $d['kategori_id'], 1, 1);
            $pdf->Cell(37, 6, $d['satuan_id'], 1, 1);
            $pdf->Cell(37, 6, $d['supplier_id'], 1, 1);
            $pdf->Cell(37, 6, $d['user_id'], 1, 1);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('I', 'laporan_barang.pdf');
    }
    public function headerlap()
    {
        $this->load->view('barang/report_header_only');
    }

    public function barangfull()
    {
        $this->load->view('barang/report_full');
    }

    public function kategorikustom()
    {
        $this->load->view('kategori/report_kategori');
    }
}
