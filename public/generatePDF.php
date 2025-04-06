<?php
require_once '../vendor/autoload.php';

use App\Core\Operations;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data aren't validate because this is a demo project and the data are not stored in a database.
    // In a real project, you should validate the data before using it. 

    // Take the data from the form submission and assign it to variables
    $contactInfo = [];
    $contactInfo['name'] = $_POST['name'] ?? null;
    $contactInfo['phone'] = $_POST['phone'] ?? null;
    $contactInfo['email'] = $_POST['email'] ?? null;
    $contactInfo['linkedin'] = $_POST['linkedin'] ?? null;
    $contactInfo['github'] = $_POST['github'] ?? null;

    $skills = $_POST['skills'] ?? null;
    $experience = $_POST['experience'] ?? null;

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
    
} else {
    Operations::response('error', 'Invalid request method. Only POST requests are allowed.');
    exit();
}
