<?php
// Enqueue Scripts & Stylesheet
function productsarchive_admin_enqueue()
{
  wp_enqueue_style('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.css');
  wp_enqueue_script('nouislider', 'https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.min.js', array('jquery'), '15.5.0', true);
}
add_action('admin_enqueue_scripts', 'productsarchive_admin_enqueue');

// Settings page
function productsarchive_menu_settings()
{
  // I can add a condition for all main menu assets with the productsarchive_single_sk value
  add_menu_page('Products Archive Settings', 'Products Archive', 'manage_options', 'productsarchive_single_sk', 'productsarchive_settings_cb', 'dashicons-visibility', 57);
  add_action('admin_init', 'productsarchive_settings');
}
add_action('admin_menu', 'productsarchive_menu_settings');

function productsarchive_settings_cb()
{
  // The save button for bottom save
  settings_errors();
  ?>
  <div class="productsarchive-main-settings">
    <form method="POST" action="options.php" class="productsarchive-form">
      <?php settings_fields('productsarchive-group'); ?>
      <?php do_settings_sections('productsarchive_quickview'); ?>
      <?php
      echo '</div><div class="productsarchive-save-btn">';
      submit_button();
      echo '</div>';
      echo '<div class="productsarchive_save_btn"><input type="button" class="productsarchive_settings_reset" onclick="resetSlider();" value="Reset All" id="resetButton"></div>';
      ?>
    </form>
  </div>
  <div id="tab1Content">
    <h2 class="productsarchive_buttn_setting"><?php _e('Archive Settings', 'global-quick-view'); ?></h2>
    <?php
    // Output the noUi Slider
    productsarchive_nouislider_cb();
    ?>
  </div>
  <?php
}

// All custom settings and register all custom controls
function productsarchive_settings()
{
  register_setting(
    'productsarchive-group',
    'productsarchive-nouislider'
    // 'sanitize_productsarchive_nouislider' // Add a callback for sanitizing the slider value
  );
  // Settings start
  add_settings_section(
    'productsarchive-settings-sk',
    '',
    'productsarchive_settings_sk',
    'productsarchive_quickview'
  );
  add_settings_field(
    'productsarchive-nouislider',
    __('noUi Slider', 'global-quick-view'),
    'productsarchive_nouislider_cb', // Updated callback function for the noUiSlider
    'productsarchive_quickview',
    'productsarchive-settings-sk'
  );
}

function productsarchive_settings_sk(){
  echo '<div class="nameFerdaus">ff</div>';
}

// Lightbox Section callback
function productsarchive_nouislider_cb(){
  $default_value = 50; // Set your desired default value here.
  $slider_value = get_option('productsarchive-nouislider', $default_value); // Get the saved value or use the default if not set.
  ?>
  <div class="noUi_Slider" id="productsarchive-nouislider"></div>
  <input type="hidden" name="productsarchive-nouislider" id="productsarchive-nouislider-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="productsarchive-nouislider-tooltips"></div>
  <script>
    // Initialize the noUiSlider
    document.addEventListener('DOMContentLoaded', function() {
      var slider = document.getElementById('productsarchive-nouislider');
      var sliderValue = document.getElementById('productsarchive-nouislider-value');
      var sliderTooltips = document.getElementById('productsarchive-nouislider-tooltips');
      var defaultValue = <?php echo esc_js($default_value); ?>; // Use the default value here.

      noUiSlider.create(slider, {
        start: [parseInt(sliderValue.value)], // Use the saved value or default value.
        step: 1,
        range: {
          'min': 0,
          'max': 100,
        },
        tooltips: {
          to: function(value) {
            return parseInt(value) + 'px';
          },
          from: function(value) {
            return parseInt(value);
          }
        }
      });

      // Update the hidden input value and tooltip on slider change
      slider.noUiSlider.on('update', function(values, handle) {
        sliderValue.value = values[handle];
        sliderTooltips.innerText = parseInt(values[handle]) + 'px';
      });

      // Reset the slider to its initial value
      function resetSlider() {
        slider.noUiSlider.set(defaultValue);
        sliderValue.value = defaultValue;
        sliderTooltips.innerText = defaultValue + 'px';
      }
      
      // Attach the reset function to the reset button
      document.getElementById('resetButton').addEventListener('click', resetSlider);
    });
  </script>
  <?php
}

// Test style css start
function productsarchive_others_styles(){
  $slider_value = get_option('productsarchive-nouislider', 50);
	global $productsarchive_button_position_value,$productsarchive_btn_bgc_value,$productsarchive_relpro_productsaleprice_hover_bgcolor_value, $slider_value;
	$html = "<style>
	.ferdaus01010{
		color:{$productsarchive_btn_bgc_value};
			}
			h2.entry-title{
				color:{$productsarchive_relpro_productsaleprice_hover_bgcolor_value};
			}
			h2.entry-title{
				front-size:{$slider_value}px;
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
// add_action('wp_head','productsarchive_others_styles',99);
// Test style css end

function sanitize_productsarchive_nouislider($input) {
  return absint($input);
}
// just i want to echo this $slider_value in this productsarchive_others_styles function