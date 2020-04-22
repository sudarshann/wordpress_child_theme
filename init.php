<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


define( 'SB_VERSION', '1.0.0' );
define('SB_VERSION_API_VERSION', 'v1');

define('SB_DIR', get_stylesheet_directory() . '/');
define('SB_URL', get_stylesheet_directory_uri(). '/');

define('SB_TEMPLATES_PATH', SB_DIR . 'templates/');
define('SB_TEMPLATES_URI', SB_URL . 'templates/');

define('SB_THEME_TEMPLATES_PATH', SB_TEMPLATES_PATH . 'theme-templates/');
define('SB_THEME_TEMPLATES_URI', SB_TEMPLATES_URI . 'theme-templates/');
 
 define('SB_ASSETS_PATH', SB_DIR . 'assets/');
 define('SB_ASSETS_URI',  SB_URL . 'assets/');
 
 define('SB_CLASSES_PATH', SB_DIR . 'classes/');
 
 define('SB_CLASSES_NAMESPACE', 'SB');
 
 define('SB_ASSETS_IMAGE_PATH', SB_ASSETS_PATH . 'images/');
 define('SB_ASSETS_IMAGE_URI', SB_ASSETS_URI . 'images/');

 define('SB_ASSETS_STYLE_PATH', SB_ASSETS_PATH . 'css/');
 define('SB_ASSETS_STYLE_URI', SB_ASSETS_URI . 'css/');

 define('SB_ASSETS_SCRIPT_PATH', SB_ASSETS_PATH . 'js/');
 define('SB_ASSETS_SCRIPT_URI', SB_ASSETS_URI . 'js/');
 
 define('SB_ASSETS_VIDEO_PATH', SB_ASSETS_PATH . 'videos/');
 define('SB_ASSETS_VIDEO_URI', SB_ASSETS_URI . 'videos/');

 define('SB_DEBUG_MODE', true);
 
define('SB_TEXT_DOMAIN', 'reka-child');

if ( ! class_exists( 'SB_Core' ) ) {
	include_once dirname( __FILE__ ) . '/classes/' . SB_CLASSES_NAMESPACE . '/' . SB_CLASSES_NAMESPACE . '.php';
}