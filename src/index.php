<?php
require_once '../vendor/autoload.php';

// Tworzenie nowego obiektu TCPDF
$pdf = new TCPDF();

// Ustawienia dokumentu
$pdf->SetCreator('Moja aplikacja');
$pdf->SetAuthor('Ja');
$pdf->
$pdf->SetTitle('Mój pierwszy PDF');
$pdf->SetSubject('Test TCPDF');
$pdf->SetHeaderData('', 60, 'Nagłówek PDF', 'Dodatkowe informacje');
$pdf->setHeaderFont(['helvetica', '', 10]);
$pdf->SetMargins(15, 27, 15);
$pdf->SetHeaderMargin(8);
// Dodanie strony
$pdf->AddPage();

// Ustawienie czcionki
$pdf->SetFont('helvetica', '', 12);

// Dodanie tekstu
$pdf->Write(10, 'Hello, TCPDF!');
$pdf->Ln(10);
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Write(10, '');

// Generowanie pliku PDF
$pdf->Output('document.pdf', 'I');

