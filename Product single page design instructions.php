<?php
/**
 * V4
 * Product single page design instructions [-------------------------
 */
?>


The parent div class should like this <div class="style1 style2 style3 style... ">

01. Add a breadcrumb here like this. You can't add or remove anything from here. Only change the "breadcrumb_custome_class" class name. [Default value false]
  <div class="breadcrumb_custome_class">
    <nav class="woocommerce-breadcrumb">
      <a href="#">Home</a> /
      <a href="#">android</a> /
      ANDROID PHONE
    </nav>
  </div>
02. Discount Sale option ---->> Should be a number in %
03. Add Review count (It's a number)
04. Stock check (In Stock / Not in Stock)
05. A featured image in a img tag 
06. Some gallery images in many img tag 
07. Title
08. Reagular Price
09. Sale Price
10. A short description
11. Categories 
12. Add a select option to select variable products [Only for variable products]
13. Tags [Default value false]
14. Quantity and Add To Cart Button two are should in a <form action=""></form> tag
    01. Quantity ---->>> Should be a number type input tag 
    02. Add To Cart Button ---->>> Should be a button tag 
15. Product description and reviews (This two are in one div) must be like this. You can't add or remove anything from here. It's a tab. 
    Only change the "des & rev" class name.
    Just design (css) the tab and I'll add the js effect later.
<div class="des & rev"> <!-- Custom class (This div only) -->
  <div class="product-tabs">
    <ul class="tab-navigation">
      <li class="active">
        <a href="#tab-description">Description</a>
      </li>
      <li class="">
        <a href="#tab-reviews">Reviews</a>
      </li>
    </ul>
    <div class="tab-content">
      <div id="tab-description" class="tab-pane active">
        <h2>Description</h2>
        <p>We highly recommend serving your entire website over an HTTPS connection to help keep customer data secureWe highly recommend serving your entire website over an HTTPS connection to help keep customer data secureWe highly recommend serving your entire website over an HTTPS connection to help keep customer data secureWe highly recommend serving your entire website over an HTTPS connection to help keep customer data secure</p>
      </div>
      <div id="tab-reviews" class="tab-pane">
        <div id="reviews" class="woocommerce-Reviews">
          <div id="comments">
            <h2 class="woocommerce-Reviews-title">Reviews</h2>
            <p class="woocommerce-noreviews">There are no reviews yet.</p>
          </div>
          <div id="review_form_wrapper">
            <div id="review_form">
              <div id="respond" class="comment-respond">
                <span id="reply-title" class="comment-reply-title">Be the first to review “ANDROID PHONE” <small><a id="cancel-comment-reply-link" href="#">Cancel reply</a></small></span>
                <form action="post" method="post" id="commentform" class="comment-form">
                  <div class="comment-form-rating">
                    <label for="rating">Your rating<span class="required">*</span></label>
                    <p class="stars">
                      <span>
                        <a class="star-1" href="#" data-abc="true">1</a>
                        <a class="star-2" href="#" data-abc="true">2</a>
                        <a class="star-3" href="#" data-abc="true">3</a>
                        <a class="star-4" href="#" data-abc="true">4</a>
                        <a class="star-5" href="#" data-abc="true">5</a>
                      </span>
                    </p>
                    <select id="rating" required="" style="display: none;">
                      <option value="">Rate…</option>
                      <option value="5">Perfect</option>
                      <option value="4">Good</option>
                      <option value="3">Average</option>
                      <option value="2">Not that bad</option>
                      <option value="1">Very poor</option>
                    </select>
                  </div>
                  <p class="comment-form-comment">
                    <label for="comment">Your review<span class="required">*</span></label>
                    <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                  </p>
                  <p class="form-submit">
                    <input name="submit" type="submit" id="submit" class="submit" value="Submit">
                    <input type="hidden" name="comment_post_ID" value="44" id="comment_post_ID">
                    <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                  </p>
                  <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="43ead72bb4">
                  <script>
                    (function(){
                      if(window===window.parent){
                        document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';
                      }
                    })();
                  </script>
                </form>
              </div><!-- #respond -->
            </div>
          </div>
        <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
</div>

16. This is related products. Design it as your wish and also you can add carousel.



/////////////--------------------------/////////////////


Follow the all options below from previous instructions:-
01. This option is mising here.
05. Here should to use only one image in one img tag. Shouldn't use multiple img tags.
06. Some gallery images in many img tags. Should use multiple img tags and that all images should slide (As wish) in 05 option.
14. The quantity input not design what you did. Like plus minus icon. Use only input tag also you can check to install the plugin and see how has done!
15. First install the plugin in localhost and from dashboard enable that then view a product single page. Then find the tab section "Description" and "Reviews". In review tab see all content and design it well-oriented. 
Note: After review tab design add some reviews. Secound, Check all css conflict issue with wp default themes.

@Plugin download from here (https://github.com/Ferdaussk/woopage-master.git)
@See all previous instructions from here (https://github.com/Ferdaussk/woopage-master/blob/master/Product%20single%20page%20design%20instructions.php) 
























































































