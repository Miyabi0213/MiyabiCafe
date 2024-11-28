jQuery("#js-drawer-icon").on("click", function(e){
  e.preventDefault();
  jQuery("#js-drawer-icon").toggleClass("is-checked");
  jQuery(".c-drawer-icon").toggleClass("is-checked");
  jQuery("#js-drawer-content").toggleClass("is-checked");
  jQuery(".backdrop").toggleClass("visible");
  const hidden = jQuery('body').css('overflow-y');
  if(hidden === 'hidden'){
    jQuery('body').css('overflow-y', '');
    jQuery(".p-header__logo").css('opacity', '1');

  }else{
    jQuery('body').css('overflow-y', 'hidden');
    jQuery('.p-header__logo').css('opacity', '0');
  }
});
jQuery("#js-drawer-content").on("click", function(e) {
  jQuery("#js-drawer-icon").removeClass("is-checked");
  jQuery(".c-drawer-icon").removeClass("is-checked");
  jQuery("#js-drawer-content").removeClass("is-checked");
  jQuery(".backdrop").removeClass("visible");
  jQuery('body').css('overflow-y', '');
  jQuery('.p-header__logo').css('opacity', '1');


});
jQuery("#js-overview").on("click", function(e) {
  jQuery("#js-drawer-icon").removeClass("is-checked");
  jQuery(".c-drawer-icon").removeClass("is-checked");
  jQuery("#js-drawer-content").removeClass("is-checked");
  jQuery(".backdrop").removeClass("visible");
  jQuery('body').css('overflow-y', '');
  jQuery('.p-header__logo').css('opacity', '1');


});
jQuery(".backdrop").on("click", function(e) {
  jQuery("#js-drawer-icon").removeClass("is-checked");
  jQuery(".c-drawer-icon").removeClass("is-checked");
  jQuery("#js-drawer-content").removeClass("is-checked");
  jQuery(this).removeClass("visible");
  jQuery('body').css('overflow-y', '');
  jQuery('.p-header__logo').css('opacity', '1');


});



jQuery(document).ready(function(){
  //menu genre buttons
  jQuery(".p-page-menu__button").on("click", function(e){
    jQuery(".p-page-menu__button").removeClass("is-active");
    jQuery(this).addClass("is-active");
  });
});


jQuery(document).ready(function(){
  jQuery(window).on("scroll", function(){
    const scroll = jQuery(window).scrollTop();
    // if(jQuery(window).scrollTop() >= 300){
    if(scroll >= 300){
        jQuery("#js-to-top").addClass("is-show");
      if(scroll >= 735){
        jQuery(".p-drawer-icon").addClass("is-show-menu");
      }else{
        jQuery(".p-drawer-icon").removeClass("is-show-menu");
      }
    }else{
      jQuery("#js-to-top").removeClass("is-show");
      jQuery(".p-drawer-icon").removeClass("is-show-menu");
    }
  });
});

jQuery('a[href^="#"]').on('click', function(e) {
  e.preventDefault();
  const speed = 300;
  const targetId = jQuery(this).attr('href').trim();

  if (targetId === "#") {
    jQuery('html, body').animate({
        scrollTop: 0
    }, speed);
  } else {
    const target = jQuery(targetId);
    if (target.length) {
      jQuery('html, body').animate({
          scrollTop: target.offset().top
      }, speed);
    }
  }
});

const swiperMv = new Swiper('.p-fv__swiper', {
  loop: true,
  grabCursor: true,
  centeredSlides: true ,
  speed: 2000,
  autoplay: {
    delay:6000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
  },
  effect: 'fade', // フェード切り替えを有効化
  fadeEffect: {
    crossFade: true, // フェード中にスライドが重なるかどうか
  },
});


