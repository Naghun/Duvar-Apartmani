const form_opener = document.getElementById('open-form')
const form_closer = document.getElementById('form-closer')
const form_container = document.getElementById('form-container')
const form_submit = document.getElementById('form-submit')

form_opener.addEventListener('click', (e) => {
    e.preventDefault()
    form_container.classList.remove('d-none')
    form_container.classList.add('d-flex')
})
form_closer.addEventListener('click', (e) => {
    e.preventDefault()
    form_container.classList.remove('d-flex')
    form_container.classList.add('d-none')
})
form_container.addEventListener('click', (e) => {
    e.preventDefault()
    form_container.classList.remove('d-flex')
    form_container.classList.add('d-none')
})