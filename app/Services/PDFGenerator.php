<?php

namespace App\Services;

use TCPDF;
use Dotenv\Dotenv;

class PDFGenerator extends TCPDF
{
    protected TCPDF $pdf;

    public function __construct()
    {
        $this->pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $this->pdf->setPrintHeader(false);
        $this->setup();
    }

    private function setup()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $this->pdf->SetAuthor($_ENV['PDF_AUTHOR']);
        $this->pdf->SetCreator($_ENV['PDF_CREATOR']);
        $this->pdf->SetTitle($_ENV['PDF_TITLE']);
        $this->pdf->SetMargins(0, 0, 0);
        $this->pdf->SetAutoPageBreak(true, 20);
        $this->pdf->SetFont('dejavusans', '', 10);
    }

    public function addPageResume(): void
    {
        $this->pdf->AddPage();
    }
    public function writeHTMLResume(string $html): void
    {
        $this->pdf->writeHTML($html, true, false, true, false, '');
    }

    public function outputResume(string $filename = 'dokument.pdf', string $destination = 'I'): void
    {
        $this->pdf->Output($filename, $destination);
    }

    public function saveToFile(string $path): void
    {
        $this->pdf->Output($path, 'F');
    }
}
