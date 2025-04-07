<?php

namespace App\Models;

use App\Services\PDFGenerator;
use App\Core\Operations;

class Resume
{
    private PDFGenerator $pdf;
    private array $data;
    private string $filename;

    public function __construct($data, $filename = 'resume.pdf')
    {
        $this->pdf = new PDFGenerator();
        $this->data = $data;
        $this->filename = $filename;
    }

    public function generateResume()
    {
        // Generate the PDF using the data
        $this->pdf->addPage();
        $html = '
<table cellpadding="15" cellspacing="0" style="width: 100%; font-size: 11px; line-height: 1.5;">
    <tr>
        <td width="40%" style="background-color: #f2f2f2;">
            <h3 style="color: #8b1d41; font-size: 14px; margin-bottom: 4px;">Kontakt</h3>
            <ul style="padding-left: 10px;">
                <li><strong>Telefon:</strong> ' . $this->data['contactInfo']['phone'] . '</li>
                <li><strong>Email:</strong> ' . $this->data['contactInfo']['email'] . '</li>
                <li><strong>LinkedIn:</strong> ' . $this->data['contactInfo']['linkedin'] . '</li>
                <li><strong>GitHub:</strong> ' . $this->data['contactInfo']['github'] . '</li>
            </ul>

            <h3 style="color: #8b1d41; font-size: 14px; margin-top: 10px;">Umiejętności</h3>
            <ul style="padding-left: 10px;">';

        foreach ($this->data['skills'] as $skill) {
            $html .= '<li>' . $skill . '</li>';
        }

        $html .= '</ul>

            <h3 style="color: #8b1d41; font-size: 14px; margin-top: 10px;">Edukacja</h3>
            <p style="margin: 0;"><strong>' . $this->data["education"]["school"] . '</strong></p>
            <p style="margin: 0;">' . $this->data["education"]["degree"] . '</p>
            <p style="margin: 0;"><em>' . Operations::formatDate($this->data["education"]["startDate"]) . ' – ' . Operations::formatDate($this->data["education"]["endDate"]) . '</em></p>
        </td>

        <td width="60%" valign="top" style="margin-left: 20px;">
            <h1 style="color: #8b1d41; font-size: 20px; margin-bottom: 5px;">' . $this->data["contactInfo"]["name"] . ' ' . $this->data["contactInfo"]["surname"] . '</h1>
            <p style="margin-top: 0;">' . $this->data["contactInfo"]["currPos"] . '</p>

            <h3 style="color: #006699; font-size: 14px; margin-top: 10px;">Doświadczenie zawodowe</h3>
';

        $experience = $this->data['experience'];
        $expCount = count($experience['company']);

        for ($i = 0; $i < $expCount; $i++) {
            $html .= '
        <strong>' . ucfirst($experience['company'][$i]) . '</strong>
        <ul style="margin-bottom: 4px;">
            <li>
            ' . ucfirst($experience['position'][$i]) . '
            </li>
            <li><em>' . Operations::formatDate($experience['startExp'][$i]) . ' – ' . Operations::formatDate($experience['endExp'][$i]) . '</em></li>
        </ul>
    ';
        }

        $html .= '
        </td>
    </tr>
</table>';

        $path = __DIR__ . '/../../public/storage/' . $this->filename;
        $this->pdf->writeHTML($html);
        try {
            $this->pdf->saveToFile($path);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
