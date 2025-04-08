<?php
require_once '../vendor/autoload.php';

use App\Core\Operations;
use App\Models\Resume;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data aren't validate because this is a demo project and the data are not stored in a database.
    // In a real project, you should validate the data before using it. 

    if (empty($_POST['skills']) || empty($_POST['company']) || empty($_POST['position']) || empty($_POST['startExp'])) {
        Operations::response('error', 'All fields are required.');
        exit();
    }

    $contactInfo = [];
    $contactInfo['name'] = $_POST['name'] ?? null;
    $contactInfo['surname'] = $_POST['surname'] ?? null;
    $contactInfo['currPos'] = $_POST['currPos'] ?? null;
    $contactInfo['phone'] = $_POST['phone'] ?? null;
    $contactInfo['email'] = $_POST['email'] ?? null;
    $contactInfo['linkedin'] = $_POST['linkedin'] ?? null;
    $contactInfo['github'] = $_POST['github'] ?? null;

    $skills = $_POST['skills'];

    $experience = [];
    $experience['company'] = $_POST['company'];
    $experience['position'] = $_POST['position'];
    $experience['startExp'] = $_POST['startExp'];
    $experience['endExp'] = $_POST['endExp'];


    $education = [];
    $education['school'] = $_POST['school'] ?? null;
    $education['degree'] = $_POST['degree'] ?? null;
    $education['startDate'] = $_POST['startDate'] ?? null;
    $education['endDate'] = $_POST['endDate'] ?? null;

    // Put the data into an array to be used in the PDF generation

    $data = [
        'contactInfo' => $contactInfo,
        'skills' => $skills,
        'experience' => $experience,
        'education' => $education
    ];

    // Generate the PDF using the data
  
    $resume = new Resume($data);

    if ($resume->generateResume()) {
        Operations::response('success', 'PDF generated successfully.');
    } else {
        Operations::response('error', 'Failed to generate PDF.');
    }
} else {
    Operations::response('error', 'Invalid request method. Only POST requests are allowed.');
    exit();
}
