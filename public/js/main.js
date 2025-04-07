const skillsContainer = document.querySelector('#skillsContainer')
const addSkillBtn = document.querySelector('#addSkill')
const experienceContainer = document.querySelector('#experienceContainer')
const addExperienceBtn = document.querySelector('#addExperience')
const form = document.querySelector('#resumeForm')

function createSkillInput(e) {
	e.preventDefault()
	const skillDiv = document.createElement('div')
	skillDiv.classList.add('py-3')
	skillDiv.innerHTML = `
            <input type="text" name="skills[]" class="form-control" placeholder="Skill" required>
            <button type="button" class="btn btn-danger remove-skill">Remove</button>
        `
	skillsContainer.appendChild(skillDiv)
	const removeSkillBtn = skillDiv.querySelector('.remove-skill')
	removeSkillBtn.addEventListener('click', function () {
		skillDiv.remove()
	})
}

function addExperience(e) {
	e.preventDefault()
	const experienceDiv = document.createElement('div')
	experienceDiv.classList.add('py-3')
	experienceDiv.innerHTML = `
			<input type="text" name="company[]" class="form-control" placeholder="Company" required>
            <input type="text" name="position[]" class="form-control" placeholder="Position" required>
			<label for="startExp">Start Date</label>
            <input type="date" name="startExp[]" class="form-control" placeholder="Start date" required>
			<label for="endExp">End Date</label>
            <input type="date" name="endExp[]" class="form-control" placeholder="End date" required>
            <button type="button" class="btn btn-danger remove-experience">Remove</button>
        `
	experienceContainer.appendChild(experienceDiv)
	const removeExperienceBtn = experienceDiv.querySelector('.remove-experience')
	removeExperienceBtn.addEventListener('click', function () {
		experienceDiv.remove()
	})
}

function sendForm(e) {
	e.preventDefault()
	const formData = new FormData(this)

	fetch('generatePDF.php', {
		method: 'POST',
		body: formData,
	})
		.then(response => response.json())
		.then(data => {
			if (data.status === 'success') {
				alert('Form submitted successfully!')
				window.location.href = './storage/resume.pdf'
			} else {
				alert('Error submitting form.')
			}
		})
}

addSkillBtn.addEventListener('click', createSkillInput)
addExperienceBtn.addEventListener('click', addExperience)
form.addEventListener('submit', sendForm)
