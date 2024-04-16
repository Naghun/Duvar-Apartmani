const form_opener = document.getElementById('open-form')
const avalibility_opener = document.getElementById('open-avalibility')
const form_closer = document.getElementById('form-closer')
const form_container = document.getElementById('form-container')
const form_submit = document.getElementById('form-submit')
const calendar_avalibility = document.getElementById('calendar-avalibility')
const close_avalibility = document.getElementById('close-avalibility')
const dates_div = document.getElementById('date-checker')

form_opener.addEventListener('click', (e) => {
    e.preventDefault()
    form_container.classList.remove('d-none')
    form_container.classList.add('d-flex')
})
form_closer.addEventListener('click', (e) => {
    e.preventDefault()
    form_container.scrollIntoView({behavior: 'smooth'})
    form_container.classList.remove('d-flex')
    form_container.classList.add('d-none')
})
avalibility_opener.addEventListener('click', (e) => {
    calendar_avalibility.classList.remove('d-none')
    calendar_avalibility.classList.add('d-flex')
})
close_avalibility.addEventListener('click', (e) => {
    calendar_avalibility.classList.remove('d-flex')
    calendar_avalibility.classList.add('d-none')
})

