<?php
/*
Plugin Name: Access Incomplete Entries for Gravity Forms
Description: If a form submitter loses their "Save and Continue" URL, this will come in handy.
Version: 0.1
Author: Leland Fiegel
Author URI: https://leland.me/
License: GPL2
License URI: LICENSE
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

// Add menu item
add_action( 'admin_menu', 'access_incomplete_entries_menu' );

// Register menu item
function access_incomplete_entries_menu() {
	add_management_page( 'Access Incomplete Entries for Gravity Forms', 'Access Incomplete Entries', 'manage_options', 'access-incomplete-entries', 'access_incomplete_entries_admin' );
}

// Admin page
function access_incomplete_entries_admin() {
	// Only admins should be able to access this page
	if ( ! current_user_can( 'manage_options' ) )  {
		wp_die( 'You do not have sufficient permissions to access this page.' );
	}

	// Declare $wpdb as a global
	global $wpdb;

	// Make sure we're using the right database prefix
	$table_name = $wpdb->prefix . 'rg_incomplete_submissions';
	
	// Grab incomplete submissions
	$incomplete_submissions = $wpdb->get_results(
		"
		SELECT uuid, source_url, form_id, date_created, ip
		FROM $table_name
		"
	);

	echo '<div class="wrap">';
	echo '<h2>Access Incomplete Entries for Gravity Forms</h2>';
	
	if ( $incomplete_submissions ) { ?>

	<p>Below are all the incomplete form submissions. This will come in handy when people lose their tokenized URLs.</p>
	<table border="1" cellpadding="10">
		<tr>
			<th>Form ID</th>
			<th>Date/Time Created</th>
			<th>IP Address</th>
			<th>UUID</th>
			<th>Quick Link</th>
		</tr>

		<?php		
			foreach ( $incomplete_submissions as $incomplete_submission ) {
				echo '<tr>';
					echo '<td>' . esc_html( $incomplete_submission->form_id ) . '</td>';
					echo '<td>' . esc_html( $incomplete_submission->date_created ) . '</td>';
					echo '<td>' . esc_html( $incomplete_submission->ip ) . '</td>';
					echo '<td>' . esc_html( $incomplete_submission->uuid ) . '</td>';
					echo '<td><a href="' . trailingslashit( esc_attr( $incomplete_submission->source_url ) ) . '?gf_token=' . esc_attr( $incomplete_submission->uuid ) . '" target="_blank">View Entry</a></td>';
				echo '</tr>';
			}
		?>
	</table>

	<?php
	} else {
		echo '<p>No incomplete submissions found.</p>';
	}

	echo '</div>';
}
