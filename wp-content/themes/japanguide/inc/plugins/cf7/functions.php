<?php if (!defined('APP_PATH')) die ('Bad requested!');
add_filter( 'wpcf7_validate', 'email_already_in_db', 10, 2 );

function email_already_in_db ( $result, $tags ) {
    // retrieve the posted email
    $form  = WPCF7_Submission::get_instance();
    if ( $form->get_posted_data('_wpcf7') == '8352' ) {
        $email = $form->get_posted_data('your-email');
        global $wpdb;
        $entry = $wpdb->get_results( "SELECT * FROM jpg_db7_forms WHERE form_value LIKE '%$email%'" );
        // if already in database, invalidate
        if( !empty($entry) )
            $result->invalidate('your-email', 'Your email exists in our database');
        // return the filtered value
        return $result;
    }
}
