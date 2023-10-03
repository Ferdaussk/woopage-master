// Initialize the noUiSlider
document.addEventListener('DOMContentLoaded', function() {
    var slider = document.getElementById('productsarchive-nouislider');
    var sliderValue = document.getElementById('productsarchive-nouislider-value');
    var sliderTooltips = document.getElementById('productsarchive-nouislider-tooltips');
    var defaultValue = 50; // Set the default value here.

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

