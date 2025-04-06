<?php
require_once './vendor/autoload.php';

$pdf = new TCPDF();
$pdf->AddPage();

$html = '
        <style>
            .title {
                color: #8b1d41;
                font-size: 28px;
                font-weight: bold;
            }
            .subtitle {
                font-size: 14px;
                font-weight: bold;
                margin-bottom: 10px;
            }
            .section-title {
                color: #006699;
                font-size: 16px;
                font-weight: bold;
                margin-top: 20px;
                border-bottom: 1px solid #ccc;
            }
            ul {
                padding-left: 5px;
            }
        </style>

        <table cellpadding="5" cellspacing="5" style="width: 100%;">
            <tr>
                <td width="40%" valign="top" style="background-color: #f2f2f2;">
                    <img src="photo.jpg" style="width:100px; border-radius: 50%; margin-bottom: 10px;" />
                    <p><strong>Phone:</strong> (123) 456-7890</p>
                    <p><strong>E-mail</strong> email@example.com</p>
                    <p><strong>LinkedIn:</strong> LinkedIn | Portfolio</p>
                    <p><strong>GitHub:</strong> Github</p>

                    <p class="subtitle">Key Skills</p>
                    <ul>
                        <li>Claims processing</li>
                        <li>Communication</li>
                        <li>Empathy</li>
                        <li>Insurance proposals</li>
                        <li>Teamwork</li>
                    </ul>

                    <p class="subtitle">Education</p>
                    <p><strong>Bachelor of Arts (B.A)</strong><br/>
                    Business Administration<br/>
                    Metro State University<br/>
                    Sep 2008 – Jun 2012</p>
                </td>

                <td width="60%" valign="top">
                    <p class="title">Elizabeth Jones</p>
                    <p>Customer Service Representative</p>
                    <p>Dedicated customer service representative with five years of experience... (reszta tekstu skrócona dla czytelności)</p>

                    <p class="section-title">Professional Experience</p>
                    <p><strong>Customer Service Representative</strong><br/>
                    Secure Coverage Solutions, Rochester, MN<br/>
                    <em>June 2021 – Present</em></p>
                    <ul>
                        <li>Act as the primary point of contact...</li>
                        <li>Process an average of 50 policy endorsements...</li>
                        <li>Collaborate with underwriting...</li>
                    </ul>

                    <p><strong>Office Assistant</strong><br/>
                    Horizon Insurance Group, Minneapolis, MN<br/>
                    <em>March 2019 – May 2021</em></p>
                    <ul>
                        <li>Processed over 200 insurance policies...</li>
                        <li>Maintained 98% accuracy...</li>
                    </ul>

                    <p class="section-title">Certifications</p>
                    <ul>
                        <li>Certified Insurance Service Representative (CISR) | 2021</li>
                        <li>Microsoft Office Specialist | 2020</li>
                    </ul>
                </td>
            </tr>
        </table>
        ';

$pdf->writeHTML($html, true, false, true, false, '');

// Zapisz lub pokaż
$pdf->Output('resume.pdf', 'I'); // 'I' = inline (do przeglądarki), 'D' = download
