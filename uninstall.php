<?php

/**
 * Trigger this file on Plugin uninstall
 *
 * @package  WriterzBayformPlugin
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
}

// Clear Database stored data
$writerzbayforms = get_posts( array( 'post_type' => 'writerzbayform', 'numberposts' => -1 ) );

foreach( $writerzbayforms as $form ) {
	wp_delete_post( $form->ID, true );
}

// Access the database via SQL
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'writerzbayform'" );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );
$wpdb->query( "DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)" );