<?php


#################---#######111 Save or register settings start
	//***************---****** Settings start  (Tab)
	//------ General Settings Controls start
	register_setting( // Check Sale
		'productsarchive-group',
		'productsarchive-breadcrumb-check-gallery'
	);
	register_setting( // Check stock
		'productsarchive-group',
		'productsarchive-stock-check-gallery'
	);
	register_setting( // Check Sale
		'productsarchive-group',
		'productsarchive-sale-check-gallery'
	);
	register_setting( // Check featured
		'productsarchive-group',
		'productsarchive-featured-img-check-gallery'
	);
	register_setting( // Check gallery
		'productsarchive-group',
		'productsarchive-gallery-img-check-gallery'
	);
	register_setting( // Check Title
		'productsarchive-group',
		'productsarchive-title-check-gallery'
	);
	register_setting( // Check product price
		'productsarchive-group',
		'productsarchive-reg-price-check-gallery'
	);
	register_setting( // Check short description
		'productsarchive-group',
		'productsarchive-short-description-check-gallery'
	);
	register_setting( // Check categories
		'productsarchive-group',
		'productsarchive-categories-check-gallery'
	);
	register_setting( // Check tags
		'productsarchive-group',
		'productsarchive-tags-check-gallery'
	);
	register_setting( // Check quantity
		'productsarchive-group',
		'productsarchive-quantity-check-gallery'
	);
	register_setting( // Check add to cart
		'productsarchive-group',
		'productsarchive-addtocart-check-gallery'
	);
	register_setting( // Check description
		'productsarchive-group',
		'productsarchive-description-check-gallery'
	);

	// Related Products General Settings Controls start
	register_setting( // Check related products
		'productsarchive-group',
		'productsarchive-related-products-check-gallery'
	);
	register_setting( // related products top title
		'productsarchive-group',
		'productsarchive-relpro-toptile-check-gallery'
	);
	register_setting( // related products image
		'productsarchive-group',
		'productsarchive-relpro-prodimg-check-gallery'
	);
	register_setting( // related products img link
		'productsarchive-group',
		'productsarchive-relpro-imglnk-check-gallery'
	);
	register_setting( // related products title
		'productsarchive-group',
		'productsarchive-relpro-prodtitle-check-gallery'
	);
	register_setting( // related products title link
		'productsarchive-group',
		'productsarchive-relpro-titlelnk-check-gallery'
	);
	register_setting( // related products price
		'productsarchive-group',
		'productsarchive-relpro-prodpric-check-gallery'
	);
	register_setting( // related products button
		'productsarchive-group',
		'productsarchive-relpro-button-check-gallery'
	);
	register_setting( // related products count
		'productsarchive-group',
		'productsarchive-relpro-count-gallery'
	);
	register_setting( // related exclud product
		'productsarchive-group',
		'productsarchive-relpro-excdpro-gallery'
	);
	register_setting( // related products desc
		'productsarchive-group',
		'productsarchive-relpro-dsc-check-gallery'
	);
	register_setting( // related products word length
		'productsarchive-group',
		'productsarchive-relpro-dscwordl-gallery'
	);
	register_setting( // related products desc indi
		'productsarchive-group',
		'productsarchive-relpro-dscind-gallery'
	);
	// Related Products General Settings Controls end
	//------ General Settings Controls end

	//------ Archive Settings start
	register_setting( // Use our style?
		'productsarchive-group',
		'productsarchive-enable-product-single-page'
	);
	register_setting( // Choose Preset
		'productsarchive-group',
		'productsarchive-select-preset-single-product'
	);
	//------ Archive Settings end
	//***************---****** Settings end  (Tab)

	//***************---****** Save Style start  (Tab)
	//------ General style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-general-style-fsize'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-general-title-clr'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-hover-bgc'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-button-color'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-ps'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-margin'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-btype'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bs'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bors'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-bc'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-btn-iconc'
	);
	//------ General style save end

	//------ Breadcrumb style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-breadalign'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-text-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-text-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-icon-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fontfamilly'
	);
	// Breadcrumb hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-breadcrumb-hover-size-control'
	);
	//------ Breadcrumb style save end

	//------ Stock or Not style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornotalign'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-margin-control'
	);
	// Stock or Not hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-hover-size-control'
	);
	//------ Stock or Not style save end

	//------ Sale Note style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-salenotealign'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-stockornot-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-margin-control'
	);
	// Sale Note hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-salenote-hover-size-control'
	);
  //------ Sale Note style save end

	//------ Featured img style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-border-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-border-clr-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-brdrtype-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-bdrrds-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-fetuimg-margin-control'
	);
	//------ Featured img style save end

	//------ Gallery imgs style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-border-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-border-clr-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-brdrtype-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-bdrrds-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-gllimg-margin-control'
	);
	//------ Gallery imgs style save end

	//------ Product Title style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-fontfamilly'
	);
	// Product Title hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttitle-hover-size-control'
	);
	//------ Product Title style save end

	//------ Product Reg Price style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-fontfamilly'
	);
	// Product Reg Price hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productregprice-hover-size-control'
	);
	//------ Product Reg Price style save end

	//------ Product Sale Price style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-margin-control'
	);
	// Product Sale Price hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productsaleprice-hover-size-control'
	);
	//------ Product Sale Price style save end

	//------ Product category style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-fontfamilly'
	);
	// Product category hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-productcategory-hover-size-control'
	);
	//------ Product category style save end

	//------ Product tags style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-fontfamilly'
	);
	// Product tags hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-producttags-hover-size-control'
	);
	//------ Product tags style save end

	// -------------********************** Related Product Style Start
	//------ Related Product Featured img style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-border-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-border-clr-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-brdrtype-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-bdrrds-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-fetuimg-margin-control'
	);
	//------ Related Product Featured img style save end

	//------ Related Product Title style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-fontfamilly'
	);
	// Related Product Title hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-producttitle-hover-size-control'
	);
	//------ Related Product Title style save end

	//------ Related Product Reg Price style save start
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-align'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-size-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-padding-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-margin-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-fontfamilly'
	);
	// Related Product Reg Price hover save
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-hover-color-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-hover-bgcolor-control'
	);
	register_setting(
		'productsarchive-group',
		'productsarchive-relpro-productregprice-hover-size-control'
	);
	//------ Related Product Reg Price style save end
	
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

// nouislider try
	register_setting(
		'productsarchive-group',
		'productsarchive-nouislider'
	);
	
	//------ Related Product Sale Price style save end
	// -------------********************** Related Product Style end
	//***************---****** Save Style end  (Tab)
	#################---#######111 Save or register settings end

	#################---#######222 Section settings start
	add_settings_section(
		'productsarchive-header-section-sk',
		'',
		'productsarchive_header_section',
		'productsarchive_single'
	);
	add_settings_section(
		'productsarchive-tab-section-sk',
		'',
		'productsarchive_tab_section',
		'productsarchive_single'
	);
	//***************---****** All Settings Tab Sections Start
	add_settings_section( //------ Archive Settings Section  (Tab)
		'productsarchive-settings-sk',
		'',
		'productsarchive_settings_sk',
		'productsarchive_single'
	);
	add_settings_section( //------ General Settings Section  (Tab)
		'productsarchive-general-settings-sk',
		'',
		'productsarchive_general_settings_sk',
		'productsarchive_single'
	);
	add_settings_section( //------ General Settings Section [For Related producs] (Tab)
		'productsarchive-general-relpro-settings-sk',
		'',
		'productsarchive_general_relpro_settings_sk',
		'productsarchive_single'
	);
	//***************---****** All Settings Tab Sections end

	//***************---****** All Style Section (Tab) Start
	add_settings_section( //------ general style
		'productsarchive-general-style',
		'',
		'productsarchive_general_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ breadcrumb style
		'productsarchive-breadcrumb-style',
		'',
		'productsarchive_breadcrumb_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ breadcrumb hover style
		'productsarchive-breadcrumb-hover-style',
		'',
		'productsarchive_breadcrumb_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ in stock or not style
		'productsarchive-stockornot-style',
		'',
		'productsarchive_stockornot_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ in stock or not hover style
		'productsarchive-stockornot-hover-style',
		'',
		'productsarchive_stockornot_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ sale note style
		'productsarchive-salenote-style',
		'',
		'productsarchive_salenote_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ sale note hover style
		'productsarchive-salenote-hover-style',
		'',
		'productsarchive_salenote_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ featured img
		'productsarchive-featuredimg-style',
		'',
		'productsarchive_featuredimg_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ gallery imgs
		'productsarchive-galleryimgs-style',
		'',
		'productsarchive_galleryimgs_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Title
		'productsarchive-producttitle-style',
		'',
		'productsarchive_producttitle_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Title hover style
		'productsarchive-producttitle-hover-style',
		'',
		'productsarchive_producttitle_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Reg Price
		'productsarchive-productregprice-style',
		'',
		'productsarchive_productprice_reg_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Sale Price style
		'productsarchive-productsaleprice-style',
		'',
		'productsarchive_productprice_sale_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product short description
		'productsarchive-productshortdesc-style',
		'',
		'productsarchive_productshortdesc_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Variables Product
		'productsarchive-variablesproduct-style',
		'',
		'productsarchive_variablesproduct_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product category
		'productsarchive-productcategory-style',
		'',
		'productsarchive_productcategory_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product hover category
		'productsarchive-productcategory-hover-style',
		'',
		'productsarchive_productcategory_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product tags
		'productsarchive-producttags-style',
		'',
		'productsarchive_producttags_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product hover tags
		'productsarchive-producttags-hover-style',
		'',
		'productsarchive_producttags_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Quantity
		'productsarchive-product-quantity-style',
		'',
		'productsarchive_product_quantity_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Add to Cart
		'productsarchive-product-addtocart-style',
		'',
		'productsarchive_product_addtocart_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Description & Review
		'productsarchive-product-descandrev-style',
		'',
		'productsarchive_product_descandrev_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Related Products Styles
		'productsarchive-related-product-styles',
		'',
		'productsarchive_related_product_styles_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Related Products Wrap Styles
		'productsarchive-related-product-wrapper-styles',
		'',
		'productsarchive_related_product_wrapper_styles_cb',
		'productsarchive_single'
	);
	////////////////////////////////
	add_settings_section( //------ featured img
		'productsarchive-relpro-featuredimg-style',
		'',
		'productsarchive_relpro_featuredimg_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Title
		'productsarchive-relpro-producttitle-style',
		'',
		'productsarchive_relpro_producttitle_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Title hover style
		'productsarchive-relpro-producttitle-hover-style',
		'',
		'productsarchive_relpro_producttitle_hover_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product Reg Price
		'productsarchive-relpro-productregprice-style',
		'',
		'productsarchive_relpro_productprice_reg_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Related Product sale Price
		'productsarchive-relpro-productsaleprice-style',
		'',
		'productsarchive_relpro_productprice_sale_style_cb',
		'productsarchive_single'
	);
	add_settings_section( //------ Product More View
		'productsarchive-relpro-product-addtocart-style',
		'',
		'productsarchive_relpro_product_addtocart_style_cb',
		'productsarchive_single'
	);
	add_settings_section(
		'productsarchive-lb',
		'',
		'productsarchive_lb_cb',
		'productsarchive_single'
	);
	#################---#######222 Section settings end

	#################---#######333 Settings field start
	//***************---****** Settings inputs start (Tab)
	//------ Archive Settings start
	add_settings_field( // Use our style?
		'productsarchive-enable-product-single-page',
		__('Use our style?','woopage-master'),
		'productsarchive_lb_en_gallery_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);
	add_settings_field( // Choose Preset
		'productsarchive-select-preset-single-product',
		__('','woopage-master'),
		'productsarchive_button_position_cb',
		'productsarchive_single',
		'productsarchive-settings-sk'
	);
	//------ Archive Settings start

	//------ General Settings Controls start
	add_settings_field( // Check breadcrumb
		'productsarchive-breadcrumb-check-gallery',
		__('Breadcrumb?','woopage-master'),
		'productsarchive_breadcrumb_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Stock
		'productsarchive-stock-check-gallery',
		__('Stock Check','woopage-master'),
		'productsarchive_stock_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Sale
		'productsarchive-sale-check-gallery',
		__('Check Sale','woopage-master'),
		'productsarchive_sale_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check featured
		'productsarchive-featured-img-check-gallery',
		__('Featured img?','woopage-master'),
		'productsarchive_featured_img_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check gallery
		'productsarchive-gallery-img-check-gallery',
		__('Gallery?','woopage-master'),
		'productsarchive_gallery_img_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Title
		'productsarchive-title-check-gallery',
		__('Check Title','woopage-master'),
		'productsarchive_title_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Product Price
		'productsarchive-reg-price-check-gallery',
		__('Product Price','woopage-master'),
		'productsarchive_reg_price_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Short Description?
		'productsarchive-short-description-check-gallery',
		__('Short Description?','woopage-master'),
		'productsarchive_short_description_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Categories
		'productsarchive-categories-check-gallery',
		__('Categories?','woopage-master'),
		'productsarchive_categories_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check Tags
		'productsarchive-tags-check-gallery',
		__('Tags?','woopage-master'),
		'productsarchive_tags_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check quantity
		'productsarchive-quantity-check-gallery',
		__('Quantity Count','woopage-master'),
		'productsarchive_quantity_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check add to cart
		'productsarchive-addtocart-check-gallery',
		__('Add To Cart?','woopage-master'),
		'productsarchive_addtocart_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	add_settings_field( // Check description
		'productsarchive-description-check-gallery',
		__('Description & Review?','woopage-master'),
		'productsarchive_description_check_cb',
		'productsarchive_single',
		'productsarchive-general-settings-sk'
	);
	// Related Products General Settings Controls start
	add_settings_field( // Check related products
		'productsarchive-related-products-check-gallery',
		__('Related Products','woopage-master'),
		'productsarchive_related_products_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Top Title
		'productsarchive-relpro-toptile-check-gallery',
		__('Top Title','woopage-master'),
		'productsarchive_relpro_toptile_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);

	add_settings_field( // Related Products Image
		'productsarchive-relpro-prodimg-check-gallery',
		__('Product Image','woopage-master'),
		'productsarchive_relpro_prodimg_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Image link
		'productsarchive-relpro-imglnk-check-gallery',
		__('Image Link','woopage-master'),
		'productsarchive_relpro_imglnk_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Title
		'productsarchive-relpro-prodtitle-check-gallery',
		__('Product Title','woopage-master'),
		'productsarchive_relpro_prodtitle_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Title link
		'productsarchive-relpro-titlelnk-check-gallery',
		__('Title Link','woopage-master'),
		'productsarchive_relpro_titlelnk_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products price
		'productsarchive-relpro-prodpric-check-gallery',
		__('Product Price','woopage-master'),
		'productsarchive_relpro_prodpric_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products button
		'productsarchive-relpro-button-check-gallery',
		__('Button','woopage-master'),
		'productsarchive_relpro_button_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products count
		'productsarchive-relpro-count-gallery',
		__('Product Limit','woopage-master'),
		'productsarchive_relpro_count_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Exclud Product
		'productsarchive-relpro-excdpro-gallery',
		__('Exclud Product','woopage-master'),
		'productsarchive_relpro_excdpro_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Description
		'productsarchive-relpro-dsc-check-gallery',
		__('Description?','woopage-master'),
		'productsarchive_relpro_dsc_check_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Word Length
		'productsarchive-relpro-dscwordl-gallery',
		__('Word Length','woopage-master'),
		'productsarchive_relpro_dscwordl_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	add_settings_field( // Related Products Description Indicator
		'productsarchive-relpro-dscind-gallery',
		__('Description Indicator','woopage-master'),
		'productsarchive_relpro_dscind_cb',
		'productsarchive_single',
		'productsarchive-general-relpro-settings-sk'
	);
	// Related Products General Settings Controls end
	//------ General Settings Controls end
	//***************---****** Settings inputs end (Tab)

	//***************---****** Style inputs start (Tab)
	//------ General style controls start
	add_settings_field(
		'productsarchive-general-style-fsize',
		__('Font Size','woopage-master'),
		'productsarchive_button_fsize_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-general-title-clr',
		__('Title Color','woopage-master'),
		'productsarchive_btn_bgc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-hover-bgc',
		__('Hover Title Color','woopage-master'),
		'productsarchive_btn_hover_bgc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-button-color',
		__('Text Color','woopage-master'),
		'productsarchive_button_color_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-ps',
		__('Title Padding','woopage-master'),
		'productsarchive_btn_ps_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-margin',
		__('Title Margin','woopage-master'),
		'productsarchive_btn_margin_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-btype',
		__('Border Style','woopage-master'),
		'productsarchive_btn_btype_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bs',
		__('Border Size','woopage-master'),
		'productsarchive_btn_bs_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bors',
		__('Border Radius','woopage-master'),
		'productsarchive_btn_bors',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-bc',
		__('Border Color','woopage-master'),
		'productsarchive_btn_bc_cb',
		'productsarchive_single',
		'productsarchive-general-style');
	add_settings_field(
		'productsarchive-btn-iconc',
		__('Icon Color','woopage-master'),
		'productsarchive_btn_iconc_cb',
		'productsarchive_single',
		'productsarchive-general-style'
	);
	//------ General style controls end

	//------ Breadcrumb style controls start
	add_settings_field(
		'productsarchive-breadalign',
		__('Alignment','woopage-master'),
		'productsarchive_breadalign_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-text-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_text_color_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-text-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_text_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-size-control',
		__('Size','woopage-master'),
		'productsarchive_breadcrumb_size_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_breadcrumb_padding_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_breadcrumb_margin_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-breadcrumb-icon-control',
		__('Icon','woopage-master'),
		'productsarchive_breadcrumb_icon_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');
	add_settings_field(
		'productsarchive-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-breadcrumb-style');

		// Hover start
	add_settings_field(
		'productsarchive-breadcrumb-hover-color-control',
		__('Color','woopage-master'),
		'productsarchive_breadcrumb_hover_color_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-hover-style');
	add_settings_field(
		'productsarchive-breadcrumb-hover-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_breadcrumb_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-hover-style');
	add_settings_field(
		'productsarchive-breadcrumb-hover-size-control',
		__('Size','woopage-master'),
		'productsarchive_breadcrumb_hover_size_fld',
		'productsarchive_single',
		'productsarchive-breadcrumb-hover-style');
	//------ Breadcrumb style controls end

	//------ Stock or Not style controls start
	add_settings_field(
		'productsarchive-stockornotalign',
		__('Alignment','woopage-master'),
		'productsarchive_stockornotalign_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');
	add_settings_field(
		'productsarchive-stockornot-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_stockornot_color_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');
	add_settings_field(
		'productsarchive-stockornot-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_stockornot_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');
	add_settings_field(
		'productsarchive-stockornot-size-control',
		__('Size','woopage-master'),
		'productsarchive_stockornot_size_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');
	add_settings_field(
		'productsarchive-stockornot-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_stockornot_padding_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');
	add_settings_field(
		'productsarchive-stockornot-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_stockornot_margin_fld',
		'productsarchive_single',
		'productsarchive-stockornot-style');

		// Hover start
	add_settings_field(
		'productsarchive-stockornot-hover-color-control',
		__('Color','woopage-master'),
		'productsarchive_stockornot_hover_color_fld',
		'productsarchive_single',
		'productsarchive-stockornot-hover-style');
	add_settings_field(
		'productsarchive-stockornot-hover-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_stockornot_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-stockornot-hover-style');
	add_settings_field(
		'productsarchive-stockornot-hover-size-control',
		__('Size','woopage-master'),
		'productsarchive_stockornot_hover_size_fld',
		'productsarchive_single',
		'productsarchive-stockornot-hover-style');
	//------ Stock or Not style controls end

	//------ Sale Note style controls start
	add_settings_field(
		'productsarchive-salenotealign',
		__('Alignment','woopage-master'),
		'productsarchive_salenotealign_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');
	add_settings_field(
		'productsarchive-salenote-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_salenote_color_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');
	add_settings_field(
		'productsarchive-salenote-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_salenote_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');
	add_settings_field(
		'productsarchive-salenote-size-control',
		__('Size','woopage-master'),
		'productsarchive_salenote_size_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');
	add_settings_field(
		'productsarchive-salenote-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_salenote_padding_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');
	add_settings_field(
		'productsarchive-salenote-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_salenote_margin_fld',
		'productsarchive_single',
		'productsarchive-salenote-style');

		// Hover start
	add_settings_field(
		'productsarchive-salenote-hover-color-control',
		__('Color','woopage-master'),
		'productsarchive_salenote_hover_color_fld',
		'productsarchive_single',
		'productsarchive-salenote-hover-style');
	add_settings_field(
		'productsarchive-salenote-hover-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_salenote_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-salenote-hover-style');
	add_settings_field(
		'productsarchive-salenote-hover-size-control',
		__('Size','woopage-master'),
		'productsarchive_salenote_hover_size_fld',
		'productsarchive_single',
		'productsarchive-salenote-hover-style');
	//------ Sale Note style controls end

	//------ Featured img controls start
	add_settings_field(
		'productsarchive-fetuimg-align',
		__('Alignment','woopage-master'),
		'productsarchive_fetuimg_align_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-border-control',
		__('Border','woopage-master'),
		'productsarchive_fetuimg_border_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-border-clr-control',
		__('Color','woopage-master'),
		'productsarchive_fetuimg_border_clr_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-brdrtype-control',
		__('Border Type','woopage-master'),
		'productsarchive_fetuimg_brdrtype_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-bdrrds-control',
		__('Border Radius','woopage-master'),
		'productsarchive_fetuimg_bdrrds_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_fetuimg_padding_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	add_settings_field(
		'productsarchive-fetuimg-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_fetuimg_margin_fld',
		'productsarchive_single',
		'productsarchive-featuredimg-style');
	//------ Featured img controls end

	//------ Gallery imgs controls start
	add_settings_field(
		'productsarchive-gllimg-border-control',
		__('Border','woopage-master'),
		'productsarchive_gllimg_border_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	add_settings_field(
		'productsarchive-gllimg-border-clr-control',
		__('Color','woopage-master'),
		'productsarchive_gllimg_border_clr_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	add_settings_field(
		'productsarchive-gllimg-brdrtype-control',
		__('Border Type','woopage-master'),
		'productsarchive_gllimg_brdrtype_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	add_settings_field(
		'productsarchive-gllimg-bdrrds-control',
		__('Border Radius','woopage-master'),
		'productsarchive_gllimg_bdrrds_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	add_settings_field(
		'productsarchive-gllimg-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_gllimg_padding_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	add_settings_field(
		'productsarchive-gllimg-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_gllimg_margin_fld',
		'productsarchive_single',
		'productsarchive-galleryimgs-style');
	//------ Gallery imgs controls end

	//------ Product Title style controls start
	add_settings_field(
		'productsarchive-producttitle-align',
		__('Alignment','woopage-master'),
		'productsarchive_producttitle_align_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_producttitle_color_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_producttitle_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-size-control',
		__('Size','woopage-master'),
		'productsarchive_producttitle_size_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_producttitle_padding_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_producttitle_margin_fld',
		'productsarchive_single',
		'productsarchive-producttitle-style');
	add_settings_field(
		'productsarchive-producttitle-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_producttitle_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-producttitle-style');

		// Hover start
	add_settings_field(
		'productsarchive-producttitle-hover-color-control',
		__('Color','woopage-master'),
		'productsarchive_producttitle_hover_color_fld',
		'productsarchive_single',
		'productsarchive-producttitle-hover-style');
	add_settings_field(
		'productsarchive-producttitle-hover-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_producttitle_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-producttitle-hover-style');
	add_settings_field(
		'productsarchive-producttitle-hover-size-control',
		__('Size','woopage-master'),
		'productsarchive_producttitle_hover_size_fld',
		'productsarchive_single',
		'productsarchive-producttitle-hover-style');
	//------ Product Title style controls end

	//------ Product Reg Price style controls start
	add_settings_field(
		'productsarchive-productregprice-align',
		__('Alignment','woopage-master'),
		'productsarchive_productregprice_align_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_productregprice_color_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_productregprice_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-size-control',
		__('Size','woopage-master'),
		'productsarchive_productregprice_size_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_productregprice_padding_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_productregprice_margin_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_productregprice_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-productregprice-style');

		// Hover start
	add_settings_field(
		'productsarchive-productregprice-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_productregprice_hover_color_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_productregprice_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	add_settings_field(
		'productsarchive-productregprice-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_productregprice_hover_size_fld',
		'productsarchive_single',
		'productsarchive-productregprice-style');
	//------ Product Reg Price style controls end

	//------ Product Sale Product style controls start
	add_settings_field(
		'productsarchive-productsaleprice-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_productsaleprice_color_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_productsaleprice_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-size-control',
		__('Size','woopage-master'),
		'productsarchive_productsaleprice_size_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_productsaleprice_padding_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_productsaleprice_margin_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');

		// Hover start
	add_settings_field(
		'productsarchive-productsaleprice-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_productsaleprice_hover_color_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_productsaleprice_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	add_settings_field(
		'productsarchive-productsaleprice-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_productsaleprice_hover_size_fld',
		'productsarchive_single',
		'productsarchive-productsaleprice-style');
	//------ Product Sale Product style controls end

	//------ Product Categories style controls start
	add_settings_field(
		'productsarchive-productcategory-align',
		__('Alignment','woopage-master'),
		'productsarchive_productcategory_align_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_productcategory_color_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_productcategory_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-size-control',
		__('Size','woopage-master'),
		'productsarchive_productcategory_size_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_productcategory_padding_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_productcategory_margin_fld',
		'productsarchive_single',
		'productsarchive-productcategory-style');
	add_settings_field(
		'productsarchive-productcategory-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_productcategory_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-productcategory-style');

		// Hover start
	add_settings_field(
		'productsarchive-productcategory-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_productcategory_hover_color_fld',
		'productsarchive_single',
		'productsarchive-productcategory-hover-style');
	add_settings_field(
		'productsarchive-productcategory-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_productcategory_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-productcategory-hover-style');
	add_settings_field(
		'productsarchive-productcategory-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_productcategory_hover_size_fld',
		'productsarchive_single',
		'productsarchive-productcategory-hover-style');
	//------ Product Categories style controls end

	//------ Product Tags style controls start
	add_settings_field(
		'productsarchive-producttags-align',
		__('Alignment','woopage-master'),
		'productsarchive_producttags_align_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_producttags_color_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_producttags_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-size-control',
		__('Size','woopage-master'),
		'productsarchive_producttags_size_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_producttags_padding_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_producttags_margin_fld',
		'productsarchive_single',
		'productsarchive-producttags-style');
	add_settings_field(
		'productsarchive-producttags-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_producttags_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-producttags-style');

		// Hover start
	add_settings_field(
		'productsarchive-producttags-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_producttags_hover_color_fld',
		'productsarchive_single',
		'productsarchive-producttags-hover-style');
	add_settings_field(
		'productsarchive-producttags-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_producttags_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-producttags-hover-style');
	add_settings_field(
		'productsarchive-producttags-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_producttags_hover_size_fld',
		'productsarchive_single',
		'productsarchive-producttags-hover-style');
	//------ Product Tags style controls end

	// -------------********************** Related Product Style start
	//------ Featured img controls start
	add_settings_field(
		'productsarchive-relpro-fetuimg-align',
		__('Alignment','woopage-master'),
		'productsarchive_relpro_fetuimg_align_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-border-control',
		__('Border','woopage-master'),
		'productsarchive_relpro_fetuimg_border_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-border-clr-control',
		__('Color','woopage-master'),
		'productsarchive_relpro_fetuimg_border_clr_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-brdrtype-control',
		__('Border Type','woopage-master'),
		'productsarchive_relpro_fetuimg_brdrtype_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-bdrrds-control',
		__('Border Radius','woopage-master'),
		'productsarchive_relpro_fetuimg_bdrrds_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_relpro_fetuimg_padding_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	add_settings_field(
		'productsarchive-relpro-fetuimg-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_relpro_fetuimg_margin_fld',
		'productsarchive_single',
		'productsarchive-relpro-featuredimg-style');
	//------ Featured img controls end

	//------ Product Title style controls start
	add_settings_field(
		'productsarchive-relpro-producttitle-align',
		__('Alignment','woopage-master'),
		'productsarchive_relpro_producttitle_align_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_relpro_producttitle_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_relpro_producttitle_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-size-control',
		__('Size','woopage-master'),
		'productsarchive_relpro_producttitle_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_relpro_producttitle_padding_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_relpro_producttitle_margin_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_relpro_producttitle_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-style');

		// Hover start
	add_settings_field(
		'productsarchive-relpro-producttitle-hover-color-control',
		__('Color','woopage-master'),
		'productsarchive_relpro_producttitle_hover_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-hover-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-hover-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_relpro_producttitle_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-hover-style');
	add_settings_field(
		'productsarchive-relpro-producttitle-hover-size-control',
		__('Size','woopage-master'),
		'productsarchive_relpro_producttitle_hover_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-producttitle-hover-style');
	//------ Product Title style controls end

	//------ Related Product Reg Price style controls start
	add_settings_field(
		'productsarchive-relpro-productregprice-align',
		__('Alignment','woopage-master'),
		'productsarchive_relpro_productregprice_align_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_relpro_productregprice_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_relpro_productregprice_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-size-control',
		__('Size','woopage-master'),
		'productsarchive_relpro_productregprice_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_relpro_productregprice_padding_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_relpro_productregprice_margin_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-fontfamilly',
		__('Font Familly','woopage-master'),
		'productsarchive_relpro_productregprice_fontfamilly_cb',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');

		// Hover start
	add_settings_field(
		'productsarchive-relpro-productregprice-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_relpro_productregprice_hover_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_relpro_productregprice_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	add_settings_field(
		'productsarchive-relpro-productregprice-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_relpro_productregprice_hover_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productregprice-style');
	//------ Related Product Reg Price style controls end
	
	//------ Related Product Sale Product style controls start
	add_settings_field(
		'productsarchive-relpro-productsaleprice-color-control',
		__('Font Color','woopage-master'),
		'productsarchive_relpro_productsaleprice_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-bgcolor-control',
		__('BG Color','woopage-master'),
		'productsarchive_relpro_productsaleprice_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-size-control',
		__('Size','woopage-master'),
		'productsarchive_relpro_productsaleprice_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-padding-control',
		__('Padding','woopage-master'),
		'productsarchive_relpro_productsaleprice_padding_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-margin-control',
		__('Margin','woopage-master'),
		'productsarchive_relpro_productsaleprice_margin_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');

		// Hover start
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-color-control',
		__('Hover Color','woopage-master'),
		'productsarchive_relpro_productsaleprice_hover_color_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-bgcolor-control',
		__('Hover BG Color','woopage-master'),
		'productsarchive_relpro_productsaleprice_hover_bgcolor_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	add_settings_field(
		'productsarchive-relpro-productsaleprice-hover-size-control',
		__('Hover Size','woopage-master'),
		'productsarchive_relpro_productsaleprice_hover_size_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');

		// For try a noUiSlider
	add_settings_field(
		'productsarchive-nouislider',
		__('noUiSlider','woopage-master'),
		'productsarchive_try_nouislider_fld',
		'productsarchive_single',
		'productsarchive-relpro-productsaleprice-style');
	//------ Related Product Sale Product style controls end
	// -------------********************** Related Product Style end
	//***************---****** Style inputs end (Tab)
	#################---#######333 Settings field end