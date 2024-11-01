<?php
/*
Plugin Name: Widgets Olakala
Plugin URI: https://happy-wordpress.fr/plugins-wordpress/widgets-olakala/
Description: Ajoute 2 Widgets Olakala : 1 Widget score et 1 Widget reviews.
Version: 1.0
Author: Happy Wordpress
Author URI: https://happy-wordpress.fr
Licence: GPLv2

Text Domain: widgets-olakala
Domain Path: languages
*/

defined( 'ABSPATH' ) || die( 'Cheatin\' uh?' );

function widgets_olakala_activate() {}
register_activation_hook( __FILE__, 'widgets_olakala_activate' );

function widgets_olakala_deactivate() {}
register_deactivation_hook( __FILE__, 'widgets_olakala_deactivate' );

function load_widgets_olakala_textdomain() {
    load_plugin_textdomain( 'widgets-olakala',false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'load_widgets_olakala_textdomain' );

if(!defined('OLAKALA_WIDGET_PLUGIN_URL')){
	define('OLAKALA_WIDGET_PLUGIN_URL', plugin_dir_url( __FILE__ ));
}
if(!defined('OLAKALA_WIDGET_PLUGIN_BASE_URL')){
    define('OLAKALA_WIDGET_PLUGIN_BASE_URL',dirname( __FILE__ ));
}
if(!defined('OLAKALA_API_SCORE_URL')){
    define('OLAKALA_API_SCORE_URL', 'http://v3.olakala.com/api/v3/score/');
}
if(!defined('OLAKALA_API_REVIEWS_URL')){
    define('OLAKALA_API_REVIEWS_URL', 'http://v3.olakala.com/api/v3/reviews/');
}


require_once(OLAKALA_WIDGET_PLUGIN_BASE_URL.'/widgets-olakala-widget-score-class.php');
require_once(OLAKALA_WIDGET_PLUGIN_BASE_URL.'/widgets-olakala-widget-reviews-class.php');
require_once(OLAKALA_WIDGET_PLUGIN_BASE_URL.'/shortcodes-olakala.php');