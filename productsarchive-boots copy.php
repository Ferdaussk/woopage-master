<?php
// Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Plugin Admin Options
include plugin_dir_path(__FILE__).'all-inc/productsarchive-admin.php';


// All enqueue scripts
function productsarchive_enqueue_scripts(){
	global $productsarchive_lb_title_value, // For the LightBox image title
			$productsarchive_gl_anim_value,  // For animation
			$productsarchive_button_position_value; // The image Hover effect

	wp_enqueue_style('productsarchive-style-css', plugins_url('/all-inc/font-assets/css/productsarchive-style.css',__FILE__), null, '1.0');
	wp_enqueue_script('productsarchive-js', plugins_url('/all-inc/font-assets/js/productsarchive-js-min.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_script('productsarchive-just-js', plugins_url('/all-inc/font-assets/js/productsarchive-js.js',__FILE__), array('jquery'), '1.0', true);
	wp_localize_script('productsarchive-js','productsarchive_localize',array(
		'adminurl' => admin_url().'admin-ajax.php',
		'prettyPhoto_title' => esc_attr($productsarchive_lb_title_value),
		'modal_anim' => esc_attr($productsarchive_gl_anim_value),
		'img_hover_btn'		=> esc_attr($productsarchive_button_position_value)
		));
}
add_action('wp_enqueue_scripts','productsarchive_enqueue_scripts');

// This scripts for wooproduct image popup (Assets from woocommerce plugin)
function productsarchive_lightbox() {
	global $woocommerce , $productsarchive_lb_enable_value; // Enable Lightbox
	wp_enqueue_script( 'wc-add-to-cart-variation' ); //Variable product Script
	if ( $productsarchive_lb_enable_value ) {
	  wp_enqueue_script( 'prettyPhoto', $woocommerce->plugin_url() . '/assets/js/prettyPhoto/jquery.prettyPhoto.min.js', array( 'jquery' ), '1.0', true );
	  wp_enqueue_style( 'woocommerce_prettyPhoto_css', $woocommerce->plugin_url() . '/assets/css/prettyPhoto.css' );
	}
}
add_action( 'wp_footer', 'productsarchive_lightbox' );

add_action( 'productsarchive-images', 'woocommerce_show_product_sale_flash', 10 );
// The product images
function productsarchive_product_image(){
	include(plugin_dir_path(__FILE__).'/wooc_functions/product_images/productsarchive-product-image.php');
}
add_action('productsarchive-images','productsarchive_product_image',20);

// The product thumbnails
if($productsarchive_lb_en_gallery_value){
	// function productsarchive_product_thumbnails(){
	// 	include(plugin_dir_path(__FILE__).'/wooc_functions/product_images/productsarchive-product-thumbnails.php');
	// }
	// add_action('productsarchive_after_product_image','productsarchive_product_thumbnails',5);
	
	add_filter('template_include', 'ferdaus_single_product_template', 99);
}

function ferdaus_single_product_template($template) {
	if (is_singular('product')) {
		$new_template = plugin_dir_path(__FILE__) . 'woocommerce/option1.php';
		if (file_exists($new_template)) {
			return $new_template;
		}
	}
	return $template;
}

// All summary hooks
add_action( 'productsarchive-summary', 'woocommerce_template_single_title', 5 );
add_action( 'productsarchive-summary', 'woocommerce_template_single_rating', 10 );
add_action( 'productsarchive-summary', 'woocommerce_template_single_price', 15 );
add_action( 'productsarchive-summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'productsarchive-summary', 'woocommerce_template_single_add_to_cart', 25 );
add_action( 'productsarchive-summary', 'woocommerce_template_single_meta', 30 );

// Quick View parent box
function productsarchive_panel(){
	$html  = '<div class="productsarchive-opac"></div>';
	$html .= '<div class="productsarchive-panel">';
	$html .= '<div class="productsarchive-preloader productsarchive-opl">';
	$html .= '<div class="productsarchive-speeding-wheel"></div>';
	$html .= '</div>';
	$html .= '<div class="productsarchive-modal"></div>';
	$html .= '</div>';
	echo $html;
}
add_action('wp_footer','productsarchive_panel');

// This is the quick view button
function productsarchive_button(){
	global $productsarchive_button_text_value , $productsarchive_btn_icon_value;
	$html  = '<a class="productsarchive-button" qv-id = "'.get_the_ID().'">';
	if($productsarchive_btn_icon_value){
	$html .= '<span class="productsarchive-btn-icon dashicons dashicons-visibility"></span>';
	}
	$html .= esc_attr__($productsarchive_button_text_value,'products-archive');
	$html .= '</a>';
	echo $html;
}

// Quick View button position settings
$productsarchive_button_position_value = esc_attr($productsarchive_button_position_value);
if($productsarchive_button_position_value == 'woocommerce_after_shop_loop_item' || $productsarchive_button_position_value == 'image_hover'){
	add_action('woocommerce_after_shop_loop_item','productsarchive_button',11); // Quick View button
}
else{
	add_action($productsarchive_button_position_value,'woocommerce_template_loop_product_link_close',11); //Closing WC link
	add_action($productsarchive_button_position_value,'productsarchive_button',11); // Quick View button
	add_action($productsarchive_button_position_value,'woocommerce_template_loop_product_link_open',11); // Opening WC link
}

// Including Quick View/Ajax Template here
require_once plugin_dir_path(__FILE__).'/wooc_functions/productsarchive-popup.php';

// All custom css stylesheet
function productsarchive_styles(){
	global $productsarchive_button_color_value , $productsarchive_lb_img_width_value , $productsarchive_btn_iconc_value , $productsarchive_button_fsize_value,$productsarchive_button_position_value,$productsarchive_btn_bgc_value,$productsarchive_btn_ps_value,$productsarchive_btn_margin_value,$productsarchive_btn_btype_value,$productsarchive_btn_bs_value,$productsarchive_btn_bc_value,$productsarchive_lb_img_area_value,$productsarchive_btn_bors_value, $productsarchive_btn_hover_bgc_value,
	$productsarchive_quick_view_wrapper_v, $productsarchive_quick_view_title_v, $productsarchive_quick_view_description_v, $productsarchive_wrapper_padding, $productsarchive_quick_view_wrapper_radius, $productsarchive_summary_padding,
	$productsarchive_quick_view_old_price_v, $productsarchive_quick_view_new_price_v, $productsarchive_quick_view_add_cart_b, $productsarchive_quick_view_add_cart_c, $productsarchive_quick_view_cart_radius, $productsarchive_quick_view_cart_border_style, $productsarchive_quick_view_slide_arrow_v;
	$html = "<style>
				a.productsarchive-button{
					color: {$productsarchive_button_color_value};
					background-color: {$productsarchive_btn_bgc_value};
					padding: {$productsarchive_btn_ps_value};
					margin: {$productsarchive_btn_margin_value};
					font-size: {$productsarchive_button_fsize_value}px;
					border: {$productsarchive_btn_bs_value}px {$productsarchive_btn_btype_value} {$productsarchive_btn_bc_value};
					border-radius: {$productsarchive_btn_bors_value}px;
				}
				a.productsarchive-button:hover{
					background-color: {$productsarchive_btn_hover_bgc_value};
				}
				.woocommerce div.product .productsarchive-images  div.images{
					width: {$productsarchive_lb_img_width_value}%;
				}
				.productsarchive-btn-icon{
					color: {$productsarchive_btn_iconc_value};
				}
				.productsarchive-container{
					background-color: {$productsarchive_quick_view_wrapper_v};
					border-radius: {$productsarchive_quick_view_wrapper_radius};
				}
				.productsarchive-main .product_title{
					color: {$productsarchive_quick_view_title_v};
				}
				.productsarchive-main del span.woocommerce-Price-amount.amount{
					color: {$productsarchive_quick_view_old_price_v};
				}
				.productsarchive-main ins span.woocommerce-Price-amount.amount{
					color: {$productsarchive_quick_view_new_price_v};
				}
				.single-product div.product .woocommerce-product-details__short-description p, .single-product div.product .woocommerce-product-details__short-description p a{
					color: {$productsarchive_quick_view_description_v};
				}
				.productsarchive-images {
					padding: {$productsarchive_wrapper_padding};
				}
				.productsarchive-summary{
					padding: {$productsarchive_summary_padding};
				}
				.productsarchive-summary .single_add_to_cart_button, .productsarchive-summary button {
					background: {$productsarchive_quick_view_add_cart_b} !important;
					color: {$productsarchive_quick_view_add_cart_c} !important;
					border-radius: {$productsarchive_quick_view_cart_radius};
					border: {$productsarchive_quick_view_cart_border_style};
				}
				.productsarchive-chevron-left:before, .productsarchive-chevron-right:before{
					color: {$productsarchive_quick_view_slide_arrow_v};
				}
				";
	if($productsarchive_button_position_value == 'image_hover'){
		$html .= 'a.productsarchive-button{
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			visibility: hidden;
		}
		.product:hover a.productsarchive-button{
		    visibility: visible;
		    transform: translate(-50%,-50%);
		}';
	}

	if($img_area = $productsarchive_lb_img_area_value){
		$desc_area = 100-$img_area-3; 
	}
	else{
		$img_area  = 48;
		$desc_area = 48; 
	}

	$html .= '.productsarchive-images{
					width: '.$img_area.'%;
				}
				.productsarchive-summary{
					width: '.$desc_area.'%;
				}';

	$html .= '</style>';
	echo $html;
}
add_action('wp_head','productsarchive_styles',99);
?>