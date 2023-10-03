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
	add_menu_page( 'Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-analytics', 57 );
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
	#################---#######111 Save or register settings start
	//***************---****** Settings start  (Tab)
	//------ General Settings Controls start
	register_setting( // Check Sale
		'productsarchive-group',
		'productsarchive-breadcrumb-check-gallery'
	);
	register_setting( // Check Sale
		'productsarchive-group',
		'productsarchive-sale-check-gallery'
	);
	register_setting( // Check featured
		'productsarchive-group',
		'productsarchive-featured-img-check-gallery'
	);
	register_setting( // Check gallery
		'productsarchive-group',
		'productsarchive-gallery-img-check-gallery'
	);
	register_setting( // Check Title
		'productsarchive-group',
		'productsarchive-title-check-gallery'
	);
	register_setting( // Check reg price
		'productsarchive-group',
		'productsarchive-reg-price-check-gallery'
	);
	register_setting( // Check sale price
		'productsarchive-group',
		'productsarchive-sale-price-check-gallery'
	);
	register_setting( // Check short description
		'productsarchive-group',
		'productsarchive-short-description-check-gallery'
	);
	register_setting( // Check categories
		'productsarchive-group',
		'productsarchive-categories-check-gallery'
	);
	register_setting( // Check tags
		'productsarchive-group',
		'productsarchive-tags-check-gallery'
	);
	register_setting( // Check quantity
		'productsarchive-group',
		'productsarchive-quantity-check-gallery'
	);
	register_setting( // Check add to cart
		'productsarchive-group',
		'productsarchive-addtocart-check-gallery'
	);
	register_setting( // Check description
		'productsarchive-group',
		'productsarchive-description-check-gallery'
	);

	// Related Products General Settings Controls start
	register_setting( // Check related products
		'productsarchive-group',
		'productsarchive-related-products-check-gallery'
	);
	register_setting( // related products top title
		'productsarchive-group',
		'productsarchive-relpro-toptile-check-gallery'
	);
	register_setting( // related products image
		'productsarchive-group',
		'productsarchive-relpro-prodimg-check-gallery'
	);
	register_setting( // related products img link
		'productsarchive-group',
		'productsarchive-relpro-imglnk-check-gallery'
	);
	register_setting( // related products title
		'productsarchive-group',
		'productsarchive-relpro-prodtitle-check-gallery'
	);
	register_setting( // related products title link
		'productsarchive-group',
		'productsarchive-relpro-titlelnk-check-gallery'
	);
	register_setting( // related products price
		'productsarchive-group',
		'productsarchive-relpro-prodpric-check-gallery'
	);
	register_setting( // related products button
		'productsarchive-group',
		'productsarchive-relpro-button-check-gallery'
	);
	// Related Products General Settings Controls end
	//------ General Settings Controls end

	//------ Archive Settings start
	register_setting( // Use our style?
		'productsarchive-group',
		'productsarchive-lb-en-gallery'
	);
	register_setting( // Choose Preset
		'productsarchive-group',
		'productsarchive-button-position'
	);
	//------ Archive Settings end
	//***************---****** Settings end  (Tab)

	//***************---****** Save Style start  (Tab)
	//------ General style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-button-fsize'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bgc'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-hover-bgc'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-button-color'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-ps'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-margin'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-btype'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bs'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bors'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bc'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-iconc'
	);
	//------ General style save end

	//------ Breadcrumb style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-breadalign'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-text-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-text-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-icon-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fontfamilly'
	);
	//------ Breadcrumb style save end
	//***************---****** Save Style end  (Tab)
	#################---#######111 Save or register settings end

	#################---#######222 Section settings start
	add_settings_section(
		'productsarchive-header-section-sk',
		'',
		'productsarchive_header_section',
		'productsarchive_single'
	);
	add_settings_section(
		'productsarchive-tab-section-sk',
		'',
		'productsarchive_tab_section',
		'productsarchive_single'
	);
	//***************---****** All Settings Tab Sections Start
	add_settings_section( //------ Archive Settings Section  (Tab)
		'productsarchive-settings-sk',
		'',
		'productsarchive_settings_sk',
		'productsarchive_single'
	);
	add_settings_section( //------ General Settings Section  (Tab)
		'productsarchive-general-settings-sk',
		'',
		'productsarchive_general_settings_sk',
		'productsarchive_single'
	);
	add_settings_section( //------ General Settings Section [For Related producs] (Tab)
		'productsarchive-general-relpro-settings-sk',
		'',
		'productsarchive_general_relpro_settings_sk',
		'productsarchive_single'
	);
	//***************---****** All Settings Tab Sections end

	//***************---****** All Style Section (Tab) Start
	add_settings_section( //------ general style
		'productsarchive-general-style',
		'',
		'productsarchive_general_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ breadcrumb style
		'productsarchive-breadcrumb-style',
		'',
		'productsarchive_breadcrumb_style_cb',
		'productsarchive_single'
	);
	//***************---****** All Style Section (Tab) end
	add_settings_section(
		'productsarchive-view-wrapper-style',
		'',
		'productsarchive_view_wrapper',
		'productsarchive_single'
	);
	add_settings_section(
		'productsarchive-lb',
		'',
		'productsarchive_lb_cb',
		'productsarchive_single'
	);
	#################---#######222 Section settings end

	#################---#######333 Settings field start
	//***************---****** Settings inputs start (Tab)
	//------ Archive Settings start
	add_settings_field( // Use our style?
		'productsarchive-lb-en-gallery',
		__('Use our style?','woopage-master'),
		'productsarchive_lb_en_gallery_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);
	add_settings_field( // Choose Preset
		'productsarchive-button-position',
		__('Choose Preset','woopage-master'),
		'productsarchive_button_position_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);
	//------ Archive Settings start

	//------ General Settings Controls start
	add_settings_field( // Check breadcrumb
		'productsarchive-breadcrumb-check-gallery',
		__('Breadcrumb?','woopage-master'),
		'productsarchive_breadcrumb_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Sale
		'productsarchive-sale-check-gallery',
		__('Check Sale','woopage-master'),
		'productsarchive_sale_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check featured
		'productsarchive-featured-img-check-gallery',
		__('Featured?','woopage-master'),
		'productsarchive_featured_img_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check gallery
		'productsarchive-gallery-img-check-gallery',
		__('Gallery?','woopage-master'),
		'productsarchive_gallery_img_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Title
		'productsarchive-title-check-gallery',
		__('Check Title','woopage-master'),
		'productsarchive_title_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Reqular Price
		'productsarchive-reg-price-check-gallery',
		__('Reqular Price','woopage-master'),
		'productsarchive_reg_price_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Sale Price
		'productsarchive-sale-price-check-gallery',
		__('Sale Price','woopage-master'),
		'productsarchive_sale_price_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Short Description?
		'productsarchive-short-description-check-gallery',
		__('Short Description?','woopage-master'),
		'productsarchive_short_description_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Categories
		'productsarchive-categories-check-gallery',
		__('Categories?','woopage-master'),
		'productsarchive_categories_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Tags
		'productsarchive-tags-check-gallery',
		__('Tags?','woopage-master'),
		'productsarchive_tags_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check quantity
		'productsarchive-quantity-check-gallery',
		__('Quantity Count','woopage-master'),
		'productsarchive_quantity_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check add to cart
		'productsarchive-addtocart-check-gallery',
		__('Add To Cart?','woopage-master'),
		'productsarchive_addtocart_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check description
		'productsarchive-description-check-gallery',
		__('Description?','woopage-master'),
		'productsarchive_description_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	// Related Products General Settings Controls start
	add_settings_field( // Check related products
		'productsarchive-related-products-check-gallery',
		__('Related Products','woopage-master'),
		'productsarchive_related_products_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Top Title
		'productsarchive-relpro-toptile-check-gallery',
		__('Top Title','woopage-master'),
		'productsarchive_relpro_toptile_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);

	add_settings_field( // Related Products Image
		'productsarchive-relpro-prodimg-check-gallery',
		__('Product Image','woopage-master'),
		'productsarchive_relpro_prodimg_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Image link
		'productsarchive-relpro-imglnk-check-gallery',
		__('Image Link','woopage-master'),
		'productsarchive_relpro_imglnk_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Title
		'productsarchive-relpro-prodtitle-check-gallery',
		__('Product Title','woopage-master'),
		'productsarchive_relpro_prodtitle_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Title link
		'productsarchive-relpro-titlelnk-check-gallery',
		__('Title Link','woopage-master'),
		'productsarchive_relpro_titlelnk_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products price
		'productsarchive-relpro-prodpric-check-gallery',
		__('Product Price','woopage-master'),
		'productsarchive_relpro_prodpric_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products button
		'productsarchive-relpro-button-check-gallery',
		__('Button','woopage-master'),
		'productsarchive_relpro_button_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	// Related Products General Settings Controls end
	//------ General Settings Controls end
	//***************---****** Settings inputs end (Tab)

	//***************---****** Style inputs start (Tab)
	//------ General style controls start
	add_settings_field(
		'productsarchive-button-fsize',
		__('Font Size','woopage-master'),
		'productsarchive_button_fsize_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bgc',
		__('Title Color','woopage-master'),
		'productsarchive_btn_bgc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-hover-bgc',
		__('Hover Title Color','woopage-master'),
		'productsarchive_btn_hover_bgc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-button-color',
		__('Text Color','woopage-master'),
		'productsarchive_button_color_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-ps',
		__('Title Padding','woopage-master'),
		'productsarchive_btn_ps_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-margin',
		__('Title Margin','woopage-master'),
		'productsarchive_btn_margin_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-btype',
		__('Border Style','woopage-master'),
		'productsarchive_btn_btype_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bs',
		__('Border Size','woopage-master'),
		'productsarchive_btn_bs_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bors',
		__('Border Radius','woopage-master'),
		'productsarchive_btn_bors',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bc',
		__('Border Color','woopage-master'),
		'productsarchive_btn_bc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-iconc',
		__('Icon Color','woopage-master'),
		'productsarchive_btn_iconc_cb',
		'productsarchive_single',
		'productsarchive-general-style'
	);
	//------ General style controls end

	//------ Breadcrumb style controls start
	add_settings_field(
		'productsarchive-breadalign',
		__('Alignment','woopage-master'),
		'productsarchive_breadalign_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-text-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_text_color_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-text-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_text_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-size-control',
		__('Size','woopage-master'),
		'productsarchive_breadcrumb_size_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_breadcrumb_padding_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_breadcrumb_margin_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-icon-control',
		__('Icon','woopage-master'),
		'productsarchive_breadcrumb_icon_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	//------ Breadcrumb style controls end
	//***************---****** Style inputs end (Tab)
	#################---#######333 Settings field end
}

/* Here custom settings functions registered  */

// This is admin header
function productsarchive_header_section(){
	?>
	<div class="productsarchive_the_class">
		<div class="productsarchive_data productsarchive_name"><a class="productsarchive_au_title" href="https://bestwpdeveloper.com" target="_blank"><h2 class="productsarchive_dashtitle"><?php _e('BEST WP DEVELOPER', 'woopage-master'); ?></h2></a></div>
		<div class="productsarchive_data productsarchive_demo">
			<div class="productsarchive_the_author"><a class="productsarchive_the_demo" href="https://bestwpdeveloper.com/products-archive/" target="_blank"><?php _e('Go Demo', 'woopage-master'); ?></a></div>
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
			<div id="tab1" onClick="JavaScript:selectTab(1);" class="productsarchive_active"><?php _e('Settings', 'woopage-master'); ?></div>
			<div id="tab2" onClick="JavaScript:selectTab(2);"><?php _e('Styles', 'woopage-master'); ?></div>
		</div>
		<div class="productsarchive_save_btn"><?php submit_button(); ?></div>
		<div class="productsarchive_save_btn"><input type="button" class="productsarchive_settings_reset" onclick="checkReset();" value="Reset All" id="resetButton"></div>
	</div>
	<?php
}
#################---####### Settings start
//***************---****** Archive Sections start
function productsarchive_settings_sk(){ //------ Section  (Tab)
	$tab = '<div id="tab1Content">';
	echo $tab.'<div class="productsarchive_buttn_setting">'.__('Archive Settings','woopage-master').'</div>';
}
function productsarchive_general_settings_sk(){  //------ Section  (Tab)
	echo '<div class="productsarchive_buttn_setting">'.__('General Settings','woopage-master').'</div>';
}
function productsarchive_general_relpro_settings_sk(){  //------ Section  (Tab)
	echo '<div class="productsarchive_relpro_setting"><b>'.__('Related Products','woopage-master').'</b></div>';
}
//***************---****** Archive Sections end

//***************---****** Archive Settings start
//Enable single product page
$productsarchive_lb_en_gallery_value = sanitize_text_field(get_option('productsarchive-lb-en-gallery','true'));
function productsarchive_lb_en_gallery_cb(){
	global $productsarchive_lb_en_gallery_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-lb-en-gallery" name="productsarchive-lb-en-gallery" value="true" '.checked('true',$productsarchive_lb_en_gallery_value,false).'><span class="toggle-slider"></span></label>';
	echo $html;

}
// Product single page styles
$productsarchive_button_position_value = sanitize_text_field( get_option('productsarchive-button-position','woocommerce_before_shop_loop_item_title'));
function productsarchive_button_position_cb(){
	global $productsarchive_button_position_value;
	?>
	<select name="productsarchive-button-position" class="productsarchive-input" id="productsarchive-button-position">
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
$productsarchive_breadcrumb_check_value = sanitize_text_field(get_option('productsarchive-breadcrumb-check-gallery','false'));
function productsarchive_breadcrumb_check_cb(){
	global $productsarchive_breadcrumb_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-breadcrumb-check-gallery" name="productsarchive-breadcrumb-check-gallery" value="true" '.checked('true',$productsarchive_breadcrumb_check_value,false).'><span class="toggle-slider"></span></label>';
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
// sale price check
$productsarchive_sale_price_check_value = sanitize_text_field(get_option('productsarchive-sale-price-check-gallery','true'));
function productsarchive_sale_price_check_cb(){
	global $productsarchive_sale_price_check_value;
	$html  = '<label class="toggle-switch"><input type="checkbox" id="productsarchive-sale-price-check-gallery" name="productsarchive-sale-price-check-gallery" value="true" '.checked('true',$productsarchive_sale_price_check_value,false).'><span class="toggle-slider"></span></label>';
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
// Related Products General Settings Controls end
//***************---****** General Settings Controls end
#################---####### Settings end

#################---####### Settings field end
//***************---****** Style control section title start
function productsarchive_general_style_cb(){
	$tab = '</div><div id="tab2Content">';
	echo $tab.'<div class="productsarchive_buttn_setting" id="general">'.__('General Style Settings','woopage-master').'</div>';
	echo '<div>
		<a href="#general">'.__('General').'</a>
		<a href="#breadcrumb">'.__('Breadcrumb').'</a>
	</div>';
}
function productsarchive_breadcrumb_style_cb(){
	echo '<div class="productsarchive_buttn_setting" id="breadcrumb">'.__('Breadcrumb Style','woopage-master').'</div>';
}
//***************---****** Style control section title end

//***************---****** Style inputs start (Tab)
//Font size
$productsarchive_button_fsize_value = sanitize_text_field(get_option('productsarchive-button-fsize',14));
function productsarchive_button_fsize_cb(){
	global $productsarchive_button_fsize_value;
	echo  '<input type="number" class="productsarchive-input" name="productsarchive-button-fsize" id="productsarchive-button-fsize" value="'.$productsarchive_button_fsize_value.'">';
}

//Button Title Color
$productsarchive_btn_bgc_value = sanitize_text_field(get_option('productsarchive-btn-bgc','#8f8f8f'));
function productsarchive_btn_bgc_cb(){
	global $productsarchive_btn_bgc_value;
	echo '<input type="color" class="color-field" name="productsarchive-btn-bgc" id="productsarchive-btn-bgc" value="'.$productsarchive_btn_bgc_value.'" >';
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
	echo '<input type="number" name="productsarchive-btn-bs" value="'.$productsarchive_btn_bs_value.'">';
}

// Border radius
$productsarchive_btn_bors_value = sanitize_text_field(get_option('productsarchive-btn-bors','4'));
function productsarchive_btn_bors(){
	global $productsarchive_btn_bors_value;
	echo '<input type="number" name="productsarchive-btn-bors" value="'.$productsarchive_btn_bors_value.'" >';
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
	echo '<input type="number" name="productsarchive-breadcrumb-size-control" value="'.$productsarchive_breadcrumb_size_value.'"  placeholder="0px"> px';
}
// padding
$productsarchive_breadcrumb_padding_value = sanitize_text_field(get_option('productsarchive-breadcrumb-padding-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_padding_fld(){
	global $productsarchive_breadcrumb_padding_value;
	echo '<div class="info-container">
		<input type="number" name="productsarchive-breadcrumb-padding-control" value="'.$productsarchive_breadcrumb_padding_value.'" placeholder="Four values allowed"> px
		<span class="info-icon">?</span>
		<div class="info-tooltip">Padding here like 0px 0px 0px 0px !</div>
	</div>';
}
// margin
$productsarchive_breadcrumb_margin_value = sanitize_text_field(get_option('productsarchive-breadcrumb-margin-control','0px 0px 0px 0px'));
function productsarchive_breadcrumb_margin_fld(){
	global $productsarchive_breadcrumb_margin_value;
	echo '<input type="number" name="productsarchive-breadcrumb-margin-control" value="'.$productsarchive_breadcrumb_margin_value.'"  placeholder="Four values allowed"> px';
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
    </>
<?php
}
//------ Breadcrumb style input end
//***************---****** Style inputs end (Tab)
#################---####### Settings field end
// Style end
// View wrapper Style
function productsarchive_view_wrapper(){
	$tab = '</div><div id="tab4Content">';  //Begin Basic settings
	echo $tab.'<div class="productsarchive_buttn_setting">'.__('View wrapper Style','woopage-master').'</div>';
}

//Lightbox Section callback
function productsarchive_lb_cb(){
	echo '</div><div id="tab3Content">';
	echo '<div class="productsarchive_buttn_setting">'.__('Image Settings','woopage-master').'</div>';
}


?>