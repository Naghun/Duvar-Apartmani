<?php

add_action('wp_ajax_reservation_form_action', 'reservation_form_action_callback');
add_action('wp_ajax_nopriv_reservation_form_action', 'reservation_form_action_callback');

function reservation_form_action_callback() {

    check_ajax_referer('wp_rest', 'nonce');

    $status = 'draft';
    $post_type = 'zauzet-dan' ;
    $new_days = $_POST['ajax_data'];
    

    $args = array(
        'post_type' => 'zauzet-dan',
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    
    $taken_dates = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $taken_dates[] = get_the_title();
        }
        wp_reset_postdata();
    }

    $is_date_taken = false;
    
    foreach($new_days as $new_day) {
        $sanitized_new_day = sanitize_text_field($new_day);
        if (in_array($sanitized_new_day, $taken_dates)) {
            $is_date_taken = true;
            break;
        }
    }

    $nights = count($new_days)-1;
    $response = array();
    if ($is_date_taken == true) {
        $response['dosupnost'] = 'datum zauzet';
    } else {
        $response['dostupnost'] = "Datumi su slobodni";
    }


    $apartman_post = new WP_Query(array(
        'post_type'      => 'apartman',
        'posts_per_page' => 1
    ));
    
    while($apartman_post -> have_posts()) {
        $apartman_post -> the_post();
        $cijena = get_field('cijena');
        $response['cijena'] = $cijena;
    }  
    wp_reset_postdata();

    $response['noći'] = $nights;
    

    wp_send_json_success($response);
    wp_die();
}

add_action('wp_ajax_get_taken_dates', 'get_taken_dates_callback');
add_action('wp_ajax_nopriv_get_taken_dates', 'get_taken_dates_callback');

function get_taken_dates_callback() {
    check_ajax_referer('wp_rest', 'nonce');
    $args = array(
        'post_type' => 'zauzet-dan',
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    
    $taken_dates = array();
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $taken_dates[] = get_the_title();
        }
        wp_reset_postdata();
    }

    wp_send_json_success($taken_dates);
}


add_action('wp_ajax_reservation_form_complete_data', 'get_all_data_callback');
add_action('wp_ajax_nopriv_reservation_form_complete_data', 'get_all_data_callback');

function get_all_data_callback() {
    check_ajax_referer('wp_rest', 'nonce');

    if (isset($_POST['ajax_data'])) {
        $all_form_data = $_POST['ajax_data'];
    
        $formatted_dates_all = $all_form_data[0];
        $form_details = $all_form_data[1];

        $formatted_dates = array_slice($formatted_dates_all, 0, -1);

        // getting data from form_details

        $ime = isset($form_details['ime']) ? sanitize_text_field($form_details['ime']) : '';
        $prezime = isset($form_details['prezime']) ? sanitize_text_field($form_details['prezime']) : '';
        $email = isset($form_details['email']) ? sanitize_email($form_details['email']) : '';
        $phone = isset($form_details['telefon']) ? sanitize_text_field($form_details['telefon']) : '';
        $adresa = isset($form_details['adresa']) ? sanitize_text_field($form_details['adresa']) : '';
        $broj_pasosa = isset($form_details['broj_pasosa']) ? sanitize_text_field($form_details['broj_pasosa']) : '';        
        $broj_gostiju = isset($form_details['broj_gostiju']) ? sanitize_text_field($form_details['broj_gostiju']) : '';    
        
        // setting usual variables

        $status = 'draft';
        $post_type_days = 'zauzet-dan' ;
        $post_type_guest = 'gost' ;
        $post_type_reservation = 'rezervacija';
    }

    // rezervacija

    $rezervacija_post_args = array(
        'post_title' => 'Rezervacija - ' . $ime,
        'post_status' => $status,
        'post_type' => $post_type_reservation,
    );

    $id_rezervacija = wp_insert_post($rezervacija_post_args);

    if (!is_wp_error($id_rezervacija)) {
        $rezervacija_meta_fields = array(
            'vrijeme_dolaska' => date('Y-m-d', strtotime(reset($formatted_dates_all))),
            'vrijeme_odjave' => date('Y-m-d', strtotime(end($formatted_dates_all))),
            'broj_gostiju' => $broj_gostiju,
            'ime_gosta' => $ime . '' . $prezime,
            'kontakt_gosta' => $email,
        );
    }

    foreach($rezervacija_meta_fields as $meta_key => $meta_value) {
        update_post_meta($id_rezervacija, $meta_key, $meta_value);
    }

    // gost

    $gost_post_args = array(
        'post_title'    => $ime . ' ' . $prezime,
        'post_status'   => $status,
        'post_type'     => $post_type_guest,
    );

    $id_gost = wp_insert_post($gost_post_args);

    if (!is_wp_error($id_gost)) {
        $gost_meta_fields = array(
            'email' => $email,
            'broj_telefona' => $phone,
            'adresa' => $adresa,
            'broj_pasosa' => $broj_pasosa,
        );
    }

    foreach($gost_meta_fields as $meta_key => $meta_value) {
        update_post_meta($id_gost, $meta_key, $meta_value);
    }

    // dani

    foreach ($formatted_dates as $date) {
        $days_args = array(
            'post_title'    => $date,
            'post_status'   => 'draft',
            'post_type'     => $post_type_days,
        );
    
        $new_zauzet_dan = wp_insert_post($days_args);
    }

    wp_send_json_success('Rezervacija uspješna');
    wp_send_json_error('neka greska');
}