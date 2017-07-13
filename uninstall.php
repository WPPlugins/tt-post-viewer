<?php
// Check that code was called from WordPress with uninstallation
// constant declared


if( !defined( 'WP_UNINSTALL_PLUGIN' ) ){
	exit;
}

// Check if options exist and delete them if present

if ( get_option( 'ttpv_plugin_options' ) != false ) {
	delete_option( 'ttpv_plugin_options' );
}

if ( get_option( 'widget_ttpv_authors_widget' ) != false ) {
	delete_option( 'widget_ttpv_authors_widget' );
}

if ( get_option( 'widget_ttpv_category_widget' ) != false ) {
	delete_option( 'widget_ttpv_category_widget' );
}
if ( get_option( 'widget_ttpv_featured_widget' ) != false ) {
	delete_option( 'widget_ttpv_featured_widget' );
}
if ( get_option( 'widget_ttpv_mostcommented_widget' ) != false ) {
	delete_option( 'widget_ttpv_mostcommented_widget' );
}
if ( get_option( 'widget_ttpv_mostpopular_widget' ) != false ) {
	delete_option( 'widget_ttpv_mostpopular_widget' );
}
if ( get_option( 'widget_ttpv_recentpost_widget' ) != false ) {
	delete_option( 'widget_ttpv_recentpost_widget' );
}
if ( get_option( 'widget_ttpv_related_widget' ) != false ) {
	delete_option( 'widget_ttpv_related_widget' );
}





?>
