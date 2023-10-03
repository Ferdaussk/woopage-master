<?php

// Enqueue Scripts & Stylesheet
function productsarchive_admin_enqueue()
{
    wp_enqueue_style('productsarchive-admin-css', plugins_url('/admin-assets/css/style.css', __FILE__), null, '1.0', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), '5.15.3'); // Add Font Awesome stylesheet

    
    wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css', array(), '4.1.0-beta.1');
    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js', array('jquery'), '4.1.0-beta.1', true);
}
add_action('admin_enqueue_scripts', 'productsarchive_admin_enqueue');

//Settings page
function productsarchive_menu_settings()
{
    add_menu_page('Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-visibility', 57);
    add_action('admin_init', 'productsarchive_settings');
}
add_action('admin_menu', 'productsarchive_menu_settings');

function productsarchive_settings_cb()
{
    // The save button for bottom save
    settings_errors(); ?>
    <div class="productsarchive-main-settings">
        <form method="POST" action="options.php" class="productsarchive-form">
            <?php settings_fields('productsarchive-group'); ?>
            <?php do_settings_sections('productsarchive_quickview'); ?>
            <?php
            echo '</div><div class="productsarchive-save-btn">';
            submit_button();
            echo '</div>';
            ?>
        </form>
    </div>
<?php
}

// All custom settings and register all custom controls
function productsarchive_settings()
{
    register_setting(
        'productsarchive-group',
        'productsarchive-fontfamilly'
    );

    register_setting(
        'productsarchive-group',
        'productsarchive-icon' // Added the option to save the selected icon
    );

    // Settings start
    add_settings_field(
        'productsarchive-fontfamilly',
        __('Font Family', 'global-quick-view'),
        'productsarchive_fontfamilly_cb',
        'productsarchive_quickview',
        'productsarchive-settings-sk'
    );

    add_settings_field(
        'productsarchive-icon', // Added the field for the icon select
        __('Select an Icon', 'global-quick-view'),
        'productsarchive_icon_select_cb',
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

function productsarchive_settings_sk()
{
    $tab = '<div id="tab1Content">';
    echo $tab . '<h2 class="productsarchive_buttn_setting">' . __('Archive Settings', 'global-quick-view') . '</h2>';
}

// Lightbox Section callback
function productsarchive_fontfamilly_cb()
{
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

// Icon Select callback
function productsarchive_icon_select_cb()
{
    ?>
    <div class="wrap">
        <h1>Icon Select Control</h1>
        <label for="selected_icon">Select an Icon:</label>
        <select id="selected_icon" name="productsarchive-icon" style="width: 200px;">
            <!-- Icons will be dynamically populated using JavaScript -->
        </select>
        <div id="icon_preview" style="font-size: 24px; margin-top: 20px;">
            Icon Preview: <i class="" id="selected_icon_preview"></i>
        </div>
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
                const savedIcon = '<?php echo esc_attr(get_option("productsarchive-icon", "fa fa-adjust")); ?>';
                iconSelect.val(savedIcon).trigger('change');
            });
        })(jQuery);
    </script>
<?php
}
