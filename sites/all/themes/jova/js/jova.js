$ = jQuery;

$(document).ready(function() {
  
  $('#block-menu-menu-kategorijos .content > .side-menu').children('.active-trail').addClass('actv-parent');
  $('#block-menu-menu-kategorijos').find('.expanded').children('a').wrap('<div class="main-kat-link-wrap"></div>');
  $('<i class="fa fa-chevron-right"></i>').appendTo('.main-kat-link-wrap');

  $('#block-menu-menu-kategorijos').find('.expanded').not('.active-trail').click(function(){
    var menuHeight = $(this).find('.side-menu').children('li').length;
    console.log(menuHeight);
    var toggleHeight = $(this).find('.side-menu').height() == 0 ? 30*menuHeight+"px" : "0px";
    $(this).find('.side-menu').animate({ maxHeight: toggleHeight });

    $(this).toggleClass('clicked');

  });

  $('.cert-popup-wrap').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery:{
      enabled:true
    }
    // other options
  });

  $('.prod-img-popup').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{
      enabled:true
    }
    // other options
  });

  $( function() {
    $( ".node-product-type #tabs" ).tabs({
      hide: { effect: "fade", duration: 150 },
      show: { effect: "fade", duration: 150 }
    });
  });


  $('.field-name-commerce-order-total .component-type-commerce-price-formatted-amount .component-title').text('Užsakymo Suma');

  $('.owl-karusele').owlCarousel({

    // Most important owl features
    items : 3,
    itemsCustom : false,
    itemsDesktop : [1199,3],
    itemsDesktopSmall : [980,3],
    itemsTablet: [768,2],
    itemsTabletSmall: false,
    itemsMobile : [479,1],
    singleItem : false,
    itemsScaleUp : false,

    //Basic Speeds
    slideSpeed : 200,
    paginationSpeed : 800,
    rewindSpeed : 1000,

    //Autoplay
    autoPlay : false,
    stopOnHover : false,

    // Navigation
    navigation : true,
    navigationText : ["<",">"],
    rewindNav : true,
    scrollPerPage : false,

    //Pagination
    pagination : false,

    // Responsive
    responsive: true,
    responsiveRefreshRate : 200,
    responsiveBaseWidth: window,

    // CSS Styles
    baseClass : "owl-carousel",
    theme : "owl-theme",

    //Lazy load
    lazyLoad : false,
    lazyFollow : true,
    lazyEffect : "fade",

    //Auto height
    autoHeight : true,

    //JSON
    jsonPath : false,
    jsonSuccess : false,

    //Mouse Events
    dragBeforeAnimFinish : true,
    mouseDrag : true,
    touchDrag : true,

    //Transitions
    transitionStyle : false,

    // Other
    addClassActive : false,

    //Callbacks
    beforeUpdate : false,
    afterUpdate : false,
    beforeInit: false,
    afterInit: false,
    beforeMove: false,
    afterMove: false,
    afterAction: false,
    startDragging : false,
    afterLazyLoad : false,

  });

  $('.prod-img-popup').owlCarousel({

    navigation : true,
    navigationText : ["<",">"],
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem: true,
    rewindNav : false,

  });

  $('.pager li').on("click", function(){
    product_boxes();
  })





});

function product_boxes(name) {
  var maxheight = 0; var count = 0;
  $('.prod-block').each(function() {
    if($(this).height() > maxheight) {
      maxheight = $(this).height();
    }
    count++;
  });
  console.log(name + "- Maxi Height: " + maxheight);
  $('.prod-block').css({"height": maxheight+"px"});
  /*$('.prod-block').each(function() {
    $(this).height(maxheight);
    console.log("change "+count+" to " + maxheight);
    count++;
  });*/
}


$(function() {
    $("#scroll-to-top").illBeBack({
		offset: 500,
		speed: 500,
		duration: 500,
    hoverDuration : 150,
		size: 60,
		bottom : 30,
		right: 30,
		hoverBgColor : 'rgba(194, 212, 78, 1)'
    });
});
