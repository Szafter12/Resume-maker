const skillsContainer = document.querySelector('#skillsContainer')
const skillTemplate = document.querySelector('#skillTemplate')
const addSkillBtn = document.querySelector('#addSkill')

const experienceContainer = document.querySelector('#experienceContainer')
const experienceTemplate = document.querySelector('#experienceTemplate')
const addExperienceBtn = document.querySelector('#addExperience')

const form = document.querySelector('#resumeForm')

function createSkillInput() {
	const clone = skillTemplate.content.cloneNode(true)
	const skillDiv = clone.querySelector('.skillDiv')
	skillsContainer.appendChild(clone)

	const removeSkillBtn = skillDiv.querySelector('.remove-skill')
	removeSkillBtn.addEventListener('click', function () {
		skillDiv.remove()
	})
}

function addExperience() {
	const clone = experienceTemplate.content.cloneNode(true)
	const experienceDiv = clone.querySelector('.experienceDiv')
	experienceContainer.appendChild(clone)

	const removeExperienceBtn = experienceDiv.querySelector('.remove-experience')
	removeExperienceBtn.addEventListener('click', function () {
		experienceDiv.remove()
	})

	const presentCheckbox = experienceDiv.querySelector('.presentWork')
	presentCheckbox.addEventListener('change', () => {
		const endDateInput = experienceDiv.querySelector('.endDate')
		if (presentCheckbox.checked) {
			endDateInput.value = ''
			endDateInput.disabled = true
		} else {
			endDateInput.disabled = false
		}
	})
}

function sendForm(e) {
	e.preventDefault()
	const formData = new FormData(this)
	const sendBtn = document.querySelector('.sendBtn')
	sendBtn.disabled = true
	sendBtn.textContent = 'Sending...'

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
				alert(data.message + '!')
			}
		})
		.catch(error => {
			console.error('Error:', error)
			alert('An error occurred while submitting the form.')
		})
		.finally(() => {
			sendBtn.disabled = false
			sendBtn.textContent = 'Generate PDF'
			form.reset()
			skillsContainer.innerHTML = ''
			experienceContainer.innerHTML = ''
		})
}

addSkillBtn.addEventListener('click', createSkillInput)
addExperienceBtn.addEventListener('click', addExperience)
form.addEventListener('submit', sendForm)
