<?php

namespace App\Controllers;

use App\Models\RequestModel;
use App\Models\KetModel;
use App\Models\KKModel;
use TCPDF;
// use Dompdf\Dompdf;
// use Dompdf\Options;
// use TCPDF;

class MYPDF extends TCPDF
{

    //Page header
    public function Header()
    {

        $txt = <<<EOD
        <hr style="margin-bottom: auto;">
        EOD;
        $txt2 = <<<EOD
        <hr height="5px" style="margin-top: auto;">
        EOD;
        $txt3 = <<<EOD
            PEMERINTAH KABUPATEN LOMBOK TENGAH
        EOD;

        $txt4 = <<<EOD
            KECAMATAN BATUKLIANG UTARA
            EOD;

        // set image
        $image_file = K_PATH_IMAGES . 'logo-lantan.jpg';
        $image_lombok = K_PATH_IMAGES . 'lombok.jpg';
        // Set font
        $this->SetFont('times', 'B', 13);
        // Title
        $this->Image($image_file, 10, 11, 0, 24, 'JPG', '', 'T', true, 300, 'R');
        $this->Image($image_lombok, 10, 10, 21, 27, 'JPG', '', 'T', true, 300, 'L');
        $this->writeHTMLCell(0, 0, 25, 10, $txt3, '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(0, 0, 25, 17, $txt4, '', 1, 0, true, 'C', true);
        $this->SetFont('times', 'B', 18);
        $this->writeHTMLCell(0, 0, 25, 23, 'DESA LANTAN', '', 1, 0, true, 'C', true);
        $this->SetFont('times', '', 10);
        $this->writeHTMLCell(0, 0, 25, 32, 'Alamat: Jln.Tanak Embang - Sumberan Kode Desa : 52021207', '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(0, 0, '', 37, $txt, '', 1, 0, true, 'C', true);
        $this->writeHTMLCell(0, 0, '', 39, $txt2, '', 1, 0, true, 'R', true);
    }

    // Page footer
    public function Footer()
    {

        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 7);
        // Page number
        $this->Cell(0, 5, session()->get('kode') . '-/-' . session()->get('kode2'), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(0, 5, session()->get('kode3'), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }
}

class Format extends BaseController
{
    protected $modelSurat;
    public function __construct()
    {
        $this->modelRequest = new RequestModel();
        $this->ketModel = new KetModel();
    }

    public function print($id_request,)
    {

        // $pdf = $this->modelRequest->getPrint($id_request);
        // dd($pdf);
        $data = [
            'title' => 'SK.Domisili',
            'pdf' => $this->modelRequest->getPrint($id_request)
        ];
        view('pages/PDF/kode', $data);
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('PELAYANAN DESA LANTAN');

        // set margins
        $pdf->SetMargins(27, 40, 25);

        $pdf->SetFont('times', '', 12, '', true);
        // set auto page breaks
        $pdf->SetAutoPageBreak(false, PDF_MARGIN_BOTTOM);
        $pdf->AddPage();
        $html = view('pages/PDF/sk', $data);
        $pdf->writeHTMLCell('', '', '', 45, $html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('' . session()->get('username') . '(' . session()->get('nama') . ').pdf', 'I');
    }
}
