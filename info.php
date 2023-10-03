<?php

function productsarchive_relpro_relpro_relpro_relpro_button_position_cb() {
  global $productsarchive_relpro_relpro_relpro_relpro_button_position_value;
  ?>
  <select name="productsarchive-relpro-relpro-relpro-relpro-relpro-button-position" class="productsarchive-relpro-relpro-relpro-relpro-relpro-input">
      <option value="woocommerce_before_shop_loop_item_title" <?php selected($productsarchive_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_before_shop_loop_item_title'); ?>><?php _e('After product image', 'global-quick-view'); ?></option>
      <option value="woocommerce_shop_loop_item_title" <?php selected($productsarchive_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_shop_loop_item_title'); ?>><?php _e('After product title', 'global-quick-view'); ?></option>
      <option value="woocommerce_after_shop_loop_item_title" <?php selected($productsarchive_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_after_shop_loop_item_title'); ?>><?php _e('After product price', 'global-quick-view'); ?></option>
      <option value="woocommerce_after_shop_loop_item" <?php selected($productsarchive_relpro_relpro_relpro_relpro_button_position_value, 'woocommerce_after_shop_loop_item'); ?>><?php _e('After product cart button', 'global-quick-view'); ?></option>
      <option value="image_hover" <?php selected($productsarchive_relpro_relpro_relpro_relpro_button_position_value, 'image_hover'); ?>><?php _e('On Image hover', 'global-quick-view'); ?></option>
  </select>
  <p class="description imgh-alert"><?php echo __('Quick view button position.', 'global-quick-view'); ?></p>
  <?php
}



// Define the action and name of the reset button.
$action = 'reset';
$name = 'reset';
// Add the reset button to the form.
echo '<form method="post">
  <input type="hidden" name="action" value="' . esc_attr($action) . '" />
  <input type="submit" name="' . esc_attr($name) . '" value="Reset" class="button-secondary" />
</form>';





// A new related products query
// The ChatGPT Title is "Related Products Code" VVVV

// Get the upsell and cross-sell IDs
$upsell_ids = $product->get_upsell_ids();
$cross_sell_ids = $product->get_cross_sell_ids();

// Merge and limit upsell and cross-sell IDs
$related_ids = array_merge($upsell_ids, $cross_sell_ids);
$related_ids = array_slice($related_ids, 0, 1); // Limit the number of related products to display

// IDs of products to exclude from related products
$exclude_ids = array(1, 2, 3); // Add the IDs of products you want to exclude here

// Remove excluded IDs from the related_ids array
$related_ids = array_diff($related_ids, $exclude_ids);

// Define the maximum word length for the short description
$max_word_length = 20;

// Display related products
if (!empty($related_ids)) {
    echo '<h2>' . esc_html__('Related Products', PROJECT_ROOT) . '</h2>';
    echo '<ul class="product-list">';
    foreach ($related_ids as $related_id) {
        $related_product = wc_get_product($related_id);
        
        // Calculate sale percentage
        $regular_price = $related_product->get_regular_price();
        $sale_price = $related_product->get_sale_price();
        $sale_percentage = ($regular_price && $sale_price) ? round((($regular_price - $sale_price) / $regular_price) * 100) : 0;
        
        // Get the average rating for the product
        $average_rating = $related_product->get_average_rating();

        echo '<li>';
        echo '<span class="sale-percentage">' . $sale_percentage . '% OFF</span>'; // Display sale percentage
        
        echo '<a href="' . esc_url($related_product->get_permalink()) . '">';
        echo '<div class="product-image">' . $related_product->get_image() . '</div>';
        echo '<h3>' . $related_product->get_name() . '</h3>';

        // Get the short description and trim it if needed
        $short_description = $related_product->get_short_description();
        $words = explode(' ', $short_description);
        if (count($words) > $max_word_length) {
            $trimmed_description = implode(' ', array_slice($words, 0, $max_word_length)) . '...';
            echo '<p class="short-description">' . $trimmed_description . '</p>'; // Display trimmed short description with "..." indicator
        } else {
            echo '<p class="short-description">' . $short_description . '</p>'; // Display full short description
        }

        // Display the star rating
        if ($average_rating > 0) {
            echo '<div class="star-rating" title="' . sprintf(__('Rated %s out of 5', 'woocommerce'), $average_rating) . '">';
            woocommerce_template_loop_rating();
            echo '</div>';
        }

        echo '<span class="price">' . $related_product->get_price_html() . '</span>';
        echo '</a>';
        echo '</li>';
    }
    echo '</ul>';
} else {
    echo '<p>' . esc_html__('No related products found.', PROJECT_ROOT) . '</p>'; // The message should not show
}





// Product limit
// Exclude products
// desc word length












/* function productsarchive_relpro_productprice_sale_style_cb(){
	echo '<div class="productsarchive_relpro_setting" id="breadcrumb"><b>'.__('Sale Price',PROJECT_ROOT).'</b></div>';
} */





	/* add_settings_section( //------ Product Sale Price style
		'productsarchive-relpro-productsaleprice-style',
		'',
		'productsarchive_relpro_productprice_sale_style_cb',
		'productsarchive_single'
	); */





/* 
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
$productsarchive_relpro_productsaleprice_hover_size_value = sanitize_text_field(get_option('productsarchive-relpro-productsaleprice-hover-size-control','0px 0px 0px 0px'));
function productsarchive_relpro_productsaleprice_hover_size_fld(){
	global $productsarchive_relpro_productsaleprice_hover_size_value;
	echo '<input type="text" name="productsarchive-relpro-productsaleprice-hover-size-control" value="'.$productsarchive_relpro_productsaleprice_hover_size_value.'"  placeholder="0px">';
}
//------ Related Product Sale Price style input end */








/* 
	//------ Related Product Sale Price style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-margin-control'
	);
	// Related Product Sale Price hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productsaleprice-hover-size-control'
	);
	//------ Related Product Sale Price style save end
	
	//------ Related Product Sale Product style controls start
	add_settings_field(
		'productsarchive-relpro-productsaleprice-color-control',
		__('Font Color',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-bgcolor-control',
		__('BG Color',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-size-control',
		__('Size',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-padding-control',
		__('Padding',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_padding_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-margin-control',
		__('Margin',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_margin_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');

		// Hover start
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-color-control',
		__('Hover Color',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_hover_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-bgcolor-control',
		__('Hover BG Color',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-size-control',
		__('Hover Size',PROJECT_ROOT),
		'productsarchive_relpro_productsaleprice_hover_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	//------ Related Product Sale Product style controls end */

?>

	<!-- Add to Cart button -->
	<button id="add-to-cart-btn" type="button">Add to Cart</button>
	
	<!-- View Cart button (initially hidden) -->
	<button id="view-cart-btn" type="button" style="display:none">View Cart</button>
	
	<script>
			document.addEventListener('DOMContentLoaded', function() {
				const addToCartButton = document.getElementById('add-to-cart-btn');
				const viewCartButton = document.getElementById('view-cart-btn');
				addToCartButton.addEventListener('click', function() {
					viewCartButton.style.display = 'block';
				});
			});
	</script>

	
<?php


function ferdaus_single_product_template($template) {
	if (is_singular('product')) {
		while (have_posts()){
			the_post();
			global $product;
		
		}
	}
	return $template;
}
add_filter('template_include', 'ferdaus_single_product_template', 99);
i want to add in here

