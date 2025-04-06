<?php

namespace App\Models;

use App\Services\PDFGenerator;

class Resume {
    private PDFGenerator $pdf;
    private array $data;
    private string $filename;

    public function __construct($data, $filename = 'resume.pdf') {
        $this->pdf = new PDFGenerator();
        $this->data = $data;
        $this->filename = $filename;
    }

}

