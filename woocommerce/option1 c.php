<?php 
/**
 * Custom Single Product Template
 *
 * Override this template by copying it to yourtheme/woocommerce/custom-single-product.php
 */

if (!defined('ABSPATH')) {
    exit;
}
get_header('shop');
$pa_presets_cls = ($productsarchive_button_position_value) ? $productsarchive_button_position_value : '';
echo '<div class="ferdaussk_for_unique '.$pa_presets_cls.'">';
    echo '<div id="primary" class="content-area">';
        echo '<main id="main" class="site-main">';
            while (have_posts()) :
                the_post();
                global $product;
                ?>
                <!-- Add the variation select option -->
                <?php 
                // Check if the product is a variable product
                if ($product->is_type('variable')) {
                    $available_variations = $product->get_available_variations();
                    if (empty($available_variations)) {
                        echo '<form class="variations_form cart">';
                        echo '<select class="variation_id" name="variation_id">';
                        
                        // Get the variation attribute options and create <option> elements
                        $attributes = $product->get_variation_attributes();
                        foreach ($attributes as $attribute_name => $options) {
                            echo '<optgroup label="' . esc_attr($attribute_name) . '">';
                            foreach ($options as $option) {
                                echo '<option value="' . esc_attr($option) . '">' . esc_html($option) . '</option>';
                            }
                            echo '</optgroup>';
                        }
                        
                        echo '</select>';
                        echo '</form>';
                    }
                }

                // Continue with the rest of the code
                $featured_image_url = get_the_post_thumbnail_url($product->get_id(), 'full');
                echo '<img src="' . esc_url($featured_image_url) . '" alt="Featured Image">';
                $gallery_images = $product->get_gallery_image_ids();
                foreach ($gallery_images as $image_id) {
                    $gallery_image_url = wp_get_attachment_image_url($image_id, 'full');
                    echo '<img src="' . esc_url($gallery_image_url) . '" alt="Gallery Image">';
                }
                ?>
                <!-- Continue with the rest of the code -->
                <?php
            endwhile;
        ?>
        </main>
    </div>
</div>
<?php // get_sidebar('shop'); ?>
<?php get_footer('shop'); ?>
