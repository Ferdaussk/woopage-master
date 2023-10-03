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
$pa_presets_cls = ($productsarchive_button_position_value)?$productsarchive_button_position_value:'';
$lastInstalledSection = get_option('last_installed_section', '');
echo $lastInstalledSection;
echo '<div class="ferdaussk_for_unique '.$pa_presets_cls.'">';
    echo '<div id="primary" class="content-area">';
        echo '<main id="main" class="site-main">';
            while (have_posts()) :
                the_post();
                global $product;
                // if($slider_value == true){
                //     echo $slider_value;
                // }
                ?>
  
    <!-- Font Family Preview -->
    <!-- <div id="font_preview" style="font-size: 24px; margin-top: 20px;">
        Font Family Preview Text
    </div> -->

    <!-- Icon Preview -->
    <div id="icon_preview" style="font-size: 24px; margin-top: 20px;">
        Icon Preview: <i class="<?php echo esc_attr(get_option('productsarchive-breadcrumb-icon-control', 'fa fa-adjust')); ?>" id="selected_icon_preview"></i>
    </div>

    <?php
    // Choose styles
    echo '<div id="installed-sections">';
        $lastInstalledSection = get_option('last_installed_section', '').'-style';
        echo '<div id="last-installed-section" class="' . esc_attr($lastInstalledSection) . '"></div>';
    echo '</div>';


    // Get the saved font family option
    $selectedFont = get_option('productsarchive-fontfamilly', 'Arial, sans-serif');

    // Apply the selected font family to the font preview
    echo '<style>#font_preview { font-family: ' . esc_attr($selectedFont) . '; }</style>';
    ?>

                <!-- Review -->
                <div class="review-count">
                    <?php
                    $review_count = $product->get_review_count();
                    if ($review_count > 0) {
                        echo '<span>' . sprintf(_n('%d Review', '%d Reviews', $review_count, 'woocommerce'), $review_count) . '</span>';
                    } else {
                        echo '<span id="font_preview" style="font-size: 24px; margin-top: 20px;">No Reviews Yet</span>';
                    }
                    ?>
                </div>
                <div class="variation-info">
                    <?php
                    if ($product->is_in_stock()) {
                        echo '<span class="stock-status">In Stock</span>';
                    } else {
                        echo '<span class="stock-status">Not in Stock</span>';
                    }
                    ?>
                </div>

                <div class="breadcrumb_custome_class">
                    <?php
                    woocommerce_breadcrumb();
                    ?>
                </div>
                <?php
                if ($productsarchive_sale_check_value != false) { // for testing font familly and icon controls
                    if ($product->is_on_sale()) {
                        $sale_price = $product->get_sale_price();
                        $regular_price = $product->get_regular_price();
                        $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
                        echo '<div class="sale-badge">Sale ' . $discount_percentage . '% Off</div>';
                    }
                }
                $featured_image_url = get_the_post_thumbnail_url($product->get_id(), 'full');
                echo '<img src="' . esc_url($featured_image_url) . '" alt="Featured Image">';
                $gallery_images = $product->get_gallery_image_ids();
                foreach ($gallery_images as $image_id) {
                    $gallery_image_url = wp_get_attachment_image_url($image_id, 'full');
                    echo '<img src="' . esc_url($gallery_image_url) . '" alt="Gallery Image">';
                }

                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    ?>
                    <div class="ferdaussk-name">
                        <div class="summary entry-summary">
                            <?php
                            // Display product title only
                            the_title('<h1 class="ferdaus01010">', '</h1>');
                            
                            // echo get_the_content();
                            if ($product->is_on_sale()) {
                                $regular_price = $product->get_regular_price();
                                $sale_price = $product->get_sale_price();
                    
                                echo '<p class="price"><del>' . wc_price($regular_price) . '</del></p>';
                                echo '<p class="price">' . wc_price($sale_price) . '</p>';
                            } else {
                                echo '<p class="price">' . wc_price($product->get_price()) . '</p>';
                            }
                            ?>
                            <div class="product-categories">
                                <?php the_terms($post->ID, 'product_cat', '<span class="category">Categories: </span>', ', '); ?>
                            </div>
                            <?php
                            // variable product start
                            if ($product->is_type('variable')) {
                                $available_variations = $product->get_available_variations();
                                if (empty($available_variations)) {
                                    echo '<form class="variations_form cart">';
                                    echo '<select class="variation_id" name="variation_id">';
                                    // Get the variation attribute options and create <option> elements
                                    $attributes = $product->get_variation_attributes();
                                    foreach ($attributes as $attribute_name => $options) {
                                        echo '<optgroup label="r' . esc_attr($attribute_name) . '">';
                                        foreach ($options as $option) {
                                            echo '<option value="t' . esc_attr($option) . '">' . esc_html($option) . '</option>';
                                        }
                                        echo '</optgroup>';
                                    }
                                    echo '</select>';
                                    echo '</form>';
                                }
                            } 
                            // variable product end
                            ?>
                            <div class="product-tags">
                                <?php the_terms($post->ID, 'product_tag', '<span class="tags">Tags: </span>', ', '); ?>
                            </div>
                            <form class="cart" method="post" enctype='multipart/form-data'>
                                <?php
                                do_action('woocommerce_before_add_to_cart_button');
                                ?>
                                <div class="quantity">
                                    <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                                </div>
                                <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
                                <?php
                                do_action('woocommerce_after_add_to_cart_button');
                                if (function_exists('ti_wishlist_add_button')) {
                                    echo ti_wishlist_add_button();
                                }
                                ?>
                            </form>
                        </div>
                    </div>

                    <!-- description & reviews -->
                    <div class="des & rev">
                    <?php
                    $tabs = array(
                        'description' => array(
                            'title'    => __( 'Description', 'woocommerce' ),
                            'priority' => 10,
                            'callback' => 'woocommerce_product_description_tab',
                        ),
                        'reviews'     => array(
                            'title'    => sprintf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ),
                            'priority' => 30,
                            'callback' => 'comments_template',
                        ),
                    );
                    
                    echo 'Start';
                    ?>
                    <div class="product-tabs">
                        <ul class="tab-navigation">
                            <?php 
                            $active_tab = 'description'; // Set the default active tab
                            
                            foreach ($tabs as $key => $tab) {
                                if (isset($tab['callback'])) {
                                    $class = ($key === $active_tab) ? 'active' : '';
                                    echo '<li class="' . esc_attr($class) . '"><a href="#tab-' . esc_attr($key) . '">' . esc_html($tab['title']) . '</a></li>';
                                }
                            }
                            ?>
                        </ul>
                        
                        <div class="tab-content">
                            <?php
                            foreach ($tabs as $key => $tab) {
                                if (isset($tab['callback'])) {
                                    $class = ($key === $active_tab) ? 'active' : '';
                                    echo '<div id="tab-' . esc_attr($key) . '" class="tab-pane ' . esc_attr($class) . '">';
                                    call_user_func($tab['callback'], $key, $tab);
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <style>
                        .des .tab-content .tab-pane.active{
                            display: block;
                        }
                        .des .tab-content .tab-pane{
                            display: none;
                        }
                    </style>
                    </div>end
                    <!-- description & reviews -->


                    <!-- related-products -->
                    <div class="related-products">
                        <?php
                        $upsell_ids = $product->get_upsell_ids();
                        $cross_sell_ids = $product->get_cross_sell_ids();
                        // Merge and limit upsell and cross-sell IDs
                        $related_ids = array_merge($upsell_ids, $cross_sell_ids);
                        $related_ids = array_slice($related_ids, 0, 1); // Limit the number of related products to display

                        // For the exclude related product start
                        $related_product_exclude = [1,2,3,4]; // here should to add the product id
                        $related_ids = array_diff($related_ids, $related_product_exclude);
                        // For the exclude related product end
                        // Display related products
                        if (!empty($related_ids)) {
                            echo '<h2>' . esc_html__('Related Products', 'woopage-master') . '</h2>';
                            echo '<ul class="product-list">';
                            foreach ($related_ids as $related_id) {
                                $related_product = wc_get_product($related_id);
                                echo '<li>';
                                echo '<a href="' . esc_url($related_product->get_permalink()) . '">';
                                echo '<div class="product-image">' . $related_product->get_image() . '</div>';
                                echo '<h3>' . $related_product->get_name() . '</h3>';
                                echo '<span class="price">' . $related_product->get_price_html() . '</span>';
                                echo '</a>';
                                echo '</li>';
                            }
                            echo '</ul>';
                        } else {
                            echo '<p>' . esc_html__('No related products found.', 'woopage-master') . '</p>'; // The messege should not show
                        }
                        ?>
                    </div>
                    <!-- related-products -->


                    <meta itemprop="url" content="<?php the_permalink(); ?>" />
                </article>
            <?php endwhile;
            ?>

        </main>
    </div>
</div>
<script>
    // This script for tab
// jQuery(document).ready(function($) {
//     $('.tab-navigation a').click(function(e) {
//         e.preventDefault();
//         var tabId = $(this).attr('href');
//         $('.tab-navigation li').removeClass('active');
//         $(this).parent('li').addClass('active');
//         $('.tab-content .tab-pane').removeClass('active');
//         $(tabId).addClass('active');
//     });
// });


</script>
<?php get_footer('shop'); ?>


<!-- Add the following JavaScript code below the footer -->

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

            // Set the initial value of the font family select control from the saved option
            const savedFont = '<?php echo esc_attr(get_option("productsarchive-fontfamilly", "Arial, sans-serif")); ?>';
            fontSelect.val(savedFont);

            // Event listener for the font family select control
            fontSelect.on('change', function () {
                const selectedFont = $(this).val();
                fontPreview.css('font-family', selectedFont);
            });

            const iconSelect = $('#selected_icon');
            const iconPreview = $('#icon_preview');

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

            // Set the initial value of the icon select control from the saved option
            const savedIcon = '<?php echo esc_attr(get_option("productsarchive-breadcrumb-icon-control", "fa fa-adjust")); ?>';
            iconSelect.val(savedIcon);

            // Event listener for the icon select control
            iconSelect.on('change', function () {
                const selectedIcon = $(this).val();
                iconPreview.attr('class', selectedIcon);
            });
        });
    })(jQuery);
</script>
