class Calendar {
    constructor() {

        this.calendar_container = document.getElementById('calendar-container')

        if (this.calendar_container) {
            this.calendar_start_field = document.getElementById('calendar-start')
            this.calendar_end_field = document.getElementById('calendar-end')
            this.calendar_close_button = document.getElementById('close-calendar')
            this.calendar_apply_button = document.getElementById('apply-calendar')
            this.next_month_button = this.calendar_container.querySelector('.next')
            this.prev_month_button = this.calendar_container.querySelector('.prev')
            this.next_month_button2 = this.calendar_container.querySelector('.next2')
            this.prev_month_button2 = this.calendar_container.querySelector('.prev2')
    
            this.month_input = this.calendar_container.querySelector('.month-input')
            this.year_input = this.calendar_container.querySelector('.year-input')
            this.month_input2 = this.calendar_container.querySelector('.month-input2')
            this.year_input2 = this.calendar_container.querySelector('.year-input2')
            this.dates = document.querySelector('.dates')
            this.dates2 = document.querySelector('.dates2')
    
            this.submit_dates = document.getElementById("reservation-dates")
    
            const stored_start_date = localStorage.getItem('start_date');
            const stored_end_date = localStorage.getItem('end_date');
            if (stored_start_date && stored_end_date) {
                this.selected_date = new Date(stored_start_date);
                this.selected_date2 = new Date(stored_end_date);
            } else {
                this.selected_date = new Date()
                this.selected_date2 = new Date()
            }
    
            
            this.month=this.selected_date.getMonth()
            this.month2=this.selected_date2.getMonth()
            this.year=this.selected_date.getFullYear()
            this.year2=this.selected_date2.getFullYear()
    
            // second calendar
    
            this.display_dates()
            this.display_dates2()
            this.create_button()
            this.create_button2()
            this.events()
            this.update_year_month()
            this.update_year_month2()
        }

    }

    // events
    events() {
        this.calendar_start_field.addEventListener('focus', this.open_calendar_container.bind(this))
        this.calendar_end_field.addEventListener('focus', this.open_calendar_container.bind(this))
        this.calendar_close_button.addEventListener('click', this.close_calendar_container.bind(this))
        this.calendar_apply_button.addEventListener('click', (e) => {
            e.preventDefault()
            window.scrollBy(0, -300);
            this.calendar_container.classList.remove('d-flex')
            this.calendar_container.classList.add('d-none')

            this.calendar_start_field.value = this.selected_date.toLocaleDateString
            (
                "en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit",
                }
            )
            this.calendar_end_field.value = this.selected_date2.toLocaleDateString
            (
                "en-US", {
                    year: "numeric",
                    month: "2-digit",
                    day: "2-digit",
                }
            )

            localStorage.setItem('start_date', this.selected_date.toISOString());
            localStorage.setItem('end_date', this.selected_date2.toISOString());
        })

        this.next_month_button.addEventListener('click', () => {
            if (this.month===11) {
                this.year++
            }
            this.month = (this.month +1) %12;
            this.display_dates()
        })
        this.next_month_button2.addEventListener('click', () => {
            if (this.month2===11) {
                this.year2++
            }
            this.month2 = (this.month2 +1) %12;
            this.display_dates2()
        })


        this.prev_month_button.addEventListener('click', () => {
            if (this.month===0) {
                this.year--
            }
            this.month = (this.month-1 + 12) %12
            this.display_dates()
        })
        this.prev_month_button2.addEventListener('click', () => {
            if (this.month2===0) {
                this.year2--
            }
            this.month2 = (this.month2-1 + 12) %12
            this.display_dates2()
        })

        this.month_input.addEventListener('change', () => {
            this.month=this.month_input.selectedIndex
            this.display_dates()
        })
        this.month_input2.addEventListener('change', () => {
            this.month2=this.month_input2.selectedIndex
            this.display_dates2()
        })

        this.year_input.addEventListener('change', () => {
            this.year=this.year_input.value
            this.display_dates()
        })
        this.year_input2.addEventListener('change', () => {
            this.year2=this.year_input2.value
            this.display_dates2()
        })


    }

    // methods

    open_calendar_container(e) {
        e.preventDefault();
        this.calendar_container.focus()
        window.scrollBy(0, 300);
        this.calendar_container.classList.remove('d-none')
        this.calendar_container.classList.add('d-flex')
    }

    close_calendar_container(e) {
        e.preventDefault()
        this.calendar_container.focus()
        window.scrollBy(0, -300);
        this.calendar_container.classList.remove('d-flex')
        this.calendar_container.classList.add('d-none')
    }

    // about dates

    display_dates2() {
        this.update_year_month2()
        this.dates2.innerHTML=""

        const today = new Date();
        const last_of_prev_month = new Date(this.year2, this.month2, 0)

        for(let i = 0; i < last_of_prev_month.getDay(); i++) {
            const text = last_of_prev_month.getDate() - last_of_prev_month.getDay() + i
            const new_button = this.create_button2(text, true, false);
            this.dates2.appendChild(new_button)
        }

        // this month

        const last_of_month = new Date(this.year2, this.month2 + 1, 0)
        for(let i = 1; i<= last_of_month.getDate(); i++) {
            const is_today = this.isToday(today, this.year2, this.month2, i)
            const [today_day, today_month, today_year] = [today.getDate(), today.getMonth(), today.getFullYear()]
            const is_disabled = this.year2 < today_year || 
                (this.year2 === today_year && this.month2 < today_month) || 
                (this.year2 === today_year && this.month2 === today_month && i < today_day)
            const new_button = this.create_button(i, is_disabled, is_today)

            new_button.addEventListener('click', this.handle_date_click2.bind(this))
            this.dates2.appendChild(new_button)
        }

        // next month

        const first_of_next_month = new Date(this.year2, this.month2 + 1, 1)

        for(let i = first_of_next_month.getDay(); i < 8; i++) {
            const text = first_of_next_month.getDate() + i - first_of_next_month.getDay();
            const new_button = this.create_button2(text, true, false)
            this.dates2.appendChild(new_button)
        }
    }

    display_dates() {

        this.update_year_month()

        this.dates.innerHTML=""


        // last
        const today = new Date();
        const last_of_prev_month = new Date(this.year, this.month, 0)

        for(let i = 0; i < last_of_prev_month.getDay(); i++) {
            const text = last_of_prev_month.getDate() - last_of_prev_month.getDay() + i
            const new_button = this.create_button(text, true, false);
            this.dates.appendChild(new_button)
        }

        // this month

        const last_of_month = new Date(this.year, this.month + 1, 0)
        for(let i = 1; i<= last_of_month.getDate(); i++) {
            const is_today = this.isToday(today, this.year, this.month, i)
            const [today_day, today_month, today_year] = [today.getDate(), today.getMonth(), today.getFullYear()]
            const is_disabled = this.year < today_year || 
                (this.year === today_year && this.month < today_month) || 
                (this.year === today_year && this.month === today_month && i < today_day)
            const new_button = this.create_button(i, is_disabled, is_today)
            new_button.addEventListener('click', this.handle_date_click.bind(this))
            this.dates.appendChild(new_button)
        }

        // next month

        const first_of_next_month = new Date(this.year, this.month + 1, 1)

        for(let i = first_of_next_month.getDay(); i < 8; i++) {
            const text = first_of_next_month.getDate() + i - first_of_next_month.getDay();
            const new_button = this.create_button(text, true, false)
            this.dates.appendChild(new_button)
        }

    }

    isToday(today, year, month, day) {
        return (
            today.getFullYear() === year &&
            today.getMonth() === month &&
            today.getDate() === day
        );
    }

    create_button(text, is_disabled, is_today) {
        const new_button =document.createElement('button')
        new_button.textContent = text;
        new_button.disabled = is_disabled
        new_button.classList.toggle('today', is_today)
        return new_button
    }
    create_button2(text, is_disabled = false, is_today = false) {
        const new_button =document.createElement('button')
        new_button.textContent = text;
        new_button.disabled = is_disabled
        new_button.classList.toggle('today', is_today)
        return new_button
    }

    update_year_month () {
        this.month_input.selectedIndex = this.month
        this.year_input.value = this.year
    }
    update_year_month2 () {
        this.month_input2.selectedIndex = this.month2
        this.year_input2.value = this.year2
    }

    handle_date_click(e) {
        const new_button = e.target;

        const selected = document.querySelector('.selected')
        selected && selected.classList.remove('selected')

        new_button.classList.add('selected')

        this.selected_date = new Date(this.year, this.month, parseInt(new_button.textContent))
    }  


    handle_date_click2(e) {
        const new_button = e.target;

        const selected = document.querySelector('.selected2')
        selected && selected.classList.remove('selected2')

        new_button.classList.add('selected2')

        this.selected_date2 = new Date(this.year2, this.month2, parseInt(new_button.textContent))
    }   

}

if (window.location.pathname === '/' || window.location.pathname === '/rezervacija' || window.location.pathname === '/lokacija') {
    var calendar = new Calendar();
}

