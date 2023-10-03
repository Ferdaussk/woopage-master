<?php

function productsarchive_nouislider_cb(){
  $default_value = 50; // Set your desired default value here.
  $slider_value = get_option('productsarchive-nouislider', $default_value); // Get the saved value or use the default if not set.
  ?>
  <div class="noUi_Slider" id="productsarchive-nouislider"></div>
  <input type="hidden" name="productsarchive-nouislider" id="productsarchive-nouislider-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="productsarchive-nouislider-tooltips"></div>
  
  <!-- Second noUiSlider -->
  <div class="noUi_Slider" id="productsarchive-nouislider2"></div>
  <input type="hidden" name="productsarchive-nouislider2" id="productsarchive-nouislider2-value" value="<?php echo esc_attr($slider_value); ?>" />
  <div class="noUi_Slider_Tooltips" id="productsarchive-nouislider2-tooltips"></div>
  
  <script>
    // Initialize the first noUiSlider
    document.addEventListener('DOMContentLoaded', function() {
      var slider = document.getElementById('productsarchive-nouislider');
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

    // Initialize the second noUiSlider
    document.addEventListener('DOMContentLoaded', function() {
      var slider2 = document.getElementById('productsarchive-nouislider2');
      var sliderValue2 = document.getElementById('productsarchive-nouislider2-value');
      var sliderTooltips2 = document.getElementById('productsarchive-nouislider2-tooltips');

      noUiSlider.create(slider2, {
        start: [parseInt(sliderValue2.value)], // Use the saved value or default value.
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
      slider2.noUiSlider.on('update', function(values, handle) {
        sliderValue2.value = values[handle];
        sliderTooltips2.innerText = parseInt(values[handle]);
      });
    });

    // Reset the sliders to their initial values
    function resetSlider() {
      var slider = document.getElementById('productsarchive-nouislider');
      var slider2 = document.getElementById('productsarchive-nouislider2');
      var sliderValue = document.getElementById('productsarchive-nouislider-value');
      var sliderValue2 = document.getElementById('productsarchive-nouislider2-value');

      slider.noUiSlider.set(<?php echo esc_js($default_value); ?>); // Use the default value here.
      sliderValue.value = <?php echo esc_js($default_value); ?>;
      document.getElementById('productsarchive-nouislider-tooltips').innerText = <?php echo esc_js($default_value); ?>;
      
      slider2.noUiSlider.set(<?php echo esc_js($default_value); ?>); // Use the default value here.
      sliderValue2.value = <?php echo esc_js($default_value); ?>;
      document.getElementById('productsarchive-nouislider2-tooltips').innerText = <?php echo esc_js($default_value); ?>;
    }
  </script>
  <?php
}