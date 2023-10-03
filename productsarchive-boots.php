<?php
// Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
// Plugin Admin Options
include plugin_dir_path(__FILE__).'all-inc/productsarchive-admin1main.php';
// include plugin_dir_path(__FILE__).'all-inc/productsarchive-admin.php';

// The product templates
if($productsarchive_lb_en_gallery_value){
	add_filter('template_include', 'ferdaus_single_product_template', 99);
}

function ferdaus_single_product_template($template) {
	if (is_singular('product')) {
		// $new_template = plugin_dir_path(__FILE__) . 'woocommerce/option1-functions.php';
		$new_template = plugin_dir_path(__FILE__) . 'woocommerce/option1.php';
		if (file_exists($new_template)) {
			return $new_template;
		}
	}
	return $template;
}




// Get default quantity
function get_default_quantity() {
	global $product;
	return $product->get_min_purchase_quantity();
}

// Get Add to Cart input field
function get_add_to_cart_input() {
	global $product;
	ob_start();
	woocommerce_quantity_input(array(
			'min_value' => apply_filters('woocommerce_quantity_input_min', 1, $product),
			'max_value' => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product)
	));
	return ob_get_clean();
}





// All custom css stylesheet
function productsarchive_styles(){
	global $productsarchive_button_position_value,$productsarchive_btn_bgc_value,$productsarchive_relpro_productsaleprice_hover_bgcolor_value;
	$slider_value = get_option('productsarchive-nouislider', 50);
	$html = "<style>
	.ferdaus01010{
		color:{$productsarchive_btn_bgc_value};
			}
			h2.entry-title{
				color:{$productsarchive_relpro_productsaleprice_hover_bgcolor_value};
			}
			h2.entry-title{
				font-size:{$slider_value}px;
			}
	";
	if($productsarchive_button_position_value == 'image_hover'){
		$html .= 'a.className{
			top: 50%;
		}
		.product:hover a.className{
			visibility: visible;
		}';
	}

	$html .= '</style>';
	echo $html;
}
add_action('wp_head','productsarchive_styles',99);


// View font awesome for public
function name_fucntion_sksk(){
	wp_enqueue_style('productsarchive_awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet
	wp_enqueue_style('productsarchive_10_swiper', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/cdn.jsdelivr.net_npm_swiper@10_swiper-bundle.min.css', array(), '1.0');
	wp_enqueue_style('productsarchive_all_min', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/all.min.css', array(), '1.0');
	wp_enqueue_style('productsarchive_main', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/css/main.css', array(), '1.0');

	wp_enqueue_script('productsarchive_10_swiper', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/js/cdn.jsdelivr.net_npm_swiper@10_swiper-bundle.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('productsarchive_main', plugin_dir_url( __FILE__ ) . 'all-inc/public-assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'name_fucntion_sksk');
?>
