<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function kategorilap()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 18);
        $pdf->SetFont('Times', 'B', 14);
        $pdf->Cell(0, 5, 'LAPORAN DATA KATEGORI', 0, 1, 'C');
        $pdf->Cell(30, 8, '', 0, 1);
        $pdf->SetFont('Times', 'B', 9);
        $pdf->Cell(7, 6, 'ID', 1, 0, 'C');
        $pdf->Cell(37, 6, 'NAME', 1, 0, 'C');
        $i = 1;
        $data = $this->db->get('kategori')->result_array();
        foreach ($data as $d) {
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(7, 6, $i++, 1, 0);
            $pdf->Cell(37, 6, $d['id'], 1, 0);
            $pdf->Cell(37, 6, $d['name'], 1, 0);
        }
        $pdf->SetFont('Times', '', 10);
        $pdf->Output('I', 'laporan_kategori.pdf');
    }
    public function headerlap()
    {
        $this->load->view('kategori/report_header_only');
    }

    public function kategorifull()
    {
        $this->load->view('kategori/report_full');
    }

    public function kategorikustom()
    {
        $this->load->view('kategori/report_kategori');
    }
}
