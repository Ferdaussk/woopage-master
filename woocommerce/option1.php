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
$lastInstalledSection = get_option('last_installed_section');
$productsarchive_sale_check_value = get_option('productsarchive-sale-check-gallery');
echo '<div class="bwdspx-single-product-main '.esc_attr($lastInstalledSection).'">';
while (have_posts()) :
    the_post();
    global $product;
    ?>
    <div class="breadcrumb_custome_class">
        <?php
        woocommerce_breadcrumb();
        ?>
    </div>
    <div class="bwdspx-single-product-wrapper">
        <div class="bwdspx-feature-image-main">
            <div class="swiper mySwiper2">
                <div class="bwdspx-wrapper-onsale-featured">
                    <?php
                    if ($productsarchive_sale_check_value != false) { // for testing font familly and icon controls
                        if ($product->is_on_sale()) {
                            $sale_price = $product->get_sale_price();
                            $regular_price = $product->get_regular_price();
                            $discount_percentage = round((($regular_price - $sale_price) / $regular_price) * 100);
                            echo '<div class="bwdspx-saled">' . esc_html__($discount_percentage.'%', 'woopage-master') . '</div>';
                        }
                    }
                    $is_featured = $product->is_featured();
                    if($is_featured){
                        echo '<div class="bwdspx-featured">'.esc_html__('Featured', 'woopage-master').'</div>';
                    }
                    ?>
                </div>
                <?php
                $featured_image_url = get_the_post_thumbnail_url($product->get_id(), 'full');
                echo '<div class="swiper-wrapper">';
                    echo '<div class="swiper-slide">';
                        if($featured_image_url){
                            echo '<img src="' . esc_url($featured_image_url) . '" alt="Featured Image">';
                        }else{
                            echo '<img src="'.plugin_dir_url( __FILE__ ).'../all-inc/public-assets/image/bwd-placeholder.jpg'.'" alt="Featured Image">';
                        }
                    echo '</div>';
                echo '</div>';
                ?>
            </div>
            <div thumbsSlider="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    $gallery_images = $product->get_gallery_image_ids();
                    foreach ($gallery_images as $image_id) {
                        $gallery_image_url = wp_get_attachment_image_url($image_id, 'full');
                        echo '<div class="swiper-slide">';
                            echo '<img src="' . esc_url($gallery_image_url) . '" alt="Gallery Image">';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="bwdspx-information-main">
            <?php echo '<div class="bwdspx-product-title">'.esc_html__(get_the_title(), 'woopage-master').'</div>'; ?>
            <div class="bwdspx-product-rating">
                <div class="bwdspx-star-rating">
                    <?php
                    $rating = get_post_meta(get_the_ID(), '_wc_average_rating', true);
                    if ($rating) {
                        $rounded_rating = round($rating);
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $rounded_rating) {
                                echo '<i class="fa-solid fa-star"></i>';
                            } else {
                                echo '<i class="fa-regular fa-star"></i>';
                            }
                        }
                    }
                    ?>
                </div>

                <div class="bwdspx-rating-review">
                    <?php
                    $review_count = $product->get_review_count();
                    if ($review_count > 0) {
                        echo '<span class="count">' . sprintf(esc_html__('%d Review', '%d Reviews', $review_count, 'woocommerce'), $review_count) . '</span>';
                    } else {
                        echo '<span id="font_preview" class="count">'.esc_html__('No Reviews Yet', 'woopage-master').'</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="bwdspx-price-code">
                <?php 
                if ($product->is_type('variable')) {
                    $variations = $product->get_available_variations();
                    if (!empty($variations)) {
                        $min_price = $max_price = $variations[0]['display_price'];
                        foreach ($variations as $variation) {
                            $price = $variation['display_price'];
                            $min_price = min($min_price, $price);
                            $max_price = max($max_price, $price);
                        }
                        if ($min_price !== $max_price) {
                            echo '<ins>' . wc_price($min_price) . esc_html__(' - ', 'woopage-master') . wc_price($max_price) . '</ins>';
                        } else {
                            echo '<ins>' . wc_price($min_price) . '</ins>';
                        }
                    }
                } elseif ($product->is_on_sale()) {
                    $regular_price = $product->get_regular_price();
                    $sale_price = $product->get_sale_price();
                    echo '<ins>' . wc_price($sale_price) . '</ins>';
                    echo '<del>' . wc_price($regular_price) . '</del>';
                } else {
                    echo '<ins>' . wc_price($product->get_price()) . '</ins>';
                }
                ?>
            </div>
            <div class="bwdspx-product-description">
                <?php
                $short_description = $product->get_short_description();
                if($short_description){
                    echo '<p>'.esc_html__($short_description, 'woopage-master').'</p>';
                }
                ?>
            </div>
            <div class="bwdspx-stock-available">
                <div class="stock-bottom">
                <?php
                if ($product->is_in_stock()) {
                    echo '<span class="stock-status">'.esc_html__('In Stock', 'woopage-master').'</span>';
                    $stock_quantity = $product->get_stock_quantity();
                    $items_sold = get_post_meta(get_the_ID(), 'total_sales', true);
                    echo '<div class="tb-available">';
                        $stockAvailable = '<span class="stock-label">'.esc_html__('Available:', 'woopage-master').'</span> <span class="stock-value">'.esc_html__($stock_quantity, 'woopage-master').'</span>';
                        echo $stock_quantity?$stockAvailable:'';
                    echo '</div>';
                    echo '<div class="tb-sold">';
                        $IfSold = '<span class="stock-label">'.esc_html__('Sold:', 'woopage-master').'</span> <span class="stock-value">'.esc_html__($items_sold, 'woopage-master').'</span>';
                        echo $items_sold?$IfSold:'';
                    echo '</div>';
                } else {
                    echo '<span class="stock-status">'.esc_html__('Not in Stock', 'woopage-master').'</span>';
                }
                ?>
                </div>
            </div>
            
            <form class="cart" method="post" enctype='multipart/form-data'>
                <div class="bwdspx-shop-now">
                    <div class="bwdspx-quentity">
                        <div class="bwdspx-quentity-box quantity">
                            <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                        </div>
                    </div>
                    <button type="submit" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" class="bwdspx-single_add_to_cart_button bwdspx-button single_add_to_cart_button button alt"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
                    <?php
                    echo '<a href="' . wc_get_cart_url() . '" target="_blank" class="bwdspx-single-buy-now bwdspx-button">View Cart</a>';
                    do_action('woocommerce_after_add_to_cart_button');
                    if (function_exists('ti_wishlist_add_button')) {
                        echo ti_wishlist_add_button();
                    }
                    ?>
                </div>
            </form>
            <!-- <form action="#">
                <div class="bwdspx-shop-now">
                    <div class="bwdspx-quentity">
                        <div class="bwdspx-quentity-box">
                            <button class="bwdspx-minus bwdspx-minusx" type="button"><i class="fa-solid fa-minus"></i></button>
                            <input disabled type="number" name="quantity" value="01"  min="1" step="1" inputmode="numeric" autocomplete="off">
                            <button class="bwdspx-plus bwdspx-plusx" type="button"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                    <button type="submit" class="bwdspx-single_add_to_cart_button bwdspx-button">Add to cart</button>
                    <button class="bwdspx-single-buy-now bwdspx-button">View cart</button>
                </div>
            </form> -->
            <div class="bwdspx-product-meta">
                <?php
                // if(get_post_meta(get_the_ID(), '_sku', true)){
                    echo '<div class="bwdspx-sku-wrapper bwdspx-meta-gap">';
                        $skuWrap = esc_html__('SKU:', 'woopage-master').' <span class="bwdspx-sku">'.esc_html__(get_post_meta(get_the_ID(), '_sku', true), 'woopage-master').'</span>';
                        $skuWrapIfNo = esc_html__('SKU:', 'woopage-master').' <span class="bwdspx-sku">'.esc_html__('No', 'woopage-master').'</span>';
                        echo (get_post_meta(get_the_ID(), '_sku', true))?$skuWrap:$skuWrapIfNo;
                    echo '</div>';
                // }
                ?>
                <div class="bwdspx-category-wrapper bwdspx-meta-gap">
                    <?php the_terms($post->ID, 'product_cat', '<span class="category">'.esc_html__('Categories: ', 'woopage-master').'</span>', ', '); ?>
                </div>
                <div class="bwdspx-tags-wrapper bwdspx-meta-gap">
                    <?php the_terms($post->ID, 'product_tag', '<span class="tags">'.esc_html__('Tags: ', 'woopage-master').'</span>', ', '); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="bwdspx-des-rev-main"> <!-- Custom class (This div only) -->
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
    </div>

    <div class="bwdspx-related-product-main">
        <div class="bwdspx-related-title">Related products</div>

        <div class="bwdspx-related-product-slider">

        <div class="swiper related-mySwiper">
            <div class="swiper-wrapper">
            <?php
            $upsell_ids = $product->get_upsell_ids();
            $cross_sell_ids = $product->get_cross_sell_ids();
            $related_ids = array_merge($upsell_ids, $cross_sell_ids);
            $related_ids = array_slice($related_ids, 0, 1);
            $related_product_exclude = [1,2,3,4];
            $related_ids = array_diff($related_ids, $related_product_exclude);
            if (!empty($related_ids)) {
                foreach ($related_ids as $related_id) {
                    $related_product = wc_get_product($related_id);
                    ?>
                    <div class="swiper-slide">
                        <div class="bwdspx-related-product-wrap">
                            <div class="bwdspx-related-block-inner">
                                <div class="bwdspx-related-image">
                                    <?php echo '<a href="' . esc_url($related_product->get_permalink()) . '">' . $related_product->get_image() . '</a>'; ?>
                                </div>
                                <div class="bwdspx-group-add-to-cart">
                                    <div class="bwdspx-add-cart">
                                        <?php echo '<a href="'.$related_product->add_to_cart_url().'">'.esc_html__('Add to cart', 'woopage-master').'</a>'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="bwdspx-related-content">
                                <div class="bwdspx-related-caption">
                                    <?php echo '<a href="' . esc_url($related_product->get_permalink()) . '">' . $related_product->get_name() . '</a>'; ?>
                                </div>
                                <?php echo '<div class="bwdspx-price-code bwdspx-related-price-code">' . $related_product->get_price_html() . '</div>'; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo '<p>' . esc_html__('No related products found.', 'woopage-master') . '</p>'; // The messege should not show
            }
            ?>
            </div>
            <div class="swiper-button-next"><i class="fa-solid fa-chevron-right"></i></div>
            <div class="swiper-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
        </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>

<?php get_footer('shop'); ?>