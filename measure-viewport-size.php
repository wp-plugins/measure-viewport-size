<?php
/*
Plugin Name: Measure Viewport Size
Plugin URI: http://beantin.se/post/903946687/wordpress-plugin-browser-viewport-size#utm_source=wordpress&utm_medium=plugin&utm_campaign=measure-viewport-size&utm_content=v100
Description: Measure browser viewport size and record in Google Analytics
Version: 1.0.3
Author: James Royal-Lawson
Author URI: http://beantin.se
License: GPL
*/

/* function to load the viewport javascript code */
function my_init_method() {
	wp_enqueue_script('measure-viewport-size',
	WP_PLUGIN_URL . '/measure-viewport-size/js/viewport.js'
	);
}   

/* function to add the onload code to the html of the web page */
function add_body_onload($c) {
	$c[] = '" onload="viewport()';
	return $c;
}

if ( !is_admin() ) { // instruction to only load if it is not the admin area

	/* filter hook for the html body tag */
	add_filter('body_class','add_body_onload');
	/* acton hook to load the javascript function */
	add_action('init', 'my_init_method');

}

?>
