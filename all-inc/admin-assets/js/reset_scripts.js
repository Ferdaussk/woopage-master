
// Function to create and show the custom dialog
  function checkReset() {
    var modalHtml = `
      <div class="modal productarchive_sk1" id="customAlertModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <h5>Are you sure? You want to reset all settings?</h5>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" onclick="resetFields(); closeModal()">Yes</button>
              <button class="btn btn-secondary" onclick="closeModal()">No</button>
            </div>
          </div>
        </div>
      </div>
    `;

    // Append the custom dialog HTML to the body
    $('body').append(modalHtml);

    // Show the custom dialog
    $('#customAlertModal').modal('show');
  }

  // Function to reset or clear input fields
  function resetFields() {
    var theName = 'productsarchive';
    // This reset is for all settings
    $('#'+theName+'-enable-product-single-page, '+
      '#'+theName+'-tags-check-gallery, '+
      '#'+theName+'-relpro-dsc-check-gallery'
    ).prop('checked', false);
    $('#'+theName+'-select-preset-single-product').val('default');
    $('#'+theName+'-breadcrumb-check-gallery, '+
      '#'+theName+'stock-check-gallery, '+
      '#'+theName+'-sale-check-gallery, '+
      '#'+theName+'-featured-img-check-gallery, '+
      '#'+theName+'-gallery-img-check-gallery, '+
      '#'+theName+'-title-check-gallery, '+
      '#'+theName+'-reg-price-check-gallery, '+
      '#'+theName+'-short-description-check-gallery, '+
      '#'+theName+'-categories-check-gallery, '+
      '#'+theName+'-quantity-check-gallery, '+
      '#'+theName+'-addtocart-check-gallery, '+
      '#'+theName+'-description-check-gallery, '+
      '#'+theName+'-related-products-check-gallery, '+
      '#'+theName+'-relpro-toptile-check-gallery, '+
      '#'+theName+'-relpro-prodimg-check-gallery, '+
      '#'+theName+'-relpro-imglnk-check-gallery, '+
      '#'+theName+'-relpro-prodtitle-check-gallery, '+
      '#'+theName+'-relpro-titlelnk-check-gallery, '+
      '#'+theName+'-relpro-prodpric-check-gallery, '+
      '#'+theName+'-relpro-button-check-gallery'
    ).prop('checked', true);
    // Settings
    $('#'+theName+'-relpro-count-gallery').val('3');
    $('#'+theName+'-relpro-excdpro-gallery').val('');
    $('#'+theName+'-relpro-dscwordl-gallery').val('10');
    $('#'+theName+'-relpro-dscind-gallery').val('...');
    // Style
    $('#'+theName+'-general-style-fsize').val('14');
    $('#'+theName+'-general-title-clr').val('#8f8f8f');
  }
  

  // Function to close the custom dialog
  function closeModal() {
    // Hide and remove the custom dialog from the DOM
    $('#customAlertModal').modal('hide');
    $('#customAlertModal').remove();
  }
// in the resetFields function has a lot of document.getElementById()
// is it possible to make it more short and easy?