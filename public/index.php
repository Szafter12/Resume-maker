<!DOCTYPE html>
<html lang="en-EN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume maker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body class="d-flex flex-column align-items-center justify-content-center min-vh-100">
    <h1 class="my-4">Resume maker</h1>
    <form class="p-4 my-5 mx-auto container" id="resumeForm">
        <div class="py-3 d-flex flex-column gap-3">
            <h3>Personal info:</h3>
            <div class="d-flex flex-column">
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Your name">
            </div>
            <div class="d-flex flex-column">
                <label for="surname">Surname:</label>
                <input class="form-control" type="text" id="surname" name="surname" placeholder="Your surname">
            </div>
            <div class="d-flex flex-column">
                <label for="currPos">Current position:</label>
                <input class="form-control" type="text" id="currPos" name="currPos" placeholder="Your current position">
            </div>
        </div>
        <div class="d-flex flex-column gap-3 py-3">
            <h3>Contact info:</h3>
            <div class="d-flex w-100 justify-content-evenly gap-5">
                <div class="d-flex flex-column w-50">
                    <label for="phone">Phone:</label>
                    <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone Number">
                </div>
                <div class="d-flex flex-column w-50">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="text" id="email" name="email" placeholder="Email Address">
                </div>
            </div>
            <div class="d-flex w-100 justify-content-evenly gap-5">
                <div class="d-flex flex-column w-50">
                    <label for="linkedin">Linkedin:</label>
                    <input class="form-control" type="text" id="linkedin" name="linkedin" placeholder="LinkedIn Profile">
                </div>
                <div class="d-flex flex-column w-50">
                    <label for="github">GitHub:</label>
                    <input class="form-control" type="text" id="github" name="github" placeholder="GitHub Profile">
                </div>
            </div>
        </div>
        <div class="d-flex w-100 justify-content-evenly gap-5 py-3">
            <div class="w-50">
                <h3>Key Skills:</h3>
                <div id="skillsContainer"></div>
                <button class="btn btn-success py-2 px-3" id="addSkill">Add skill +</button>
            </div>
            <div class="w-50">
                <h3>Experience:</h3>
                <div id="experienceContainer"></div>
                <button class="btn btn-success py-2 px-3" id="addExperience">Add experience +</button>
            </div>
        </div>
        <div class="d-flex flex-column gap-3 py-3">
            <h3>Education:</h3>
            <div class="d-flex w-100 justify-content-evenly gap-5">
                <div class="d-flex flex-column w-50">
                    <label for="school">School:</label>
                    <input class="form-control" type="text" id="school" name="school" placeholder="School Name">
                </div>
                <div class="d-flex flex-column w-50">
                    <label for="degree">Degree:</label>
                    <input class="form-control" type="text" id="degree" name="degree" placeholder="Degree Obtained">
                </div>
            </div>
            <div class="d-flex w-100 justify-content-evenly gap-5">
                <div class="d-flex flex-column w-50">
                    <label for="startDate">Start date:</label>
                    <input class="form-control" type="date" id="startDate" name="startDate" placeholder="Start Date">
                </div>
                <div class="d-flex flex-column w-50">
                    <label for="github">End date (or planned date of completion):</label>
                    <input class="form-control" type="date" id="endDate" name="endDate" placeholder="End Date">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end py-3">
            <button class="btn btn-success py-2 px-3 sendBtn" type="submit">Generate</button>
        </div>
    </form>

    <template id="skillTemplate">
        <div class="d-flex flex-column gap-3 py-3 skillDiv">
            <label for="skill">Skill:</label>
            <input type="text" name="skills[]" class="form-control w-100" placeholder="Skill">
            <button type="button" class="btn btn-secondary remove-skill py-2 px-4 mt-2">Remove</button>
        </div>
    </template>

    <template id="experienceTemplate">
        <div class="py-3 d-flex flex-column gap-3 experienceDiv">
            <div>
                <label for="company">Company name:</label>
                <input type="text" name="company[]" class="form-control" placeholder="Company">
            </div>
            <div>
                <label for="position">Position:</label>
                <input type="text" name="position[]" class="form-control" placeholder="Position">
            </div>
            <div>
                <label for="startExp">Start Date:</label>
                <input type="date" name="startExp[]" class="form-control" placeholder="Start date">
            </div>
            <div>
                <label for="endExp">End Date:</label>
                <input type="date" name="endExp[]" class="form-control endDate" placeholder="End date" required>
                <div class="d-flex gap-2 mt-2">
                    <input class="presentWork" type="checkbox" name="endExp[]" value="Present">
                    <label for="presentWork">I currently work here</label>
                </div>
            </div>
            <button type="button" class="btn btn-secondary remove-experience">Remove</button>
        </div>
    </template>

    <script src="public/js/main.js"></script>
</body>

</html>