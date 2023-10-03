

function commnForAll(commnClass) {


  let mySwiper = commnClass.querySelector('.mySwiper');
  let mySwiper2 = commnClass.querySelector('.mySwiper2');

  var swiper = new SwiperBWDSPX(mySwiper, {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 8,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new SwiperBWDSPX(mySwiper2, {
    slidesPerView: 1,
    loop: true,
    thumbs: {
      swiper: swiper,
    },
  });

  // related product
  var swiper = new SwiperBWDSPX(".related-mySwiper", {
    spaceBetween: 25,
    slidesPerView: 4,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });



// Quentity
  
  let minus_button = commnClass.querySelector('.bwdspx-minusx');
  let plus_button = commnClass.querySelector('.bwdspx-plusx');
  let input_button = commnClass.querySelector('.bwdspx-quentity-box input');
  let a = 1;
  plus_button.addEventListener('click', function() {
    a++;
    if( a < 10 ) {
      input_button.value = "0" + a;
    }else {
      input_button.value = a;
    }
  });
  minus_button.addEventListener('click', function() {
    if( a > 1 ) {
      a--;
      if( a < 10 ) {
        input_button.value = "0" + a;
      }else {
        input_button.value = a;
      }
    }
  });


  

  // let des_rev = commnClass.querySelectorAll('.tab-navigation li');
  // des_rev.forEach(element => {

  //   let tabPane = commnClass.querySelectorAll('.tab-pane');

  //   element.addEventListener('click', function() {

  //     des_rev.forEach(elements => {
  //       elements.classList.remove('active');
  //     });
  //     this.classList.add('active');


    
  //     const bata_tab = element.getAttribute('data-tab');

  //     tabPane.forEach( dataVal => {
  //       const bata_value = dataVal.getAttribute('data-val');

  //       if( bata_tab == bata_value ) {
  //         dataVal.classList.add('active');
  //         console.log('ok1');
  //       }else {
  //         dataVal.classList.remove('active');
  //         console.log('ok2');
  //       }
  //     })
      
  //   });




  //   // tabPane.forEach(elementss => {
  //   //   elementss.classList.remove('active');
  //   // });

  // });

}



// for review and desc tab
// This script for tab
jQuery(document).ready(function($) {
  $('.tab-navigation a').click(function(e) {
    e.preventDefault();
    var tabId = $(this).attr('href');
    $('.tab-navigation li').removeClass('active');
    $(this).parent('li').addClass('active');
    $('.tab-content .tab-pane').removeClass('active');
    $(tabId).addClass('active');
  });
});

const mainWrap = document.querySelectorAll('.bwdspx-single-product-main');
for (const element of mainWrap) {
  commnForAll(element);
}
