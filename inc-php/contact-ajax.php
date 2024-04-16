<?php

add_action('wp_ajax_contact_form_action', 'contact_form_action_callback');
add_action('wp_ajax_nopriv_contact_form_action', 'contact_form_action_callback');

function contact_form_action_callback() {
    check_ajax_referer('wp_contact', 'nonce');

    if (isset($_POST['ajax_data'])) {
        $all_form_data = $_POST['ajax_data'];

        $ime = isset($all_form_data['ime']) ? sanitize_text_field($all_form_data['ime']) : '';
        $prezime = isset($all_form_data['prezime']) ? sanitize_text_field($all_form_data['prezime']) : '';
        $email = isset($all_form_data['email']) ? sanitize_email($all_form_data['email']) : '';
        $telefon = isset($all_form_data['telefon']) ? sanitize_text_field($all_form_data['telefon']) : '';
        $poruka = isset($all_form_data['poruka']) ? sanitize_text_field($all_form_data['poruka']) : '';

        $status = 'draft';
        $post_type_kontakt = 'kontakt' ;

    }  
    
    
    $kontakt_post_args = array(
        'post_title' => $ime . ' ' . $prezime,
        'post_status' => $status,
        'post_type' => $post_type_kontakt,
    );

    $id_kontakt = wp_insert_post($kontakt_post_args);

    if (!is_wp_error($id_kontakt)) {
        $kontakt_meta_fields = array(
            'broj_telefona' => $telefon,
            'email' => $email,
            'poruka' => $poruka,
        );
    }

    foreach($kontakt_meta_fields as $meta_key => $meta_value) {
        update_post_meta($id_kontakt, $meta_key, $meta_value);
    }

    
    wp_send_json_success('Poruka Poslana');
    wp_send_json_error('Pojavio se problem prilikom slanja poruke');

}