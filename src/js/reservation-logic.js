class ReservationLogic {
    constructor() {
        this.start_input = document.getElementById('calendar-start');
        this.end_input = document.getElementById('calendar-end');
        this.submit_button = document.getElementById('reservation-submit-real');

        this.reservation_details_div = document.getElementById('reservation-details')
        this.reservation_details_img = document.getElementById('reservation-img')
    
        this.form_opener = document.getElementById('open-form');
        this.avalibility_opener = document.getElementById('open-avalibility');
        this.dates_div = document.getElementById('date-checker');
        this.calendar_avalibility = document.getElementById('calendar-avalibility')
    
        this.reservation_fetch_h1 = document.getElementById('reservation-fetch');
        this.stored_start_date = localStorage.getItem('start_date');
        this.stored_end_date = localStorage.getItem('end_date');
        this.taken_dates

        this.form_submit = document.getElementById('form-submit')
        this.form_container = document.getElementById('form-container')

        this.notification_container = document.getElementById('notification')
        this.notification_header = document.getElementById('notification-header')

        this.num_of_nights = document.getElementById('num-of-nights')
        this.price_per_stay = document.getElementById('price-per-stay')

        this.price
        this.nights

        // form fields

        this.form = document.getElementById('form-reservation')

        this.form_name = document.getElementById('form-name')
        this.form_surname = document.getElementById('form-surname')
        this.form_email = document.getElementById('form-email')
        this.form_telefon = document.getElementById('form-phone')
        this.form_adress = document.getElementById('form-adress')
        this.form_passport = document.getElementById('form-passport')
        this.form_number = document.getElementById('form-number')
    
        if (this.stored_start_date && this.stored_end_date) {
            this.start_date = new Date(this.stored_start_date);
            this.end_date = new Date(this.stored_end_date);
    
            this.options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            this.format_start_date = this.start_date.toLocaleDateString('en-US', this.options);
            this.format_end_date = this.end_date.toLocaleDateString('en-US', this.options);
    
            this.start_input.value = this.format_start_date;
            this.end_input.value = this.format_end_date;
        }

        this.events();
    }

    events() {
        this.submit_button.addEventListener('click', async (e) => {
            e.preventDefault();
            this.calendar_avalibility.classList.remove('d-flex')
            this.calendar_avalibility.classList.add('d-none')
            this.clearDatesDiv();
    
            var starting_date = new Date(this.start_input.value);
            var ending_date = new Date(this.end_input.value);
    
            let current_date = new Date(starting_date);
            const formatted_dates = [];
    
            while (current_date <= ending_date) {
                const year = current_date.getFullYear();
                const month = ('0' + (current_date.getMonth() + 1)).slice(-2);
                const day = ('0' + current_date.getDate()).slice(-2);
                const formatted_date = `${day}/${month}/${year}`;
                formatted_dates.push(formatted_date);
                current_date.setDate(current_date.getDate() + 1);
            }
    
            try {
                jQuery.ajax({
                    type: "post",
                    url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                    data: {
                        nonce: form_reservation_data.nonce,
                        action: "reservation_form_action",
                        ajax_data: formatted_dates
                    },
                    complete: (response) => {
                        if (response.responseJSON.data.dostupnost == 'Datumi su slobodni') {
                            this.reservation_fetch_h1.innerHTML= response.responseJSON.data.dostupnost;
                            this.form_opener.classList.remove('d-none');
                            this.form_opener.classList.add('d-flex');
                            this.avalibility_opener.classList.remove('d-flex');
                            this.avalibility_opener.classList.add('d-none');

                            this.reservation_details_img.classList.remove('d-flex')
                            this.reservation_details_img.classList.add('d-none')
                            this.reservation_details_div.classList.remove('d-none')
                            this.reservation_details_div.classList.add('d-flex')

                            this.price = response.responseJSON.data.cijena
                            this.nights = response.responseJSON.data.noći

                            this.num_of_nights.innerHTML = this.nights
                            this.price_per_stay.innerHTML = this.nights * this.price
                        } else {
                            this.reservation_fetch_h1.innerHTML= 'Izbor nije dostupan';
                            this.form_opener.classList.remove('d-flex');
                            this.form_opener.classList.add('d-none');
                            this.avalibility_opener.classList.remove('d-none');
                            this.avalibility_opener.classList.add('d-flex');

                            this.reservation_details_img.classList.remove('d-none')
                            this.reservation_details_img.classList.add('d-flex')
                            this.reservation_details_div.classList.remove('d-flex')
                            this.reservation_details_div.classList.add('d-none')
                        }
                        
                    }
                });
            } catch (error) {
                console.error('Error:', error);
            }
            
        });
    
        this.avalibility_opener.addEventListener('click', async(e) => {
            try {
                jQuery.ajax({
                    method: 'GET',
                    url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                    data: {
                        nonce: form_reservation_data.nonce,
                        action: 'get_taken_dates'
                    },
                    success: (response) => {
                        this.taken_dates = response.data;
                        this.drawn_dates(this.taken_dates);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            } catch (error) {
                console.error('Error:', error)
            }
            
    
        });


        this.form_submit.addEventListener('click', (e) => {
            e.preventDefault()

            if (
                this.form_name.value.trim() === '' ||
                this.form_surname.value.trim() === '' ||
                this.form_email.value.trim() === '' ||
                this.form_telefon.value.trim() === '' ||
                this.form_adress.value.trim() === '' ||
                this.form_passport.value.trim() === '' ||
                this.form_number.value.trim() === ''
            ) {
                alert('Molimo popunite sva polja prije slanja obrasca.');
                return;
            }


            form_container.classList.remove('d-flex')
            form_container.classList.add('d-none')

            // data about form and dates

            var starting_date = new Date(this.start_input.value);
            var ending_date = new Date(this.end_input.value);
    
            let current_date = new Date(starting_date);
            const formatted_dates = [];
    
            while (current_date <= ending_date) {
                const year = current_date.getFullYear();
                const month = ('0' + (current_date.getMonth() + 1)).slice(-2);
                const day = ('0' + current_date.getDate()).slice(-2);
                const formatted_date = `${day}/${month}/${year}`;
                formatted_dates.push(formatted_date);
                current_date.setDate(current_date.getDate() + 1);
            }

            const form_details = {
                ime: this.form_name.value,
                prezime: this.form_surname.value,
                email: this.form_email.value,
                telefon: this.form_telefon.value,
                adresa: this.form_adress.value,
                broj_pasosa: this.form_passport.value,
                broj_gostiju: this.form_number.value
            };            

            const all_form_data = [formatted_dates, form_details]

            try {
                jQuery.ajax({
                    type: "post",
                    url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                    data: {
                        nonce: form_reservation_data.nonce,
                        action: "reservation_form_complete_data",
                        ajax_data: all_form_data
                    },
                    complete: (response) => {
                        if (response.responseJSON.data === 'Rezervacija uspješna') {
                            this.notification_container.classList.remove('d-none');
                            this.notification_container.classList.add('d-flex');
                            this.notification_header.innerHTML= 'Rezervacija uspješna';


                            setTimeout(() => {
                                this.notification_container.classList.add('fade-out')
                            }, 1500);

                            setTimeout(() => {
                                this.notification_container.classList.remove('d-flex');
                                this.notification_container.classList.add('d-none');                       
                                this.notification_container.classList.remove('fade-out');
                            }, 2500);
                        } else {
                            this.notification_container.classList.remove('d-none');
                            this.notification_container.classList.add('d-flex');
                            this.notification_header.innerHTML= 'Rezervacija nije uspjela!';
                        }
                        
                    }
                });
            } catch (error) {
                console.error('Error:', error);
            }
        })

    }

    // methods

    create_button(text, is_reserved = false, selected = false) {
        const new_button = document.createElement('button');
        new_button.textContent = text;
        if (is_reserved) {
            new_button.classList.add('is_reserved');
        } else {
            new_button.classList.add('free');
        }
        return new_button;
    }

    drawn_dates(dates) {
        const taken_dates = dates
        const starting_date = this.start_input.value;
        const current_date = new Date(starting_date);
        const current_month = current_date.getMonth();
        const days_in_month = new Date(current_date.getFullYear(), current_month + 1, 0).getDate();

        for(let i = 15; i >= 0; i--) {
            const prev_date = new Date(current_date);
            prev_date.setDate(current_date.getDate() - i);
            const is_reserved = taken_dates.some(taken_date => {
                const [taken_day, taken_month, taken_year] = taken_date.split('/');
                const prev_day_formatted = String(prev_date.getDate()).padStart(2, '0');
                const prev_month_formatted = String(prev_date.getMonth() + 1).padStart(2, '0');
                const prev_year_formatted = String(prev_date.getFullYear()).padStart(4, '0');
                
                return prev_day_formatted === taken_day &&
                       prev_month_formatted === taken_month &&
                       prev_year_formatted === taken_year
            }); 
            const is_selected = i === 0;
    
            const new_button = this.create_button(prev_date.getDate(), is_reserved, is_selected);
            this.dates_div.appendChild(new_button);

        }

        for(let i = 1; i < 15; i++) {
            const next_date = new Date(current_date);
            next_date.setDate(current_date.getDate() + i);
            const is_reserved = taken_dates.some(taken_date => {
                const [taken_day, taken_month, taken_year] = taken_date.split('/');
                const next_day_formatted = String(next_date.getDate()).padStart(2, '0');
                const next_month_formatted = String(next_date.getMonth()+1).padStart(2, '0');
                const next_year_formatted = String(next_date.getFullYear()).padStart(4, '0');

                return next_day_formatted === taken_day &&
                        next_month_formatted === taken_month &&
                        next_year_formatted === taken_year
            })
            const is_selected = i === 0;

            const new_button = this.create_button(next_date.getDate(), is_reserved, is_selected);
            this.dates_div.appendChild(new_button);
        }
    }

    clearDatesDiv() {
        this.dates_div.innerHTML = '';
    }
}


const reservation_logic = new ReservationLogic();
