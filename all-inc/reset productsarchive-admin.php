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
	wp_enqueue_script('productsarchive-admin-reset_scripts', plugins_url('/admin-assets/js/reset_scripts.js',__FILE__), array('jquery'), '1.0', true);
}
add_action('admin_enqueue_scripts','productsarchive_admin_enqueue');

//Settings page
function productsarchive_menu_settings(){
	add_menu_page( 'Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-analytics', 57 );
	add_action('admin_init','productsarchive_settings');
}
add_action('admin_menu','productsarchive_menu_settings');

//Settings callback function
function productsarchive_settings_cb() {
	// The save button for bottom save
	settings_errors(); ?>
	<div class="productsarchive-main-settings">
		<form method="POST" action="options.php" class="productsarchive-form">
			<?php settings_fields('productsarchive-group'); ?>
			<?php do_settings_sections('productsarchive_single'); ?>
			<?php
				echo '</div><div class="productsarchive-save-btn">';
				submit_button();
				echo '</div><input type="button" onclick="resetFields()" value="Reset" id="resetButton">';
			?>
		</form>
	</div>
	<script>
		function resetFields() {
			document.getElementById('productsarchive-lb-en-gallery').checked = false;
			document.getElementById('productsarchive-button-position').selectedIndex = 0;
			document.getElementById('productsarchive-button-fsize').value = '14';
			document.getElementById('productsarchive-button-color').value = '#ffffff';
		}
	</script>
<?php
}

// All custom settings and register all custom controls
function productsarchive_settings() {
	// Single product page check
	register_setting(
		'productsarchive-group',
		'productsarchive-lb-en-gallery'
	);

	register_setting(
		'productsarchive-group',
		'productsarchive-button-position'
	);

	register_setting(
		'productsarchive-group',
		'productsarchive-button-fsize'
	);

	register_setting(
		'productsarchive-group',
		'productsarchive-button-color'
	);

	// Settings start
	// Presets style Settings start
	add_settings_field(
		'productsarchive-lb-en-gallery',
		__('Use our style?', 'woopage-master'),
		'productsarchive_lb_en_gallery_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);

	add_settings_field(
		'productsarchive-button-position',
		__('Choose Preset', 'woopage-master'),
		'productsarchive_button_position_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);

	add_settings_field(
		'productsarchive-button-fsize',
		__('Font Size', 'woopage-master'),
		'productsarchive_button_fsize_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);
	
	add_settings_field(
		'productsarchive-button-color',
		__('Button Color', 'woopage-master'),
		'productsarchive_button_color_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);

	add_settings_section(
		'productsarchive-settings-sk',
		'',
		'productsarchive_settings_sk',
		'productsarchive_single'
	);
}

function productsarchive_settings_sk() {
	$tab = '<div id="tab1Content">';
	echo $tab.'<h2 class="productsarchive_buttn_setting">'.__('Archive Settings', 'woopage-master').'</h2>';
}

// Enable single product page
$productsarchive_lb_en_gallery_value = sanitize_text_field(get_option('productsarchive-lb-en-gallery', 'true'));

function productsarchive_lb_en_gallery_cb() {
	global $productsarchive_lb_en_gallery_value;
	$html = '<input type="checkbox" id="productsarchive-lb-en-gallery" name="productsarchive-lb-en-gallery" value="true" '.checked('true', $productsarchive_lb_en_gallery_value, false).'>';
	echo $html;
}

$productsarchive_button_position_value = sanitize_text_field(get_option('productsarchive-button-position', 'woocommerce_before_shop_loop_item_title'));

function productsarchive_button_position_cb() {
	global $productsarchive_button_position_value;
	?>
	<select name="productsarchive-button-position" class="productsarchive-input" id="productsarchive-button-position">
		<?php $default = 'default'; ?>
		<option value="<?php echo $default ?>" <?php selected($productsarchive_button_position_value, $default); ?>><?php _e('Default', 'woopage-master'); ?></option>
		<?php $style2 = 'style2'; ?>
		<option value="<?php echo $style2 ?>" <?php selected($productsarchive_button_position_value, $style2); ?>><?php _e('Style 2', 'woopage-master'); ?></option>
		<?php $style3 = 'style3'; ?>
		<option value="<?php echo $style3 ?>" <?php selected($productsarchive_button_position_value, $style3); ?>><?php _e('Style 3', 'woopage-master'); ?></option>
		<?php $style4 = 'style4'; ?>
		<option value="<?php echo $style4 ?>" <?php selected($productsarchive_button_position_value, $style4); ?>><?php _e('Style 4', 'woopage-master'); ?></option>
		<?php $style5 = 'style5'; ?>
		<option value="<?php echo $style5 ?>" <?php selected($productsarchive_button_position_value, $style5); ?>><?php _e('Style 5', 'woopage-master'); ?></option>
	</select>
	<?php
}

$productsarchive_button_fsize_value = sanitize_text_field(get_option('productsarchive-button-fsize', 14));

function productsarchive_button_fsize_cb() {
	global $productsarchive_button_fsize_value;
	$html = '<input type="number" class="productsarchive-input" name="productsarchive-button-fsize" id="productsarchive-button-fsize" value="'.$productsarchive_button_fsize_value.'">';
	echo $html.'</br>';
	echo __('Button size (Text and Icon Size). Eg:- 13, 15, 20 Number', 'woopage-master');
}

$productsarchive_button_color_value = sanitize_text_field(get_option('productsarchive-button-color', 'white'));

function productsarchive_button_color_cb() {
	global $productsarchive_button_color_value;
	$html = '<input type="color" class="color-field" name="productsarchive-button-color" id="productsarchive-button-color" value="'.$productsarchive_button_color_value.'" >';
	echo $html.'</br>';
	echo __('Select your color here.', 'woopage-master');
}



?>