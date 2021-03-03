<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$level 		= $this->session->userdata('ap_level');
		$allowed	= array('admin', 'keuangan');

		if( ! in_array($level, $allowed))
		{
			redirect();
		}
		$this->load->model('M_barang');
	}

	public function index(){
		$data['kategori']=$this->M_barang->kategori();
		$this->load->view('laporan/form_laporan', $data);
	}

	public function penjualan($from, $to){
		$this->load->model('M_report');
		$dt['penjualan'] 	= $this->M_report->export($from, $to);
		$dt['from']			= date('d F Y', strtotime($from));
		$dt['to']			= date('d F Y', strtotime($to));
		$this->load->view('laporan/laporan_penjualan', $dt);
	}

	public function pdf($from, $to)
	{
		$this->load->library('cfpdf');
					
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0, 8, "Laporan Penjualan Tanggal ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'L'); 

		$pdf->Cell(8, 7, 'No.', 1, 0, 'L'); 
		$pdf->Cell(25, 7, 'Tanggal', 1, 0, 'L');
		$pdf->Cell(80, 7, 'Nama Barang', 1, 0, 'L');
		$pdf->Cell(10, 7, 'Qty', 1, 0, 'L');
		$pdf->Cell(30, 7, 'Kasir', 1, 0, 'L');
		$pdf->Cell(40, 7, 'Total', 1, 0, 'L'); 
		$pdf->Ln();

		$this->load->model('M_report');
		$penjualan 	= $this->M_report->export($from, $to);

		$no = 1;
		$total_penjualan = 0;
		foreach($penjualan->result() as $p)
		{
			$pdf->Cell(8, 7, $no, 1, 0, 'L'); 
			$pdf->Cell(25, 7, date('d/m/Y', strtotime($p->waktu)), 1, 0, 'L');
			$pdf->Cell(80, 7, $p->nama_barang, 1, 0, 'L');
			$pdf->Cell(10, 7, $p->jumlah, 1, 0, 'L');
			$pdf->Cell(30, 7, $p->kasir, 1, 0, 'L');
			$pdf->Cell(40, 7, "Rp. ".str_replace(",", ".", number_format($p->sub_total)), 1, 0, 'L');
			$pdf->Ln();

			$total_penjualan = $total_penjualan + $p->sub_total;
			$no++;
		}

		$pdf->Cell(153, 7, 'Total Seluruh Penjualan', 1, 0, 'L'); 
		$pdf->Cell(40, 7, "Rp. ".str_replace(",", ".", number_format($total_penjualan)), 1, 0, 'L');
		$pdf->Ln();

		$pdf->Output();
	}
	
	public function pembelian(){
		$data['kategori']=$this->M_barang->kategori();
		$this->load->view('laporan/form_pembelian', $data);
	}
	
	public function detail_pembelian($from, $to){
		$this->load->model('M_report');
		$dt['penjualan'] 	= $this->M_report->export_pembelian($from, $to);
 		$dt['from']			= date('d F Y', strtotime($from));
		$dt['to']			= date('d F Y', strtotime($to));
		$this->load->view('laporan/laporan_pembelian', $dt);
	}
	
	public function pembelian_pdf($from, $to)
	{
		$this->load->library('cfpdf');
					
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);

		$pdf->SetFont('Arial','',10);
		$pdf->Cell(0, 8, "Laporan Pembelian Tanggal ".date('d/m/Y', strtotime($from))." - ".date('d/m/Y', strtotime($to)), 0, 1, 'L'); 

		$pdf->Cell(8, 7, 'No.', 1, 0, 'L'); 
		$pdf->Cell(25, 7, 'Tanggal', 1, 0, 'L');
		$pdf->Cell(80, 7, 'Nama Barang', 1, 0, 'L');
		$pdf->Cell(10, 7, 'Qty', 1, 0, 'L');
		$pdf->Cell(30, 7, 'Kasir', 1, 0, 'L');
		$pdf->Cell(40, 7, 'Total', 1, 0, 'L'); 
		$pdf->Ln();

		$this->load->model('M_report');
		$penjualan 	= $this->M_report->export_pembelian($from, $to);

		$no = 1;
		$total_penjualan = 0;
		foreach($penjualan->result() as $p)
		{
			$pdf->Cell(8, 7, $no, 1, 0, 'L'); 
			$pdf->Cell(25, 7, date('d/m/Y', strtotime($p->waktu)), 1, 0, 'L');
			$pdf->Cell(80, 7, $p->nama_barang, 1, 0, 'L');
			$pdf->Cell(10, 7, $p->jumlah, 1, 0, 'L');
			$pdf->Cell(30, 7, $p->kasir, 1, 0, 'L');
			$pdf->Cell(40, 7, "Rp. ".str_replace(",", ".", number_format($p->sub_total)), 1, 0, 'L');
			$pdf->Ln();

			$total_penjualan = $total_penjualan + $p->sub_total;
			$no++;
		}

		$pdf->Cell(153, 7, 'Total Seluruh Penjualan', 1, 0, 'L'); 
		$pdf->Cell(40, 7, "Rp. ".str_replace(",", ".", number_format($total_penjualan)), 1, 0, 'L');
		$pdf->Ln();

		$pdf->Output();
	}
}