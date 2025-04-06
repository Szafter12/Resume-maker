<!DOCTYPE html>
<html lang="en-EN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume maker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <form id="resumeForm">
        <div>
            <h3>Contact info:</h3>
            <input type="text" id="phone" name="phone" placeholder="Phone Number">
            <input type="text" id="email" name="email" placeholder="Email Address">
            <input type="text" id="linkedin" name="linkedin" placeholder="LinkedIn Profile">
            <input type="text" id="github" name="github" placeholder="GitHub Profile">
        </div>
        <div>
            <h3>Key Skills:</h3>
            <div id="skillsContainer"></div>
            <button id="addSkill">Add skill +</button>
        </div>
        <div>
            <h3>Experience:</h3>
            <div id="experienceContainer"></div>
            <button id="addExperience">Add experience +</button>
        </div>
        <div>
            <h3>Education:</h3>
            <input type="text" id="school" name="school" placeholder="School Name">
            <input type="text" id="degree" name="degree" placeholder="Degree Obtained">
            <input type="date" id="startDate" name="startDate" placeholder="Start Date">
            <input type="date" id="endDate" name="endDate" placeholder="End Date">
        </div>
        <button type="submit">Send</button>
    </form>
    <script src="./js/main.js"></script>
</body>

</html>