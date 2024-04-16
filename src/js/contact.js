class ContactLogic {
    constructor() {
        this.form = document.getElementById('contact-form')
        this.name = document.getElementById('contact-name')
        this.surname = document.getElementById('contact-surname')
        this.phone = document.getElementById('contact-phone')
        this.email = document.getElementById('contact-email')
        this.message = document.getElementById('contact-message')
        this.submit_button = document.getElementById('contact-submit')

        this.contact_form_body = document.getElementById('contact-body')
        this.message_info = document.getElementById('message-info')
        this.message = document.getElementById('message')

        this.events()
    }

    events() {
        this.submit_button.addEventListener('click', (e) => {
            e.preventDefault()
            const all_data = {
                ime : this.name.value,
                prezime : this.surname.value,
                telefon : this.phone.value,
                email : this.email.value,
                poruka : this.message.value
            }


            try {
                jQuery.ajax({
                    type: "post",
                    url: `${window.location.origin}/wp-admin/admin-ajax.php`,
                    data: {
                        nonce: form_contact_data.nonce,
                        action: "contact_form_action",
                        ajax_data: all_data
                    },
                    complete: (response) => {
                        if(response.responseJSON.data === 'Poruka Poslana') {
                            this.contact_form_body.classList.remove('d-flex')
                            this.contact_form_body.classList.add('d-none')

                            this.message.innerHTML = 'Poruka poslana'

                            this.message_info.classList.add('d-flex')
                            this.message_info.classList.remove('d-none')

                            setTimeout(() => {
                                this.message_info.classList.add('fade-out')
                            }, 1500);

                            setTimeout(() => {
                                this.message_info.classList.remove('d-flex');
                                this.message_info.classList.add('d-none');

                                this.contact_form_body.classList.remove('d-none');
                                this.contact_form_body.classList.add('d-flex');
                        
                                this.message_info.classList.remove('fade-out');
                            }, 2500);
                            
                        } else {
                            this.contact_form_body.classList.remove('d-flex')
                            this.contact_form_body.classList.add('d-none')

                            this.message.innerHTML = 'Problem sa slanjem poruke'

                            this.message_info.classList.add('d-flex')
                            this.message_info.classList.remove('d-none')

                            setTimeout(() => {
                                this.message_info.classList.add('fade-out')
                            }, 1500);

                            setTimeout(() => {
                                this.message_info.classList.remove('d-flex');
                                this.message_info.classList.add('d-none');

                                this.contact_form_body.classList.remove('d-none');
                                this.contact_form_body.classList.add('d-flex');
                        
                                this.message_info.classList.remove('fade-out');
                            }, 2500);
                        }
                    }
                });
            } catch (error) {
                console.error('Error:', error);
            }
        })
    }

    // methods
}

const contact_logic = new ContactLogic();