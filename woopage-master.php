<?php
/**
* Plugin Name: AAWooPage Master
* Description: WooPage Master plugin is an product single page for enables customer to have a quick look of product without visiting product page.
* Plugin URI: https://bestwpdeveloper.com/shop/
* Version: 1.0
* Author: Best WP Developer
* Author URI: https://bestwpdeveloper.com/
* Text Domain: woopage-master
*/
// woopage-master
//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
require_once ( plugin_dir_path(__FILE__) ) . '/all-inc/requires-check.php';
//Load plugin text domain
function productsarchive_load_txtdomain() {
	$domain = 'woopage-master';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	// load_textdomain( $domain, WP_LANG_DIR . '/'.$domain.'-' . $locale . '.mo' ); //wp-content languages
	load_plugin_textdomain( $domain, FALSE, basename( dirname( __FILE__ ) ) . '/languages/' ); // Plugin Languages
}
add_action('plugins_loaded','productsarchive_load_txtdomain');

//WooCommerce Activation & Mobile device check
if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option('active_plugins'))) || class_exists( 'WooCommerce' )){
	include plugin_dir_path(__FILE__). 'productsarchive-boots.php';
}
else{
	add_action( 'admin_notices', 'productsarchive_WooCommerce_register_required_plugins' );
}

?>