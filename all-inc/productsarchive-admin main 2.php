<?php
// THIS IS ADMIN SETTINGS (DASHBOARD SETTINGS)

//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}

// Enqueue Scripts & Stylesheet
function productsarchive_admin_enqueue(){
	wp_enqueue_style('productsarchive-admin-css', plugins_url('/admin-assets/css/style.css',__FILE__), null, '1.0', 'all');
	wp_enqueue_style('productsarchive-admin-tab-css', plugins_url('/admin-assets/css/tab.css',__FILE__), null, '1.0', 'all');
	wp_enqueue_script('productsarchive-admin-js', plugins_url('/admin-assets/js/script.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_script('productsarchive-admin-reset_scripts', plugins_url('/admin-assets/js/reset_scripts.js',__FILE__), array('jquery'), '1.0', true);
	wp_enqueue_style('fonteee-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet

	// Enqueue Select2 and Font Awesome
	wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
	wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
	// For icon and font familly
	// wp_enqueue_script('productsarchive-admin-font_control', plugins_url('/admin-assets/js/font_control.js',__FILE__), array('jquery'), '1.0', true);
	// wp_enqueue_script('productsarchive-admin-icon_control', plugins_url('/admin-assets/js/icon_control.js',__FILE__), array('jquery'), '1.0', true);

	// some cdn for the alert notification design
	if (isset($_GET['page']) && $_GET['page'] === 'productsarchive_single_sk') {
		wp_enqueue_style('productsarchive-reset-alert-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', null, '1.0', 'all');
		wp_enqueue_script('productsarchive-reset-alert-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array('jquery'), '1.0', true);
		wp_enqueue_script('productsarchive-reset-alert-scripts', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '1.0', true);
	}
}
add_action('admin_enqueue_scripts','productsarchive_admin_enqueue');

//Settings page
function productsarchive_menu_settings(){
	add_menu_page( 'WooPage Master Settings', 'WooPage Master', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-analytics', 57 );
	add_action('admin_init','productsarchive_settings');
}
add_action('admin_menu','productsarchive_menu_settings');

//Settings callback function
function productsarchive_settings_cb(){
	// The save button for bottom save
	settings_errors(); ?>
	<div class="productsarchive-main-settings">
		<form method="POST" action="options.php" class="productsarchive-form">
			<?php settings_fields('productsarchive-group'); ?>
			<?php do_settings_sections('productsarchive_single'); ?>
			</div><div class="productsarchive-save-btn"><?php submit_button(); ?></div>
		</form>
	</div>
<?php
}

// All custom settings and register all custom controls
function productsarchive_settings(){
	include 'wp_controls.php';
}

/* Here custom settings functions registered  */

// This is admin header 
function productsarchive_header_section(){
	?>
	<div class="productsarchive_the_class">
		<div class="productsarchive_data productsarchive_name"><a class="productsarchive_au_title" href="https://bestwpdeveloper.com" target="_blank"><h2 class="productsarchive_dashtitle"><?php _e('BEST WP DEVELOPER', 'woopage-master'); ?></h2></a></div>
		<div class="productsarchive_data productsarchive_demo">
			<div class="productsarchive_the_author"><a class="productsarchive_the_demo" href="https://bestwpdeveloper.com/woopage-master/" target="_blank"><?php _e('Go Demo', 'woopage-master'); ?></a></div>
			<div class="productsarchive_the_author"><a class="productsarchive_the_author_a" href=""><?php _e('Go License', 'woopage-master'); ?></a></div>
		</div>
	</div>
	<?php 
}

// Tab test one
function productsarchive_tab_section(){
	?>
	<div class="productsarchive_tab_items">
		<div class="productsarchive_items">
			<div id="tab1" class="tab-btn active"><?php _e('Settings', 'woopage-master'); ?></div>
			<div id="tab2" class="tab-btn"><?php _e('Styles', 'woopage-master'); ?></div>
		</div>
		<div class="productsarchive_save_btn"><?php submit_button(); ?></div>
		<div class="productsarchive_save_btn"><input type="button" class="productsarchive_settings_reset" onclick="checkReset();" value="Reset All" id="resetButton"></div>
	</div>
	<?php
}
#################---####### Settings start
//***************---****** Archive Sections start
function productsarchive_settings_sk(){ //------ Section  (Tab)
	$tab = '<div class="tab-content" id="tab1Content">';
	echo $tab.'<div class="productsarchive_acc_items productsarchive_acc1_view1">'.__('Archive Settings','woopage-master').'</div><div class="productsarchive_acc1_view1_content">';
}
function productsarchive_general_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="productsarchive_acc_items productsarchive_acc1_view2">'.__('General Settings','woopage-master').'</div><div class="productsarchive_acc1_view2_content">';
}
function productsarchive_general_relpro_settings_sk(){  //------ Section  (Tab)
	echo '</div><div class="productsarchive_acc_items productsarchive_acc1_view2">'.__('Related Products Queries','woopage-master').'</div><div class="productsarchive_acc1_view2_content">';
}
//***************---****** Archive Sections end

//***************---****** Archive Settings start
//Enable single product page
$productsarchive_lb_en_gallery_value = sanitize_text_field(get_option('productsarchive-enable-product-single-page','true'));
function productsarchive_lb_en_gallery_cb(){
	global $productsarchive_lb_en_gallery_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-enable-product-single-page" name="productsarchive-enable-product-single-page" value="true" '.checked('true',$productsarchive_lb_en_gallery_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;

}
// Product single page styles
$productsarchive_button_position_value = sanitize_text_field( get_option('productsarchive-select-preset-single-product','woocommerce_before_shop_loop_item_title'));
function productsarchive_button_position_cb(){
	global $productsarchive_button_position_value;
	?>
	<select name="productsarchive-select-preset-single-product" class="productsarchive-input" id="productsarchive-select-preset-single-product">
		<?php $default = 'default'; ?>
		<option value="<?php echo $default ?>" <?php selected($productsarchive_button_position_value,$default); ?>><?php _e('Default','woopage-master'); ?></option>
		<?php $style2 = 'style2'; ?>
		<option value="<?php echo $style2 ?>" <?php selected($productsarchive_button_position_value,$style2); ?>><?php _e('Style 2','woopage-master'); ?></option>
		<?php $style3 = 'style3'; ?>
		<option value="<?php echo $style3 ?>" <?php selected($productsarchive_button_position_value,$style3); ?>><?php _e('Style 3','woopage-master'); ?></option>
		<?php $style4 = 'style4'; ?>
		<option value="<?php echo $style4 ?>" <?php selected($productsarchive_button_position_value,$style4); ?>><?php _e('Style 4','woopage-master'); ?></option>
		<?php $style5 = 'style5'; ?>
		<option value="<?php echo $style5 ?>" <?php selected($productsarchive_button_position_value,$style5); ?>><?php _e('Style 5','woopage-master'); ?></option>
		</select>
	<?php
}
//***************---****** Archive Settings start

//***************---****** General Settings Controls start
//------ General style input start
// breadcrumb check
$productsarchive_breadcrumb_check_value = sanitize_text_field(get_option('productsarchive-breadcrumb-check-gallery','true'));
function productsarchive_breadcrumb_check_cb(){
	global $productsarchive_breadcrumb_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-breadcrumb-check-gallery" name="productsarchive-breadcrumb-check-gallery" value="true" '.checked('true',$productsarchive_breadcrumb_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// stock check
$productsarchive_stock_check_value = sanitize_text_field(get_option('productsarchive-stock-check-gallery','true'));
function productsarchive_stock_check_cb(){
	global $productsarchive_stock_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-stock-check-gallery" name="productsarchive-stock-check-gallery" value="true" '.checked('true',$productsarchive_stock_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Sale check
$productsarchive_sale_check_value = sanitize_text_field(get_option('productsarchive-sale-check-gallery','true'));
function productsarchive_sale_check_cb(){
	global $productsarchive_sale_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-sale-check-gallery" name="productsarchive-sale-check-gallery" value="true" '.checked('true',$productsarchive_sale_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// featured check
$productsarchive_featured_img_check_value = sanitize_text_field(get_option('productsarchive-featured-img-check-gallery','true'));
function productsarchive_featured_img_check_cb(){
	global $productsarchive_featured_img_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-featured-img-check-gallery" name="productsarchive-featured-img-check-gallery" value="true" '.checked('true',$productsarchive_featured_img_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// gallery check
$productsarchive_gallery_img_check_value = sanitize_text_field(get_option('productsarchive-gallery-img-check-gallery','true'));
function productsarchive_gallery_img_check_cb(){
	global $productsarchive_gallery_img_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-gallery-img-check-gallery" name="productsarchive-gallery-img-check-gallery" value="true" '.checked('true',$productsarchive_gallery_img_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Title check
$productsarchive_title_check_value = sanitize_text_field(get_option('productsarchive-title-check-gallery','true'));
function productsarchive_title_check_cb(){
	global $productsarchive_title_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-title-check-gallery" name="productsarchive-title-check-gallery" value="true" '.checked('true',$productsarchive_title_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// regular price check
$productsarchive_reg_price_check_value = sanitize_text_field(get_option('productsarchive-reg-price-check-gallery','true'));
function productsarchive_reg_price_check_cb(){
	global $productsarchive_reg_price_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-reg-price-check-gallery" name="productsarchive-reg-price-check-gallery" value="true" '.checked('true',$productsarchive_reg_price_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// short description check
$productsarchive_short_description_check_value = sanitize_text_field(get_option('productsarchive-short-description-check-gallery','true'));
function productsarchive_short_description_check_cb(){
	global $productsarchive_short_description_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-short-description-check-gallery" name="productsarchive-short-description-check-gallery" value="true" '.checked('true',$productsarchive_short_description_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// categories check
$productsarchive_categories_check_value = sanitize_text_field(get_option('productsarchive-categories-check-gallery','true'));
function productsarchive_categories_check_cb(){
	global $productsarchive_categories_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-categories-check-gallery" name="productsarchive-categories-check-gallery" value="true" '.checked('true',$productsarchive_categories_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// tags check
$productsarchive_tags_check_value = sanitize_text_field(get_option('productsarchive-tags-check-gallery','false'));
function productsarchive_tags_check_cb(){
	global $productsarchive_tags_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-tags-check-gallery" name="productsarchive-tags-check-gallery" value="true" '.checked('true',$productsarchive_tags_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// quantity check
$productsarchive_quantity_check_value = sanitize_text_field(get_option('productsarchive-quantity-check-gallery','true'));
function productsarchive_quantity_check_cb(){
	global $productsarchive_quantity_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-quantity-check-gallery" name="productsarchive-quantity-check-gallery" value="true" '.checked('true',$productsarchive_quantity_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// addtocart check
$productsarchive_addtocart_check_value = sanitize_text_field(get_option('productsarchive-addtocart-check-gallery','true'));
function productsarchive_addtocart_check_cb(){
	global $productsarchive_addtocart_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-addtocart-check-gallery" name="productsarchive-addtocart-check-gallery" value="true" '.checked('true',$productsarchive_addtocart_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// description check
$productsarchive_description_check_value = sanitize_text_field(get_option('productsarchive-description-check-gallery','true'));
function productsarchive_description_check_cb(){
	global $productsarchive_description_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-description-check-gallery" name="productsarchive-description-check-gallery" value="true" '.checked('true',$productsarchive_description_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}

// Related Products General Settings Controls Start
// addtocart check
$productsarchive_related_products_check_value = sanitize_text_field(get_option('productsarchive-related-products-check-gallery','true'));
function productsarchive_related_products_check_cb(){
	global $productsarchive_related_products_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-related-products-check-gallery" name="productsarchive-related-products-check-gallery" value="true" '.checked('true',$productsarchive_related_products_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_toptile_check_value = sanitize_text_field(get_option('productsarchive-relpro-toptile-check-gallery','true'));
function productsarchive_relpro_toptile_check_cb(){
	global $productsarchive_relpro_toptile_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-toptile-check-gallery" name="productsarchive-relpro-toptile-check-gallery" value="true" '.checked('true',$productsarchive_relpro_toptile_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_prodimg_check_value = sanitize_text_field(get_option('productsarchive-relpro-prodimg-check-gallery','true'));
function productsarchive_relpro_prodimg_check_cb(){
	global $productsarchive_relpro_prodimg_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-prodimg-check-gallery" name="productsarchive-relpro-prodimg-check-gallery" value="true" '.checked('true',$productsarchive_relpro_prodimg_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_imglnk_check_value = sanitize_text_field(get_option('productsarchive-relpro-imglnk-check-gallery','true'));
function productsarchive_relpro_imglnk_check_cb(){
	global $productsarchive_relpro_imglnk_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-imglnk-check-gallery" name="productsarchive-relpro-imglnk-check-gallery" value="true" '.checked('true',$productsarchive_relpro_imglnk_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_prodtitle_check_value = sanitize_text_field(get_option('productsarchive-relpro-prodtitle-check-gallery','true'));
function productsarchive_relpro_prodtitle_check_cb(){
	global $productsarchive_relpro_prodtitle_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-prodtitle-check-gallery" name="productsarchive-relpro-prodtitle-check-gallery" value="true" '.checked('true',$productsarchive_relpro_prodtitle_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_titlelnk_check_value = sanitize_text_field(get_option('productsarchive-relpro-titlelnk-check-gallery','true'));
function productsarchive_relpro_titlelnk_check_cb(){
	global $productsarchive_relpro_titlelnk_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-titlelnk-check-gallery" name="productsarchive-relpro-titlelnk-check-gallery" value="true" '.checked('true',$productsarchive_relpro_titlelnk_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_prodpric_check_value = sanitize_text_field(get_option('productsarchive-relpro-prodpric-check-gallery','true'));
function productsarchive_relpro_prodpric_check_cb(){
	global $productsarchive_relpro_prodpric_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-prodpric-check-gallery" name="productsarchive-relpro-prodpric-check-gallery" value="true" '.checked('true',$productsarchive_relpro_prodpric_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_button_check_value = sanitize_text_field(get_option('productsarchive-relpro-button-check-gallery','true'));
function productsarchive_relpro_button_check_cb(){
	global $productsarchive_relpro_button_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-button-check-gallery" name="productsarchive-relpro-button-check-gallery" value="true" '.checked('true',$productsarchive_relpro_button_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_count_value = sanitize_text_field(get_option('productsarchive-relpro-count-gallery', '3'));
function productsarchive_relpro_count_cb(){
	global $productsarchive_relpro_count_value;
	echo '<input type="text" name="productsarchive-relpro-count-gallery" id="productsarchive-relpro-count-gallery" value="'.$productsarchive_relpro_count_value.'" title="Just a number."  placeholder="3">';
}
$productsarchive_relpro_excdpro_value = sanitize_text_field(get_option('productsarchive-relpro-excdpro-gallery'));
function productsarchive_relpro_excdpro_cb(){
	global $productsarchive_relpro_excdpro_value;
	echo '<input type="text" name="productsarchive-relpro-excdpro-gallery" id="productsarchive-relpro-excdpro-gallery" value="'.$productsarchive_relpro_excdpro_value.'" title="Just product ID number."  placeholder="3, 4, 5">';
}
$productsarchive_relpro_dsc_check_value = sanitize_text_field(get_option('productsarchive-relpro-dsc-check-gallery','false'));
function productsarchive_relpro_dsc_check_cb(){
	global $productsarchive_relpro_dsc_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-dsc-check-gallery" name="productsarchive-relpro-dsc-check-gallery" value="false" '.checked('true',$productsarchive_relpro_dsc_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
$productsarchive_relpro_dscwordl_value = sanitize_text_field(get_option('productsarchive-relpro-dscwordl-gallery', '10'));
function productsarchive_relpro_dscwordl_cb(){
	global $productsarchive_relpro_dscwordl_value;
	echo '<input type="text" name="productsarchive-relpro-dscwordl-gallery" id="productsarchive-relpro-dscwordl-gallery" value="'.$productsarchive_relpro_dscwordl_value.'" title="Just a number."  placeholder="10">';
}
$productsarchive_relpro_dscind_value = sanitize_text_field(get_option('productsarchive-relpro-dscind-gallery', '...'));
function productsarchive_relpro_dscind_cb(){
	global $productsarchive_relpro_dscind_value;
	echo '<input type="text" name="productsarchive-relpro-dscind-gallery" id="productsarchive-relpro-dscind-gallery" value="'.$productsarchive_relpro_dscind_value.'" title="Any Text."  placeholder="...">';
}
// Related Products General Settings Controls end
//***************---****** General Settings Controls end
#################---####### Settings end

#################---####### Settings field end
//***************---****** Style control section title start
function productsarchive_general_style_cb(){
	$tab = '</div></div><div class="tab-content" id="tab2Content" style="display: none;">';
	echo $tab.'<div class="productsarchive_acc_items productsarchive_acc2_view1" id="general">'.__('General Style Settings','woopage-master').'</div><div class="productsarchive_acc2_view1_content">';
}
function productsarchive_breadcrumb_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view2" id="breadcrumb">'.__('Breadcrumb Style','woopage-master').'</div><div class="productsarchive_acc2_view2_content">';
}
function productsarchive_breadcrumb_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_stockornot_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Stock Or Not','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_stockornot_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_salenote_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Sale Note','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_salenote_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_featuredimg_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Images','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_galleryimgs_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Gallery Imgs','woopage-master').'</b></div>';
}
function productsarchive_producttitle_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Title','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_producttitle_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_productprice_reg_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Price','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_productprice_sale_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Sale Price','woopage-master').'</b></div>';
}
function productsarchive_productshortdesc_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Short Description','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_variablesproduct_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Variable Product','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_productcategory_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Category','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_productcategory_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_producttags_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Tags','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_producttags_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_product_quantity_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Quantity','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_product_addtocart_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Add To Cart','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_product_descandrev_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Description & Review','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_related_product_styles_cb(){ // Related Products Style Label
	echo '</div><div class="productsarchive_relpro_styles" id="style"><b>'.__('Related Products','woopage-master').'</b></div><div class="added_the_class_for_this_label">';
}
function productsarchive_related_product_wrapper_styles_cb(){ 
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Wrapper','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
////////////////////////
function productsarchive_relpro_featuredimg_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Images','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_relpro_producttitle_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Title','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_relpro_producttitle_hover_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Hover Style','woopage-master').'</b></div>';
}
function productsarchive_relpro_productprice_reg_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__('Product Price','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
function productsarchive_relpro_productprice_sale_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Sale Price','woopage-master').'</b></div>';
}
function productsarchive_relpro_product_addtocart_style_cb(){
	echo '</div><div class="productsarchive_acc_items productsarchive_acc2_view3" id="general">'.__(' More View','woopage-master').'</div><div class="productsarchive_acc2_view3_content">';
}
//***************---****** Style control section title end 

//***************---****** Style inputs start (Tab)
//Font size
$productsarchive_button_fsize_value = sanitize_text_field(get_option('productsarchive-general-style-fsize',14));
function productsarchive_button_fsize_cb(){
	global $productsarchive_button_fsize_value;
	echo  '<input type="text" class="productsarchive-input" name="productsarchive-general-style-fsize" id="productsarchive-general-style-fsize" value="'.$productsarchive_button_fsize_value.'">';
}

// Title Color
$productsarchive_btn_bgc_value = sanitize_text_field(get_option('productsarchive-general-title-clr','#8f8f8f'));
function productsarchive_btn_bgc_cb(){
	global $productsarchive_btn_bgc_value;
	echo '<input type="color" class="color-field" name="productsarchive-general-title-clr" id="productsarchive-general-title-clr" value="'.$productsarchive_btn_bgc_value.'" >';
}

//Button Hover Title Color
$productsarchive_btn_hover_bgc_value = sanitize_text_field(get_option('productsarchive-btn-hover-bgc','#585858'));
function productsarchive_btn_hover_bgc_cb(){
	global $productsarchive_btn_hover_bgc_value;
	echo '<input type="color" class="color-field" name="productsarchive-btn-hover-bgc" value="'.$productsarchive_btn_hover_bgc_value.'" >';
}

//Button Color
$productsarchive_button_color_value = sanitize_text_field(get_option('productsarchive-button-color','white'));
function productsarchive_button_color_cb(){
	global $productsarchive_button_color_value;
	echo '<input type="color" class="color-field" name="productsarchive-button-color" value="'.$productsarchive_button_color_value.'" >';
}

//Button Padding
$productsarchive_btn_ps_value = sanitize_text_field(get_option('productsarchive-btn-ps','6px 8px'));
function productsarchive_btn_ps_cb(){
	global $productsarchive_btn_ps_value;
	echo '<input type="text" name="productsarchive-btn-ps" value="'.$productsarchive_btn_ps_value.'" >';
}

//Button Margin
$productsarchive_btn_margin_value = sanitize_text_field(get_option('productsarchive-btn-margin',' '));
function productsarchive_btn_margin_cb(){
	global $productsarchive_btn_margin_value;
	echo '<input type="text" name="productsarchive-btn-margin" value="'.$productsarchive_btn_margin_value.'" >';
}

//Border Type
$productsarchive_btn_btype_value = sanitize_text_field(get_option('productsarchive-btn-btype','solid'));
function productsarchive_btn_btype_cb(){
	global $productsarchive_btn_btype_value;
	echo '<input type="text" name="productsarchive-btn-btype" value="'.$productsarchive_btn_btype_value.'" >';
}

//Border Size
$productsarchive_btn_bs_value = sanitize_text_field(get_option('productsarchive-btn-bs',' '));
function productsarchive_btn_bs_cb(){
	global $productsarchive_btn_bs_value;
	echo '<input type="text" name="productsarchive-btn-bs" value="'.$productsarchive_btn_bs_value.'">';
}

// Border radius
$productsarchive_btn_bors_value = sanitize_text_field(get_option('productsarchive-btn-bors','4'));
function productsarchive_btn_bors(){
	global $productsarchive_btn_bors_value;
	echo '<input type="text" name="productsarchive-btn-bors" value="'.$productsarchive_btn_bors_value.'" >';
}

//Border Color
$productsarchive_btn_bc_value = sanitize_text_field(get_option('productsarchive-btn-bc',' '));
function productsarchive_btn_bc_cb(){
	global $productsarchive_btn_bc_value;
	echo '<input type="color" class="color-field" name="productsarchive-btn-bc" value="'.$productsarchive_btn_bc_value.'" >';
}

//Button icon color
$productsarchive_btn_iconc_value = sanitize_text_field(get_option('productsarchive-btn-iconc','white'));
function productsarchive_btn_iconc_cb(){
	global $productsarchive_btn_iconc_value;
	echo '<input type="color" class="color-field" name="productsarchive-btn-iconc" value="'.$productsarchive_btn_iconc_value.'" >';
}
//------ General style input start

//------ Breadcrumb style input start
// Alignment
$productsarchive_breadalign_value = sanitize_text_field( get_option('productsarchive-breadalign','woocommerce_before_shop_loop_item_title'));
function productsarchive_breadalign_fld(){
	global $productsarchive_breadalign_value;
	?>
	<select name="productsarchive-breadalign" class="productsarchive-input" id="productsarchive-breadalign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_breadalign_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_breadalign_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_breadalign_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_text_color_value = sanitize_text_field(get_option('productsarchive-text-color-control')); // add a default color using comma
function productsarchive_text_color_fld(){
	global $productsarchive_text_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-text-color-control" id="productsarchive-text-color-control" value="'.$productsarchive_text_color_value.'" >';
}
// BG Color
$productsarchive_text_bgcolor_value = sanitize_text_field(get_option('productsarchive-text-bgcolor-control'));
function productsarchive_text_bgcolor_fld(){
	global $productsarchive_text_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-text-bgcolor-control" id="productsarchive-text-color-bgcontrol" value="'.$productsarchive_text_bgcolor_value.'" >';
}
// Size
$productsarchive_breadcrumb_size_value = sanitize_text_field(get_option('productsarchive-breadcrumb-size-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_size_fld(){
	global $productsarchive_breadcrumb_size_value;
	echo '<input type="text" name="productsarchive-breadcrumb-size-control" value="'.$productsarchive_breadcrumb_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_breadcrumb_padding_value = sanitize_text_field(get_option('productsarchive-breadcrumb-padding-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_padding_fld(){
	global $productsarchive_breadcrumb_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-breadcrumb-padding-control" value="'.$productsarchive_breadcrumb_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_breadcrumb_margin_value = sanitize_text_field(get_option('productsarchive-breadcrumb-margin-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_margin_fld(){
	global $productsarchive_breadcrumb_margin_value;
	echo '<input type="text" name="productsarchive-breadcrumb-margin-control" value="'.$productsarchive_breadcrumb_margin_value.'"  placeholder="Four values allowed">';
}
// icon
function productsarchive_breadcrumb_icon_fld(){
	?>
	<div class="wrap">
			<select id="selected_icon" name="productsarchive-breadcrumb-icon-control" style="width: 200px;">
					<!-- Icons will be dynamically populated using JavaScript -->
			</select>
	</div>
	<script>
			(function ($) {
					$(document).ready(function () {
							const iconSelect = $('#selected_icon');
							const iconPreview = $('#selected_icon_preview');

							// List of available icons and their classes
							const availableIcons = {
									'fa fa-adjust': 'Adjust Icon',
									'fa fa-align-center': 'Align Center Icon',
									'fa fa-align-justify': 'Align Justify Icon',
									// Add more icons here
							};

							// Function to populate the icon select control
							function populateIconSelect() {
									// Loop through available icons and create options
									Object.entries(availableIcons).forEach(([iconClass, iconName]) => {
											const optionText = `<i class="${iconClass}"></i> ${iconName}`;
											iconSelect.append($('<option>', {
													value: iconClass,
													html: optionText
											}));
									});
							}

							// Call the function to populate the icon select control
							populateIconSelect();

							// Initialize Select2
							iconSelect.select2({
									templateResult: formatIconOption
							});

							// Function to format the icon option in Select2
							function formatIconOption(iconClass) {
									if (!iconClass.id) {
											return iconClass.text;
									}
									const $option = $('<span>').html(iconClass.text);
									$option.prepend($(`<i class="${iconClass.id}"></i>`));
									return $option;
							}

							// Event listener for the icon select control
							iconSelect.on('change', function () {
									const selectedIcon = $(this).val();
									iconPreview.attr('class', selectedIcon);
							});

							// Set the initial value of the icon select control from the saved option
							const savedIcon = '<?php echo esc_attr(get_option("productsarchive-breadcrumb-icon-control", "fa fa-adjust")); ?>';
							iconSelect.val(savedIcon).trigger('change');
					});
			})(jQuery);
	</script>
<?php
}
// font familly
function productsarchive_fontfamilly_cb()
{
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php
}
// Breadcrumb hover style input
// Color
$productsarchive_breadcrumb_hover_color_value = sanitize_text_field(get_option('productsarchive-breadcrumb-hover-color-control')); // add a default color using comma
function productsarchive_breadcrumb_hover_color_fld(){
	global $productsarchive_breadcrumb_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-breadcrumb-hover-color-control" id="productsarchive-breadcrumb-hover-color-control" value="'.$productsarchive_breadcrumb_hover_color_value.'" >';
}
// BG Color
$productsarchive_breadcrumb_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-breadcrumb-hover-bgcolor-control'));
function productsarchive_breadcrumb_hover_bgcolor_fld(){
	global $productsarchive_breadcrumb_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-breadcrumb-hover-bgcolor-control" id="productsarchive-breadcrumb-hover-color-bgcontrol" value="'.$productsarchive_breadcrumb_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_breadcrumb_hover_size_value = sanitize_text_field(get_option('productsarchive-breadcrumb-hover-size-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_hover_size_fld(){
	global $productsarchive_breadcrumb_hover_size_value;
	echo '<input type="text" name="productsarchive-breadcrumb-hover-size-control" value="'.$productsarchive_breadcrumb_hover_size_value.'"  placeholder="0px">';
}
//------ Breadcrumb style input end

//------ Stock or Not style input start
// Alignment
$productsarchive_stockornotalign_value = sanitize_text_field( get_option('productsarchive-stockornotalign','woocommerce_before_shop_loop_item_title'));
function productsarchive_stockornotalign_fld(){
	global $productsarchive_stockornotalign_value;
	?>
	<select name="productsarchive-stockornotalign" class="productsarchive-input" id="productsarchive-stockornotalign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_stockornotalign_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_stockornotalign_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_stockornotalign_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_stockornot_color_value = sanitize_text_field(get_option('productsarchive-stockornot-color-control')); // add a default color using comma
function productsarchive_stockornot_color_fld(){
	global $productsarchive_stockornot_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-stockornot-color-control" id="productsarchive-stockornot-color-control" value="'.$productsarchive_stockornot_color_value.'" >';
}
// BG Color
$productsarchive_stockornot_bgcolor_value = sanitize_text_field(get_option('productsarchive-stockornot-bgcolor-control'));
function productsarchive_stockornot_bgcolor_fld(){
	global $productsarchive_stockornot_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-stockornot-bgcolor-control" id="productsarchive-stockornot-color-bgcontrol" value="'.$productsarchive_stockornot_bgcolor_value.'" >';
}
// Size
$productsarchive_stockornot_size_value = sanitize_text_field(get_option('productsarchive-stockornot-size-control','0px 0px 0px 0px'));
function productsarchive_stockornot_size_fld(){
	global $productsarchive_stockornot_size_value;
	echo '<input type="text" name="productsarchive-stockornot-size-control" value="'.$productsarchive_stockornot_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_stockornot_padding_value = sanitize_text_field(get_option('productsarchive-stockornot-padding-control','0px 0px 0px 0px'));
function productsarchive_stockornot_padding_fld(){
	global $productsarchive_stockornot_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-stockornot-padding-control" value="'.$productsarchive_stockornot_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_stockornot_margin_value = sanitize_text_field(get_option('productsarchive-stockornot-margin-control','0px 0px 0px 0px'));
function productsarchive_stockornot_margin_fld(){
	global $productsarchive_stockornot_margin_value;
	echo '<input type="text" name="productsarchive-stockornot-margin-control" value="'.$productsarchive_stockornot_margin_value.'"  placeholder="Four values allowed">';
}

// Stock or Not hover style input
// Color
$productsarchive_stockornot_hover_color_value = sanitize_text_field(get_option('productsarchive-stockornot-hover-color-control')); // add a default color using comma
function productsarchive_stockornot_hover_color_fld(){
	global $productsarchive_stockornot_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-stockornot-hover-color-control" id="productsarchive-stockornot-hover-color-control" value="'.$productsarchive_stockornot_hover_color_value.'" >';
}
// BG Color
$productsarchive_stockornot_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-stockornot-hover-bgcolor-control'));
function productsarchive_stockornot_hover_bgcolor_fld(){
	global $productsarchive_stockornot_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-stockornot-hover-bgcolor-control" id="productsarchive-stockornot-hover-color-bgcontrol" value="'.$productsarchive_stockornot_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_stockornot_hover_size_value = sanitize_text_field(get_option('productsarchive-stockornot-hover-size-control','0px 0px 0px 0px'));
function productsarchive_stockornot_hover_size_fld(){
	global $productsarchive_stockornot_hover_size_value;
	echo '<input type="text" name="productsarchive-stockornot-hover-size-control" value="'.$productsarchive_stockornot_hover_size_value.'"  placeholder="0px">';
}
//------ Stock or Not style input end

//------ Sale Note style inputs start
// Alignment
$productsarchive_salenotealign_value = sanitize_text_field( get_option('productsarchive-salenotealign','woocommerce_before_shop_loop_item_title'));
function productsarchive_salenotealign_fld(){
	global $productsarchive_salenotealign_value;
	?>
	<select name="productsarchive-salenotealign" class="productsarchive-input" id="productsarchive-salenotealign">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_salenotealign_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_salenotealign_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_salenotealign_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_salenote_color_value = sanitize_text_field(get_option('productsarchive-salenote-color-control')); // add a default color using comma
function productsarchive_salenote_color_fld(){
	global $productsarchive_salenote_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-salenote-color-control" id="productsarchive-salenote-color-control" value="'.$productsarchive_salenote_color_value.'" >';
}
// BG Color
$productsarchive_salenote_bgcolor_value = sanitize_text_field(get_option('productsarchive-salenote-bgcolor-control'));
function productsarchive_salenote_bgcolor_fld(){
	global $productsarchive_salenote_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-salenote-bgcolor-control" id="productsarchive-salenote-color-bgcontrol" value="'.$productsarchive_salenote_bgcolor_value.'" >';
}
// Size
$productsarchive_salenote_size_value = sanitize_text_field(get_option('productsarchive-salenote-size-control','0px 0px 0px 0px'));
function productsarchive_salenote_size_fld(){
	global $productsarchive_salenote_size_value;
	echo '<input type="text" name="productsarchive-salenote-size-control" value="'.$productsarchive_salenote_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_salenote_padding_value = sanitize_text_field(get_option('productsarchive-salenote-padding-control','0px 0px 0px 0px'));
function productsarchive_salenote_padding_fld(){
	global $productsarchive_salenote_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-salenote-padding-control" value="'.$productsarchive_salenote_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_salenote_margin_value = sanitize_text_field(get_option('productsarchive-salenote-margin-control','0px 0px 0px 0px'));
function productsarchive_salenote_margin_fld(){
	global $productsarchive_salenote_margin_value;
	echo '<input type="text" name="productsarchive-salenote-margin-control" value="'.$productsarchive_salenote_margin_value.'"  placeholder="Four values allowed">';
}

// Sale Note hover style inputs
// Color
$productsarchive_salenote_hover_color_value = sanitize_text_field(get_option('productsarchive-salenote-hover-color-control')); // add a default color using comma
function productsarchive_salenote_hover_color_fld(){
	global $productsarchive_salenote_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-salenote-hover-color-control" id="productsarchive-salenote-hover-color-control" value="'.$productsarchive_salenote_hover_color_value.'" >';
}
// BG Color
$productsarchive_salenote_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-salenote-hover-bgcolor-control'));
function productsarchive_salenote_hover_bgcolor_fld(){
	global $productsarchive_salenote_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-salenote-hover-bgcolor-control" id="productsarchive-salenote-hover-color-bgcontrol" value="'.$productsarchive_salenote_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_salenote_hover_size_value = sanitize_text_field(get_option('productsarchive-salenote-hover-size-control','0px 0px 0px 0px'));
function productsarchive_salenote_hover_size_fld(){
	global $productsarchive_salenote_hover_size_value;
	echo '<input type="text" name="productsarchive-salenote-hover-size-control" value="'.$productsarchive_salenote_hover_size_value.'"  placeholder="0px">';
}
//------ Sale Note style inputs end

//------ Featured img style inputs end
// Alignment
$productsarchive_fetuimg_align_value = sanitize_text_field( get_option('productsarchive-fetuimg-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_fetuimg_align_fld(){
	global $productsarchive_fetuimg_align_value;
	?>
	<select name="productsarchive-fetuimg-align" class="productsarchive-input" id="productsarchive-fetuimg-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_fetuimg_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_fetuimg_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Border Check
$productsarchive_fetuimg_border_check_value = sanitize_text_field(get_option('productsarchive-fetuimg-border-control','false'));
function productsarchive_fetuimg_border_fld(){
	global $productsarchive_fetuimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-fetuimg-border-control" name="productsarchive-fetuimg-border-control" value="true" '.checked('true',$productsarchive_fetuimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border Typee
$productsarchive_fetuimg_brdrtype_value = sanitize_text_field(get_option('productsarchive-fetuimg-brdrtype-control'));
function productsarchive_fetuimg_brdrtype_fld(){
	global $productsarchive_fetuimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="productsarchive-fetuimg-brdrtype-control" id="productsarchive-fetuimg-brdrtype-control" value="'.$productsarchive_fetuimg_brdrtype_value.'" >';
}
// Border color
$productsarchive_fetuimg_border_clr_check_value = sanitize_text_field(get_option('productsarchive-fetuimg-border-clr-control','false'));
function productsarchive_fetuimg_border_clr_fld(){
	global $productsarchive_fetuimg_border_clr_check_value;
	echo'<input type="color" class="color-field" name="productsarchive-fetuimg-border-clr-control" id="productsarchive-fetuimg-border-clr-control" value="'.$productsarchive_fetuimg_border_clr_check_value.'" >';
}
// Border radius
$productsarchive_fetuimg_bdrrds_value = sanitize_text_field(get_option('productsarchive-fetuimg-bdrrds-control','0px 0px 0px 0px'));
function productsarchive_fetuimg_bdrrds_fld(){
	global $productsarchive_fetuimg_bdrrds_value;
	echo '<input type="text" name="productsarchive-fetuimg-bdrrds-control" value="'.$productsarchive_fetuimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$productsarchive_fetuimg_padding_value = sanitize_text_field(get_option('productsarchive-fetuimg-padding-control','0px 0px 0px 0px'));
function productsarchive_fetuimg_padding_fld(){
	global $productsarchive_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-fetuimg-padding-control" value="'.$productsarchive_fetuimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_fetuimg_margin_value = sanitize_text_field(get_option('productsarchive-fetuimg-margin-control','0px 0px 0px 0px'));
function productsarchive_fetuimg_margin_fld(){
	global $productsarchive_fetuimg_margin_value;
	echo '<input type="text" name="productsarchive-fetuimg-margin-control" value="'.$productsarchive_fetuimg_margin_value.'"  placeholder="Four values allowed">';
}
//------ Featured img style inputs end

//------ Gallery imgs style inputs end
// Border Check
$productsarchive_gllimg_border_check_value = sanitize_text_field(get_option('productsarchive-gllimg-border-control','false'));
function productsarchive_gllimg_border_fld(){
	global $productsarchive_gllimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-gllimg-border-control" name="productsarchive-gllimg-border-control" value="true" '.checked('true',$productsarchive_gllimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border color
$productsarchive_gllimg_border_clr_check_value = sanitize_text_field(get_option('productsarchive-gllimg-border-clr-control','false'));
function productsarchive_gllimg_border_clr_fld(){
	global $productsarchive_gllimg_border_clr_check_value;
	echo'<input type="color" class="color-field" name="productsarchive-gllimg-border-clr-control" id="productsarchive-gllimg-border-clr-control" value="'.$productsarchive_gllimg_border_clr_check_value.'" >';
}
// Border Typee
$productsarchive_gllimg_brdrtype_value = sanitize_text_field(get_option('productsarchive-gllimg-brdrtype-control'));
function productsarchive_gllimg_brdrtype_fld(){
	global $productsarchive_gllimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="productsarchive-gllimg-brdrtype-control" id="productsarchive-gllimg-brdrtype-control" value="'.$productsarchive_gllimg_brdrtype_value.'" >';
}
// Border radius
$productsarchive_gllimg_bdrrds_value = sanitize_text_field(get_option('productsarchive-gllimg-bdrrds-control','0px 0px 0px 0px'));
function productsarchive_gllimg_bdrrds_fld(){
	global $productsarchive_gllimg_bdrrds_value;
	echo '<input type="text" name="productsarchive-gllimg-bdrrds-control" value="'.$productsarchive_gllimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$productsarchive_gllimg_padding_value = sanitize_text_field(get_option('productsarchive-gllimg-padding-control','0px 0px 0px 0px'));
function productsarchive_gllimg_padding_fld(){
	global $productsarchive_gllimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-gllimg-padding-control" value="'.$productsarchive_gllimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_gllimg_margin_value = sanitize_text_field(get_option('productsarchive-gllimg-margin-control','0px 0px 0px 0px'));
function productsarchive_gllimg_margin_fld(){
	global $productsarchive_gllimg_margin_value;
	echo '<input type="text" name="productsarchive-gllimg-margin-control" value="'.$productsarchive_gllimg_margin_value.'"  placeholder="Four values allowed">';
}
//------ Gallery imgs style inputs end

//------ Product Title style input start
// Alignment
$productsarchive_producttitle_align_value = sanitize_text_field( get_option('productsarchive-producttitle-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_producttitle_align_fld(){
	global $productsarchive_producttitle_align_value;
	?>
	<select name="productsarchive-producttitle-align" class="productsarchive-input" id="productsarchive-producttitle-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_producttitle_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_producttitle_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_producttitle_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_producttitle_color_value = sanitize_text_field(get_option('productsarchive-producttitle-color-control')); // add a default color using comma
function productsarchive_producttitle_color_fld(){
	global $productsarchive_producttitle_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttitle-color-control" id="productsarchive-producttitle-color-control" value="'.$productsarchive_producttitle_color_value.'" >';
}
// BG Color
$productsarchive_producttitle_bgcolor_value = sanitize_text_field(get_option('productsarchive-producttitle-bgcolor-control'));
function productsarchive_producttitle_bgcolor_fld(){
	global $productsarchive_producttitle_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttitle-bgcolor-control" id="productsarchive-producttitle-color-bgcontrol" value="'.$productsarchive_producttitle_bgcolor_value.'" >';
}
// Size
$productsarchive_producttitle_size_value = sanitize_text_field(get_option('productsarchive-producttitle-size-control','0px 0px 0px 0px'));
function productsarchive_producttitle_size_fld(){
	global $productsarchive_producttitle_size_value;
	echo '<input type="text" name="productsarchive-producttitle-size-control" value="'.$productsarchive_producttitle_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_producttitle_padding_value = sanitize_text_field(get_option('productsarchive-producttitle-padding-control','0px 0px 0px 0px'));
function productsarchive_producttitle_padding_fld(){
	global $productsarchive_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-producttitle-padding-control" value="'.$productsarchive_producttitle_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_producttitle_margin_value = sanitize_text_field(get_option('productsarchive-producttitle-margin-control','0px 0px 0px 0px'));
function productsarchive_producttitle_margin_fld(){
	global $productsarchive_producttitle_margin_value;
	echo '<input type="text" name="productsarchive-producttitle-margin-control" value="'.$productsarchive_producttitle_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_producttitle_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Title hover style input
// Color
$productsarchive_producttitle_hover_color_value = sanitize_text_field(get_option('productsarchive-producttitle-hover-color-control')); // add a default color using comma
function productsarchive_producttitle_hover_color_fld(){
	global $productsarchive_producttitle_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttitle-hover-color-control" id="productsarchive-producttitle-hover-color-control" value="'.$productsarchive_producttitle_hover_color_value.'" >';
}
// BG Color
$productsarchive_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-producttitle-hover-bgcolor-control'));
function productsarchive_producttitle_hover_bgcolor_fld(){
	global $productsarchive_producttitle_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttitle-hover-bgcolor-control" id="productsarchive-producttitle-hover-color-bgcontrol" value="'.$productsarchive_producttitle_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_producttitle_hover_size_value = sanitize_text_field(get_option('productsarchive-producttitle-hover-size-control','0px 0px 0px 0px'));
function productsarchive_producttitle_hover_size_fld(){
	global $productsarchive_producttitle_hover_size_value;
	echo '<input type="text" name="productsarchive-producttitle-hover-size-control" value="'.$productsarchive_producttitle_hover_size_value.'"  placeholder="0px">';
}
//------ Product Title style input end

//------ Product Reg Price style input start
// Alignment
$productsarchive_productregprice_align_value = sanitize_text_field( get_option('productsarchive-productregprice-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_productregprice_align_fld(){
	global $productsarchive_productregprice_align_value;
	?>
	<select name="productsarchive-productregprice-align" class="productsarchive-input" id="productsarchive-productregprice-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_productregprice_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_productregprice_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_productregprice_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_productregprice_color_value = sanitize_text_field(get_option('productsarchive-productregprice-color-control')); // add a default color using comma
function productsarchive_productregprice_color_fld(){
	global $productsarchive_productregprice_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productregprice-color-control" id="productsarchive-productregprice-color-control" value="'.$productsarchive_productregprice_color_value.'" >';
}
// BG Color
$productsarchive_productregprice_bgcolor_value = sanitize_text_field(get_option('productsarchive-productregprice-bgcolor-control'));
function productsarchive_productregprice_bgcolor_fld(){
	global $productsarchive_productregprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productregprice-bgcolor-control" id="productsarchive-productregprice-color-bgcontrol" value="'.$productsarchive_productregprice_bgcolor_value.'" >';
}
// Size
$productsarchive_productregprice_size_value = sanitize_text_field(get_option('productsarchive-productregprice-size-control','0px 0px 0px 0px'));
function productsarchive_productregprice_size_fld(){
	global $productsarchive_productregprice_size_value;
	echo '<input type="text" name="productsarchive-productregprice-size-control" value="'.$productsarchive_productregprice_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_productregprice_padding_value = sanitize_text_field(get_option('productsarchive-productregprice-padding-control','0px 0px 0px 0px'));
function productsarchive_productregprice_padding_fld(){
	global $productsarchive_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-productregprice-padding-control" value="'.$productsarchive_productregprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_productregprice_margin_value = sanitize_text_field(get_option('productsarchive-productregprice-margin-control','0px 0px 0px 0px'));
function productsarchive_productregprice_margin_fld(){
	global $productsarchive_productregprice_margin_value;
	echo '<input type="text" name="productsarchive-productregprice-margin-control" value="'.$productsarchive_productregprice_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_productregprice_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Title hover style input
// Color
$productsarchive_productregprice_hover_color_value = sanitize_text_field(get_option('productsarchive-productregprice-hover-color-control')); // add a default color using comma
function productsarchive_productregprice_hover_color_fld(){
	global $productsarchive_productregprice_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productregprice-hover-color-control" id="productsarchive-productregprice-hover-color-control" value="'.$productsarchive_productregprice_hover_color_value.'" >';
}
// BG Color
$productsarchive_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-productregprice-hover-bgcolor-control'));
function productsarchive_productregprice_hover_bgcolor_fld(){
	global $productsarchive_productregprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productregprice-hover-bgcolor-control" id="productsarchive-productregprice-hover-color-bgcontrol" value="'.$productsarchive_productregprice_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_productregprice_hover_size_value = sanitize_text_field(get_option('productsarchive-productregprice-hover-size-control','0px 0px 0px 0px'));
function productsarchive_productregprice_hover_size_fld(){
	global $productsarchive_productregprice_hover_size_value;
	echo '<input type="text" name="productsarchive-productregprice-hover-size-control" value="'.$productsarchive_productregprice_hover_size_value.'"  placeholder="0px">';
}
//------ Product Reg Price style input end

//------ Product Sale Price style input start
// Color
$productsarchive_productsaleprice_color_value = sanitize_text_field(get_option('productsarchive-productsaleprice-color-control')); // add a default color using comma
function productsarchive_productsaleprice_color_fld(){
	global $productsarchive_productsaleprice_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productsaleprice-color-control" id="productsarchive-productsaleprice-color-control" value="'.$productsarchive_productsaleprice_color_value.'" >';
}
// BG Color
$productsarchive_productsaleprice_bgcolor_value = sanitize_text_field(get_option('productsarchive-productsaleprice-bgcolor-control'));
function productsarchive_productsaleprice_bgcolor_fld(){
	global $productsarchive_productsaleprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productsaleprice-bgcolor-control" id="productsarchive-productsaleprice-color-bgcontrol" value="'.$productsarchive_productsaleprice_bgcolor_value.'" >';
}
// Size
$productsarchive_productsaleprice_size_value = sanitize_text_field(get_option('productsarchive-productsaleprice-size-control','0px 0px 0px 0px'));
function productsarchive_productsaleprice_size_fld(){
	global $productsarchive_productsaleprice_size_value;
	echo '<input type="text" name="productsarchive-productsaleprice-size-control" value="'.$productsarchive_productsaleprice_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_productsaleprice_padding_value = sanitize_text_field(get_option('productsarchive-productsaleprice-padding-control','0px 0px 0px 0px'));
function productsarchive_productsaleprice_padding_fld(){
	global $productsarchive_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-productsaleprice-padding-control" value="'.$productsarchive_productsaleprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_productsaleprice_margin_value = sanitize_text_field(get_option('productsarchive-productsaleprice-margin-control','0px 0px 0px 0px'));
function productsarchive_productsaleprice_margin_fld(){
	global $productsarchive_productsaleprice_margin_value;
	echo '<input type="text" name="productsarchive-productsaleprice-margin-control" value="'.$productsarchive_productsaleprice_margin_value.'"  placeholder="Four values allowed">';
}
// Product sale price hover style input
// Color
$productsarchive_productsaleprice_hover_color_value = sanitize_text_field(get_option('productsarchive-productsaleprice-hover-color-control')); // add a default color using comma
function productsarchive_productsaleprice_hover_color_fld(){
	global $productsarchive_productsaleprice_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productsaleprice-hover-color-control" id="productsarchive-productsaleprice-hover-color-control" value="'.$productsarchive_productsaleprice_hover_color_value.'" >';
}
// BG Color
$productsarchive_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-productsaleprice-hover-bgcolor-control'));
function productsarchive_productsaleprice_hover_bgcolor_fld(){
	global $productsarchive_productsaleprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productsaleprice-hover-bgcolor-control" id="productsarchive-productsaleprice-hover-color-bgcontrol" value="'.$productsarchive_productsaleprice_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_productsaleprice_hover_size_value = sanitize_text_field(get_option('productsarchive-productsaleprice-hover-size-control','0px 0px 0px 0px'));
function productsarchive_productsaleprice_hover_size_fld(){
	global $productsarchive_productsaleprice_hover_size_value;
	echo '<input type="text" name="productsarchive-productsaleprice-hover-size-control" value="'.$productsarchive_productsaleprice_hover_size_value.'"  placeholder="0px">';
}
//------ Product Sale Price style input end

//------ Product Categories style input start
// Alignment
$productsarchive_productcategory_align_value = sanitize_text_field( get_option('productsarchive-productcategory-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_productcategory_align_fld(){
	global $productsarchive_productcategory_align_value;
	?>
	<select name="productsarchive-productcategory-align" class="productsarchive-input" id="productsarchive-productcategory-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_productcategory_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_productcategory_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_productcategory_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_productcategory_color_value = sanitize_text_field(get_option('productsarchive-productcategory-color-control')); // add a default color using comma
function productsarchive_productcategory_color_fld(){
	global $productsarchive_productcategory_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productcategory-color-control" id="productsarchive-productcategory-color-control" value="'.$productsarchive_productcategory_color_value.'" >';
}
// BG Color
$productsarchive_productcategory_bgcolor_value = sanitize_text_field(get_option('productsarchive-productcategory-bgcolor-control'));
function productsarchive_productcategory_bgcolor_fld(){
	global $productsarchive_productcategory_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productcategory-bgcolor-control" id="productsarchive-productcategory-color-bgcontrol" value="'.$productsarchive_productcategory_bgcolor_value.'" >';
}
// Size
$productsarchive_productcategory_size_value = sanitize_text_field(get_option('productsarchive-productcategory-size-control','0px 0px 0px 0px'));
function productsarchive_productcategory_size_fld(){
	global $productsarchive_productcategory_size_value;
	echo '<input type="text" name="productsarchive-productcategory-size-control" value="'.$productsarchive_productcategory_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_productcategory_padding_value = sanitize_text_field(get_option('productsarchive-productcategory-padding-control','0px 0px 0px 0px'));
function productsarchive_productcategory_padding_fld(){
	global $productsarchive_productcategory_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-productcategory-padding-control" value="'.$productsarchive_productcategory_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_productcategory_margin_value = sanitize_text_field(get_option('productsarchive-productcategory-margin-control','0px 0px 0px 0px'));
function productsarchive_productcategory_margin_fld(){
	global $productsarchive_productcategory_margin_value;
	echo '<input type="text" name="productsarchive-productcategory-margin-control" value="'.$productsarchive_productcategory_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_productcategory_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Categories hover style input
// Color
$productsarchive_productcategory_hover_color_value = sanitize_text_field(get_option('productsarchive-productcategory-hover-color-control')); // add a default color using comma
function productsarchive_productcategory_hover_color_fld(){
	global $productsarchive_productcategory_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-productcategory-hover-color-control" id="productsarchive-productcategory-hover-color-control" value="'.$productsarchive_productcategory_hover_color_value.'" >';
}
// BG Color
$productsarchive_productcategory_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-productcategory-hover-bgcolor-control'));
function productsarchive_productcategory_hover_bgcolor_fld(){
	global $productsarchive_productcategory_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-productcategory-hover-bgcolor-control" id="productsarchive-productcategory-hover-color-bgcontrol" value="'.$productsarchive_productcategory_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_productcategory_hover_size_value = sanitize_text_field(get_option('productsarchive-productcategory-hover-size-control','0px 0px 0px 0px'));
function productsarchive_productcategory_hover_size_fld(){
	global $productsarchive_productcategory_hover_size_value;
	echo '<input type="text" name="productsarchive-productcategory-hover-size-control" value="'.$productsarchive_productcategory_hover_size_value.'"  placeholder="0px">';
}
//------ Product Categories style input end

//------ Product Tags style input start
// Alignment
$productsarchive_producttags_align_value = sanitize_text_field( get_option('productsarchive-producttags-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_producttags_align_fld(){
	global $productsarchive_producttags_align_value;
	?>
	<select name="productsarchive-producttags-align" class="productsarchive-input" id="productsarchive-producttags-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_producttags_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_producttags_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_producttags_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_producttags_color_value = sanitize_text_field(get_option('productsarchive-producttags-color-control')); // add a default color using comma
function productsarchive_producttags_color_fld(){
	global $productsarchive_producttags_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttags-color-control" id="productsarchive-producttags-color-control" value="'.$productsarchive_producttags_color_value.'" >';
}
// BG Color
$productsarchive_producttags_bgcolor_value = sanitize_text_field(get_option('productsarchive-producttags-bgcolor-control'));
function productsarchive_producttags_bgcolor_fld(){
	global $productsarchive_producttags_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttags-bgcolor-control" id="productsarchive-producttags-color-bgcontrol" value="'.$productsarchive_producttags_bgcolor_value.'" >';
}
// Size
$productsarchive_producttags_size_value = sanitize_text_field(get_option('productsarchive-producttags-size-control','0px 0px 0px 0px'));
function productsarchive_producttags_size_fld(){
	global $productsarchive_producttags_size_value;
	echo '<input type="text" name="productsarchive-producttags-size-control" value="'.$productsarchive_producttags_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_producttags_padding_value = sanitize_text_field(get_option('productsarchive-producttags-padding-control','0px 0px 0px 0px'));
function productsarchive_producttags_padding_fld(){
	global $productsarchive_producttags_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-producttags-padding-control" value="'.$productsarchive_producttags_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_producttags_margin_value = sanitize_text_field(get_option('productsarchive-producttags-margin-control','0px 0px 0px 0px'));
function productsarchive_producttags_margin_fld(){
	global $productsarchive_producttags_margin_value;
	echo '<input type="text" name="productsarchive-producttags-margin-control" value="'.$productsarchive_producttags_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_producttags_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Tags hover style input
// Color
$productsarchive_producttags_hover_color_value = sanitize_text_field(get_option('productsarchive-producttags-hover-color-control')); // add a default color using comma
function productsarchive_producttags_hover_color_fld(){
	global $productsarchive_producttags_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttags-hover-color-control" id="productsarchive-producttags-hover-color-control" value="'.$productsarchive_producttags_hover_color_value.'" >';
}
// BG Color
$productsarchive_producttags_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-producttags-hover-bgcolor-control'));
function productsarchive_producttags_hover_bgcolor_fld(){
	global $productsarchive_producttags_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-producttags-hover-bgcolor-control" id="productsarchive-producttags-hover-color-bgcontrol" value="'.$productsarchive_producttags_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_producttags_hover_size_value = sanitize_text_field(get_option('productsarchive-producttags-hover-size-control','0px 0px 0px 0px'));
function productsarchive_producttags_hover_size_fld(){
	global $productsarchive_producttags_hover_size_value;
	echo '<input type="text" name="productsarchive-producttags-hover-size-control" value="'.$productsarchive_producttags_hover_size_value.'"  placeholder="0px">';
}
//------ Product Tags style input end

// -------------********************** Related Product Style start
//------ Featured img style inputs end
// Alignment
$productsarchive_relpro_fetuimg_align_value = sanitize_text_field( get_option('productsarchive-relpro-fetuimg-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_relpro_fetuimg_align_fld(){
	global $productsarchive_relpro_fetuimg_align_value;
	?>
	<select name="productsarchive-relpro-fetuimg-align" class="productsarchive-relpro-input" id="productsarchive-relpro-fetuimg-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_relpro_fetuimg_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_relpro_fetuimg_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Border Check
$productsarchive_relpro_fetuimg_border_check_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-border-control','false'));
function productsarchive_relpro_fetuimg_border_fld(){
	global $productsarchive_relpro_fetuimg_border_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-relpro-fetuimg-border-control" name="productsarchive-relpro-fetuimg-border-control" value="true" '.checked('true',$productsarchive_relpro_fetuimg_border_check_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;
}
// Border Typee
$productsarchive_relpro_fetuimg_brdrtype_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-brdrtype-control'));
function productsarchive_relpro_fetuimg_brdrtype_fld(){
	global $productsarchive_relpro_fetuimg_brdrtype_value;
	echo'<input type="text" class="color-field" name="productsarchive-relpro-fetuimg-brdrtype-control" id="productsarchive-relpro-fetuimg-brdrtype-control" value="'.$productsarchive_relpro_fetuimg_brdrtype_value.'" >';
}
// Border color
$productsarchive_relpro_fetuimg_border_clr_check_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-border-clr-control','false'));
function productsarchive_relpro_fetuimg_border_clr_fld(){
	global $productsarchive_relpro_fetuimg_border_clr_check_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-fetuimg-border-clr-control" id="productsarchive-relpro-fetuimg-border-clr-control" value="'.$productsarchive_relpro_fetuimg_border_clr_check_value.'" >';
}
// Border radius
$productsarchive_relpro_fetuimg_bdrrds_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-bdrrds-control','0px 0px 0px 0px'));
function productsarchive_relpro_fetuimg_bdrrds_fld(){
	global $productsarchive_relpro_fetuimg_bdrrds_value;
	echo '<input type="text" name="productsarchive-relpro-fetuimg-bdrrds-control" value="'.$productsarchive_relpro_fetuimg_bdrrds_value.'"  placeholder="0px">';
}
// padding
$productsarchive_relpro_fetuimg_padding_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-padding-control','0px 0px 0px 0px'));
function productsarchive_relpro_fetuimg_padding_fld(){
	global $productsarchive_relpro_fetuimg_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-relpro-fetuimg-padding-control" value="'.$productsarchive_relpro_fetuimg_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_relpro_fetuimg_margin_value = sanitize_text_field(get_option('productsarchive-relpro-fetuimg-margin-control','0px 0px 0px 0px'));
function productsarchive_relpro_fetuimg_margin_fld(){
	global $productsarchive_relpro_fetuimg_margin_value;
	echo '<input type="text" name="productsarchive-relpro-fetuimg-margin-control" value="'.$productsarchive_relpro_fetuimg_margin_value.'"  placeholder="Four values allowed">';
}
//------ Featured img style inputs end

//------ Product Title style input start
// Alignment
$productsarchive_relpro_producttitle_align_value = sanitize_text_field( get_option('productsarchive-relpro-producttitle-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_relpro_producttitle_align_fld(){
	global $productsarchive_relpro_producttitle_align_value;
	?>
	<select name="productsarchive-relpro-producttitle-align" class="productsarchive-relpro-input" id="productsarchive-relpro-producttitle-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_relpro_producttitle_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_relpro_producttitle_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_relpro_producttitle_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_relpro_producttitle_color_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-color-control')); // add a default color using comma
function productsarchive_relpro_producttitle_color_fld(){
	global $productsarchive_relpro_producttitle_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-producttitle-color-control" id="productsarchive-relpro-producttitle-color-control" value="'.$productsarchive_relpro_producttitle_color_value.'" >';
}
// BG Color
$productsarchive_relpro_producttitle_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-bgcolor-control'));
function productsarchive_relpro_producttitle_bgcolor_fld(){
	global $productsarchive_relpro_producttitle_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-producttitle-bgcolor-control" id="productsarchive-relpro-producttitle-color-bgcontrol" value="'.$productsarchive_relpro_producttitle_bgcolor_value.'" >';
}
// Size
$productsarchive_relpro_producttitle_size_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_producttitle_size_fld(){
	global $productsarchive_relpro_producttitle_size_value;
	echo '<input type="text" name="productsarchive-relpro-producttitle-size-control" value="'.$productsarchive_relpro_producttitle_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_relpro_producttitle_padding_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-padding-control','0px 0px 0px 0px'));
function productsarchive_relpro_producttitle_padding_fld(){
	global $productsarchive_relpro_producttitle_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-relpro-producttitle-padding-control" value="'.$productsarchive_relpro_producttitle_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_relpro_producttitle_margin_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-margin-control','0px 0px 0px 0px'));
function productsarchive_relpro_producttitle_margin_fld(){
	global $productsarchive_relpro_producttitle_margin_value;
	echo '<input type="text" name="productsarchive-relpro-producttitle-margin-control" value="'.$productsarchive_relpro_producttitle_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_relpro_producttitle_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-relpro-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-relpro-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Title hover style input
// Color
$productsarchive_relpro_producttitle_hover_color_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-hover-color-control')); // add a default color using comma
function productsarchive_relpro_producttitle_hover_color_fld(){
	global $productsarchive_relpro_producttitle_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-producttitle-hover-color-control" id="productsarchive-relpro-producttitle-hover-color-control" value="'.$productsarchive_relpro_producttitle_hover_color_value.'" >';
}
// BG Color
$productsarchive_relpro_producttitle_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-hover-bgcolor-control'));
function productsarchive_relpro_producttitle_hover_bgcolor_fld(){
	global $productsarchive_relpro_producttitle_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-producttitle-hover-bgcolor-control" id="productsarchive-relpro-producttitle-hover-color-bgcontrol" value="'.$productsarchive_relpro_producttitle_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_relpro_producttitle_hover_size_value = sanitize_text_field(get_option('productsarchive-relpro-producttitle-hover-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_producttitle_hover_size_fld(){
	global $productsarchive_relpro_producttitle_hover_size_value;
	echo '<input type="text" name="productsarchive-relpro-producttitle-hover-size-control" value="'.$productsarchive_relpro_producttitle_hover_size_value.'"  placeholder="0px">';
}
//------ Product Title style input end

//------ Product Reg Price style input start
// Alignment
$productsarchive_relpro_productregprice_align_value = sanitize_text_field( get_option('productsarchive-relpro-productregprice-align','woocommerce_before_shop_loop_item_title'));
function productsarchive_relpro_productregprice_align_fld(){
	global $productsarchive_relpro_productregprice_align_value;
	?>
	<select name="productsarchive-relpro-productregprice-align" class="productsarchive-relpro-input" id="productsarchive-relpro-productregprice-align">
		<?php $left = 'left'; ?>
		<option value="<?php echo $left ?>" <?php selected($productsarchive_relpro_productregprice_align_value,$left); ?>><?php _e('Left','woopage-master'); ?></option>
		<?php $center = 'center'; ?>
		<option value="<?php echo $center ?>" <?php selected($productsarchive_relpro_productregprice_align_value,$center); ?>><?php _e('Center','woopage-master'); ?></option>
		<?php $right = 'right'; ?>
		<option value="<?php echo $right ?>" <?php selected($productsarchive_relpro_productregprice_align_value,$right); ?>><?php _e('Right','woopage-master'); ?></option>
	</select>
	<?php
}
// Color
$productsarchive_relpro_productregprice_color_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-color-control')); // add a default color using comma
function productsarchive_relpro_productregprice_color_fld(){
	global $productsarchive_relpro_productregprice_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productregprice-color-control" id="productsarchive-relpro-productregprice-color-control" value="'.$productsarchive_relpro_productregprice_color_value.'" >';
}
// BG Color
$productsarchive_relpro_productregprice_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-bgcolor-control'));
function productsarchive_relpro_productregprice_bgcolor_fld(){
	global $productsarchive_relpro_productregprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productregprice-bgcolor-control" id="productsarchive-relpro-productregprice-color-bgcontrol" value="'.$productsarchive_relpro_productregprice_bgcolor_value.'" >';
}
// Size
$productsarchive_relpro_productregprice_size_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_productregprice_size_fld(){
	global $productsarchive_relpro_productregprice_size_value;
	echo '<input type="text" name="productsarchive-relpro-productregprice-size-control" value="'.$productsarchive_relpro_productregprice_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_relpro_productregprice_padding_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-padding-control','0px 0px 0px 0px'));
function productsarchive_relpro_productregprice_padding_fld(){
	global $productsarchive_relpro_productregprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-relpro-productregprice-padding-control" value="'.$productsarchive_relpro_productregprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_relpro_productregprice_margin_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-margin-control','0px 0px 0px 0px'));
function productsarchive_relpro_productregprice_margin_fld(){
	global $productsarchive_relpro_productregprice_margin_value;
	echo '<input type="text" name="productsarchive-relpro-productregprice-margin-control" value="'.$productsarchive_relpro_productregprice_margin_value.'"  placeholder="Four values allowed">';
}
// font familly
function productsarchive_relpro_productregprice_fontfamilly_cb()
{/**
    // Enqueue Select2 and Font Awesome
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
    ?>
    <div class="wrap">
			<select id="selected_font" name="productsarchive-relpro-fontfamilly" style="width: 200px;">
				<!-- Font families will be dynamically populated using JavaScript -->
			</select>
    </div>
    <script>
        (function ($) {
            $(document).ready(function () {
                const fontSelect = $('#selected_font');
                const fontPreview = $('#font_preview');

                // Associative array for custom font family names
                const customFonts = {
									'Arial, sans-serif': 'Custom Name for Arial',
									'Helvetica, sans-serif': 'Custom Name for Helvetica',
									'Georgia, serif': 'Custom Name for Georgia',
									'fantasy': 'Fantasy',
									'Tahoma, sans-serif': 'Custom Name for Tahoma',
									'Courier New, monospace': 'Custom Name for Courier New',
									'Palatino, serif': 'Custom Name for Palatino',
									'Garamond, serif': 'Custom Name for Garamond',
									'Century Gothic, sans-serif': 'Custom Name for Century Gothic',
									'Futura, sans-serif': 'Custom Name for Futura',
									'Roboto, sans-serif': 'Custom Name for Roboto',
									'Open Sans, sans-serif': 'Custom Name for Open Sans',
									'Lato, sans-serif': 'Custom Name for Lato',
									'Montserrat, sans-serif': 'Custom Name for Montserrat',
									'Raleway, sans-serif': 'Custom Name for Raleway',
									'Poppins, sans-serif': 'Custom Name for Poppins',
									'Nunito, sans-serif': 'Custom Name for Nunito',
									'Playfair Display, serif': 'Custom Name for Playfair Display',
									'Quicksand, sans-serif': 'Custom Name for Quicksand',
									// Add more custom font families here
								};


                // Function to populate the font family select control
                function populateFontSelect() {
                    // Array of font families
                    const fonts = Object.keys(customFonts);

                    if (fonts.length > 0) {
                        fonts.forEach((font) => {
                            const customName = customFonts[font];
                            const optionText = `<span style="font-family: ${font};">${customName}</span>`;
                            fontSelect.append($('<option>', {
                                value: font,
                                html: optionText
                            }));
                        });
                    }
                }

                // Call the function to populate the font family select control
                populateFontSelect();

                // Initialize Select2
                fontSelect.select2({
                    templateResult: formatFontOption
                });

                // Function to format the font family option in Select2
                function formatFontOption(font) {
                    if (!font.id) {
                        return font.text;
                    }
                    const $option = $('<span>').html(font.text).css('font-family', font.id);
                    return $option;
                }

                // Event listener for the font family select control
                fontSelect.on('change', function () {
                    const selectedFont = $(this).val();
                    fontPreview.css('font-family', selectedFont);
                });

                // Set the initial value of the font family select control from the saved option
                const savedFont = '<?php echo esc_attr(get_option("productsarchive-relpro-fontfamilly", "Arial, sans-serif")); ?>';
                fontSelect.val(savedFont).trigger('change');
            });
        })(jQuery);
    </script>
<?php */
}
// Product Title hover style input
// Color
$productsarchive_relpro_productregprice_hover_color_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-hover-color-control')); // add a default color using comma
function productsarchive_relpro_productregprice_hover_color_fld(){
	global $productsarchive_relpro_productregprice_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productregprice-hover-color-control" id="productsarchive-relpro-productregprice-hover-color-control" value="'.$productsarchive_relpro_productregprice_hover_color_value.'" >';
}
// BG Color
$productsarchive_relpro_productregprice_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-hover-bgcolor-control'));
function productsarchive_relpro_productregprice_hover_bgcolor_fld(){
	global $productsarchive_relpro_productregprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productregprice-hover-bgcolor-control" id="productsarchive-relpro-productregprice-hover-color-bgcontrol" value="'.$productsarchive_relpro_productregprice_hover_bgcolor_value.'" >';
}
// Size
$productsarchive_relpro_productregprice_hover_size_value = sanitize_text_field(get_option('productsarchive-relpro-productregprice-hover-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_productregprice_hover_size_fld(){
	global $productsarchive_relpro_productregprice_hover_size_value;
	echo '<input type="text" name="productsarchive-relpro-productregprice-hover-size-control" value="'.$productsarchive_relpro_productregprice_hover_size_value.'"  placeholder="0px">';
}
//------ Product Reg Price style input end

//------ Related Product Sale Price style input start
// Color
$productsarchive_relpro_productsaleprice_color_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-color-control')); // add a default color using comma
function productsarchive_relpro_productsaleprice_color_fld(){
	global $productsarchive_relpro_productsaleprice_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productsaleprice-color-control" id="productsarchive-relpro-productsaleprice-color-control" value="'.$productsarchive_relpro_productsaleprice_color_value.'" >';
}
// BG Color
$productsarchive_relpro_productsaleprice_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-bgcolor-control'));
function productsarchive_relpro_productsaleprice_bgcolor_fld(){
	global $productsarchive_relpro_productsaleprice_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productsaleprice-bgcolor-control" id="productsarchive-relpro-productsaleprice-color-bgcontrol" value="'.$productsarchive_relpro_productsaleprice_bgcolor_value.'" >';
}
// Size
$productsarchive_relpro_productsaleprice_size_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_productsaleprice_size_fld(){
	global $productsarchive_relpro_productsaleprice_size_value;
	echo '<input type="text" name="productsarchive-relpro-productsaleprice-size-control" value="'.$productsarchive_relpro_productsaleprice_size_value.'"  placeholder="0px">';
}
// padding
$productsarchive_relpro_productsaleprice_padding_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-padding-control','0px 0px 0px 0px'));
function productsarchive_relpro_productsaleprice_padding_fld(){
	global $productsarchive_relpro_productsaleprice_padding_value;
	echo '<div class="info-container">
		<input type="text" name="productsarchive-relpro-productsaleprice-padding-control" value="'.$productsarchive_relpro_productsaleprice_padding_value.'" placeholder="Four values allowed">
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_relpro_productsaleprice_margin_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-margin-control','0px 0px 0px 0px'));
function productsarchive_relpro_productsaleprice_margin_fld(){
	global $productsarchive_relpro_productsaleprice_margin_value;
	echo '<input type="text" name="productsarchive-relpro-productsaleprice-margin-control" value="'.$productsarchive_relpro_productsaleprice_margin_value.'"  placeholder="Four values allowed">';
}
// Related Product sale price hover style input
// Color
$productsarchive_relpro_productsaleprice_hover_color_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-hover-color-control')); // add a default color using comma
function productsarchive_relpro_productsaleprice_hover_color_fld(){
	global $productsarchive_relpro_productsaleprice_hover_color_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productsaleprice-hover-color-control" id="productsarchive-relpro-productsaleprice-hover-color-control" value="'.$productsarchive_relpro_productsaleprice_hover_color_value.'" >';
}
// BG Color
$productsarchive_relpro_productsaleprice_hover_bgcolor_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-hover-bgcolor-control'));
function productsarchive_relpro_productsaleprice_hover_bgcolor_fld(){
	global $productsarchive_relpro_productsaleprice_hover_bgcolor_value;
	echo'<input type="color" class="color-field" name="productsarchive-relpro-productsaleprice-hover-bgcolor-control" id="productsarchive-relpro-productsaleprice-hover-color-bgcontrol" value="'.$productsarchive_relpro_productsaleprice_hover_bgcolor_value.'" >';
}
// Size
// $productsarchive_relpro_productsaleprice_hover_size_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-hover-size-control','0px 0px 0px 0px'));
// function productsarchive_relpro_productsaleprice_hover_size_fld(){
// 	global $productsarchive_relpro_productsaleprice_hover_size_value;
// 	echo '<input type="text" name="productsarchive-relpro-productsaleprice-hover-size-control" value="'.$productsarchive_relpro_productsaleprice_hover_size_value.'"  placeholder="0px">';
// }

// Try noUiSlider strat
function productsarchive_relpro_productsaleprice_hover_size_fld(){
  $default_value = 10; // Set your desired default value here.
  $slider_value = get_option('productsarchive-relpro-productsaleprice-hover-size-control', $default_value); // Get the saved value or use the default if not set.
  ?>
  <div class="noUi_Slider" id="productsarchive-relpro-productsaleprice-hover-size-control"></div>
  <input type="hidden" name="productsarchive-relpro-productsaleprice-hover-size-control" id="productsarchive-nouislider-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="productsarchive-nouislider-tooltips"></div>
  <script>
    // Initialize the noUiSlider
    document.addEventListener('DOMContentLoaded', function() {
      var slider = document.getElementById('productsarchive-relpro-productsaleprice-hover-size-control');
      var sliderValue = document.getElementById('productsarchive-nouislider-value');
      var sliderTooltips = document.getElementById('productsarchive-nouislider-tooltips');

      noUiSlider.create(slider, {
        start: [parseInt(sliderValue.value)], // Use the saved value or default value.
        step: 1,
        range: {
          'min': 0,
          'max': 100,
        },
        tooltips: true,
        format: {
          to: function(value) {
            return parseInt(value);
          },
          from: function(value) {
            return parseInt(value);
          }
        }
      });

      // Update the hidden input value and tooltip on slider change
      slider.noUiSlider.on('update', function(values, handle) {
        sliderValue.value = values[handle];
        sliderTooltips.innerText = parseInt(values[handle]);
      });
    });

    // Reset the slider to its initial value
    function resetSlider() {
      var slider = document.getElementById('productsarchive-relpro-productsaleprice-hover-size-control');
      var sliderValue = document.getElementById('productsarchive-nouislider-value');

      slider.noUiSlider.set(<?php echo esc_js($default_value); ?>); // Use the default value here.
      sliderValue.value = <?php echo esc_js($default_value); ?>;
      document.getElementById('productsarchive-nouislider-tooltips').innerText = <?php echo esc_js($default_value); ?>;
    }
  </script>
  <?php
}
// Try noUiSlider end

// function enqueue_nouislider_scripts() {
//   wp_enqueue_style('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css');
//   wp_enqueue_script('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js', array('jquery'), '15.5.0', true);
// }
// add_action('admin_enqueue_scripts', 'enqueue_nouislider_scripts');


// // Display the slider input field in the WordPress admin settings page
// $productsarchive_relpro_productsaleprice_hover_size_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-hover-size-control', '0px 0px 0px 0px'));
// function productsarchive_relpro_productsaleprice_hover_size_fld() {
// 	global $productsarchive_relpro_productsaleprice_hover_size_value;
//   echo '<input type="text" id="productsarchive-relpro-productsaleprice-hover-size" name="productsarchive-relpro-productsaleprice-hover-size-control" value="'.$productsarchive_relpro_productsaleprice_hover_size_value.'"  placeholder="0px">';
//   echo '<div id="slider"></div>';
// }

//------ Related Product Sale Price style input end

// -------------********************** Related Product Style end
//***************---****** Style inputs end (Tab)
#################---####### Settings field end
// Style end

//Lightbox Section callback
function productsarchive_lb_cb(){
	echo '</div>';
}


?>