<?php
/**
 * Plugin Name: Products Archive 2
 * Description: Products Archive plugin is a product single page for enabling customers to have a quick look at the product without visiting the product page.
 * Plugin URI: https://bestwpdeveloper.com/shop/
 * Version: 1.0
 * Author: Best WP Developer
 * Author URI: https://bestwpdeveloper.com/
 * Text Domain: products-archive2
 */

//Exit if accessed directly
if(!defined('ABSPATH')){
    return;
}

// Enqueue Scripts & Stylesheet
function productsarchive_admin_enqueue(){
    wp_enqueue_style('productsarchive-admin-css', plugins_url('/admin-assets/css/style.css',__FILE__), null, '1.0', 'all');
    wp_enqueue_style('productsarchive-admin-tab-css', plugins_url('/admin-assets/css/tab.css',__FILE__), null, '1.0', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet
    wp_enqueue_script('productsarchive-admin-js', plugins_url('/admin-assets/js/script.js',__FILE__), array('jquery'), '1.0', true);
    wp_enqueue_script('productsarchive-icon-select', plugins_url('/admin-assets/js/icon-select.js',__FILE__), array('jquery'), '1.0', true); // Include icon-select.js
}
add_action('admin_enqueue_scripts','productsarchive_admin_enqueue');

//Settings page
function productsarchive_menu_settings(){
    add_menu_page( 'Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-visibility', 57 );
    add_action('admin_init','productsarchive_settings');
}
add_action('admin_menu','productsarchive_menu_settings');

function productsarchive_settings_cb() {
    // The save button for bottom save
    settings_errors(); ?>
    <div class="productsarchive-main-settings">
        <form method="POST" action="options.php" class="productsarchive-form">
            <?php settings_fields('productsarchive-group'); ?>
            <?php do_settings_sections('productsarchive_quickview'); ?>
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
            document.getElementById('productsarchive-button-position').value = 'default';
            document.getElementById('productsarchive-button-fsize').value = '14';
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
        'productsarchive-fontfamilly' // Changed the name to match the font family field
    );

    // Settings start
    // Presets style Settings start
    add_settings_field(
        'productsarchive-lb-en-gallery',
        __('Use our style?', 'global-quick-view'),
        'productsarchive_lb_en_gallery_cb',
        'productsarchive_quickview',
        'productsarchive-settings-sk'
    );

    add_settings_field(
        'productsarchive-button-position',
        __('Choose Preset', 'global-quick-view'),
        'productsarchive_button_position_cb',
        'productsarchive_quickview',
        'productsarchive-settings-sk'
    );

    add_settings_field(
        'productsarchive-button-fsize',
        __('Font Size', 'global-quick-view'),
        'productsarchive_button_fsize_cb',
        'productsarchive_quickview',
        'productsarchive-settings-sk'
    );
    add_settings_field(
        'productsarchive-fontfamilly',
        __('Font Family', 'global-quick-view'),
        'productsarchive_fontfamilly_cb',
        'productsarchive_quickview',
        'productsarchive-settings-sk'
    );

    add_settings_section(
        'productsarchive-settings-sk',
        '',
        'productsarchive_settings_sk',
        'productsarchive_quickview'
    );
}

function productsarchive_settings_sk() {
    $tab = '<div id="tab1Content">';
    echo $tab.'<h2 class="productsarchive_buttn_setting">'.__('Archive Settings', 'global-quick-view').'</h2>';
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
    <select name="productsarchive-button-position" class="productsarchive-input">
        <?php $default = 'default'; ?>
        <option value="<?php echo $default ?>" <?php selected($productsarchive_button_position_value, $default); ?>><?php _e('Default', 'global-quick-view'); ?></option>
        <?php $style2 = 'style2'; ?>
        <option value="<?php echo $style2 ?>" <?php selected($productsarchive_button_position_value, $style2); ?>><?php _e('Style 2', 'global-quick-view'); ?></option>
        <?php $style3 = 'style3'; ?>
        <option value="<?php echo $style3 ?>" <?php selected($productsarchive_button_position_value, $style3); ?>><?php _e('Style 3', 'global-quick-view'); ?></option>
        <?php $style4 = 'style4'; ?>
        <option value="<?php echo $style4 ?>" <?php selected($productsarchive_button_position_value, $style4); ?>><?php _e('Style 4', 'global-quick-view'); ?></option>
        <?php $style5 = 'style5'; ?>
        <option value="<?php echo $style5 ?>" <?php selected($productsarchive_button_position_value, $style5); ?>><?php _e('Style 5', 'global-quick-view'); ?></option>
    </select>
    <?php
}

$productsarchive_button_fsize_value = sanitize_text_field(get_option('productsarchive-button-fsize', 14));

function productsarchive_button_fsize_cb() {
    global $productsarchive_button_fsize_value;
    $html = '<input type="number" class="productsarchive-input" name="productsarchive-button-fsize" value="'.$productsarchive_button_fsize_value.'">';
    echo $html.'</br>';
    echo __('Button size (Text and Icon Size). Eg:- 13, 15, 20 Number', 'global-quick-view');
}

// add here the icon select option

// Lightbox Section callback
function productsarchive_fontfamilly_cb(){
	// Enqueue Select2 and Font Awesome
	wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
	wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
	?>
	<div class="wrap">
			<h1>Font Family Control</h1>
			<label for="selected_font">Select a Font Family:</label>
			<select id="selected_font" name="productsarchive-fontfamilly" style="width: 200px;">
					<!-- Font families will be dynamically populated using JavaScript -->
			</select>
			<div id="font_preview" style="font-size: 24px; margin-top: 20px;">
					Font Family Preview Text
			</div>
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

add_action('admin_menu','productsarchive_menu_settings');
