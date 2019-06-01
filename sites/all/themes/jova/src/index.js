
// Import npm libraries
import 'jquery-ui/ui/core'
import 'jquery-ui/ui/widgets/tabs'
import 'magnific-popup'
import 'sweet-dropdown/dist/dev/jquery.sweet-dropdown'

import Carousel from './scripts/Carousel'
import './scripts/scrollToTop'

// Import styles
import 'jquery-ui/themes/base/core.css'
import 'jquery-ui/themes/base/theme.css'
import 'jquery-ui/themes/base/tabs.css'
import 'magnific-popup/src/css/main.scss'
import 'sweet-dropdown/src/scss/sweet-dropdown.scss'
import './sass/main.scss'

// Preloader for all pages
window.onload = function (){
  const preloader = document.getElementById('main_preloader')
  preloader.style.opacity = 0
  preloader.style.zIndex = -1000
}

$(document).ready(() => {

  // Set carousels
  const carousel = new Carousel()
  carousel.productCarousel('#product_carousel')
  carousel.productListCarousel('.karusele')


  // Categories Sidebar Menu
  const catsSidebar = $('#categories_sidebar')

  // Set active menu open
  catsSidebar.find('.active-trail').addClass('open')

  // Categories menu expand
  catsSidebar.find('.expand-icon').each((i, el) => {

    $(el).click(() => {
      $(el).closest('.expanded').toggleClass('open')
      console.log()
    })
  })


  // // Set active parent menu items
  // catsMenu.children('.active-trail').addClass('active-parent')

  // // Wrapp and appent arrow icon to menu item
  // catsMenu.find('.expanded').children('a').wrap('<div class="main-kat-link-wrap"></div>')
  // $('<i class="fa fa-chevron-right"></i>').appendTo('.main-kat-link-wrap')

  // // On expand arrow click expand child menu
  // catsMenu.find('.expanded').not('.active-trail').each((i, el) => {
  //   $(el).click(() => {
  //     var menuHeight = $(el).find('.side-menu').children('li').length
  //     var toggleHeight = $(el).find('.side-menu').height() == 0 ? 30*menuHeight+'px' : '0px'
  //     $(el).find('.side-menu').animate({ maxHeight: toggleHeight })

  //     $(HTMLAudioElement).toggleClass('clicked')

  //   })
  // })


  // Magnific Popup for certifications
  $('.cert-popup-wrap').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{
      enabled:true
    }
  })

  // Magnific Popup for product images
  $('.prod-img-popup').magnificPopup({
    delegate: 'a',
    type: 'image',
    gallery:{
      enabled:true
    }
  })

  // Product tabs
  $('.node-product-type #tabs').tabs({
    hide: { effect: 'fade', duration: 150 },
    show: { effect: 'fade', duration: 150 }
  })

  $('.field-name-commerce-order-total .component-type-commerce-price-formatted-amount .component-title')
    .text('Užsakymo Suma')

  $('.pager li').on('click', () => {
    product_boxes()
  })

  // Scroll to top
  $('#scroll-to-top').scrollToTop({
    offset: 500,
    speed: 500,
    duration: 500,
    hoverDuration : 150,
    size: 60,
    bottom : 30,
    right: 30,
    hoverBgColor : 'rgba(194, 212, 78, 1)'
  })

})

function product_boxes(name) {
  var maxheight = 0; var count = 0
  $('.prod-block').each(() => {
    if($(this).height() > maxheight) {
      maxheight = $(this).height()
    }
    count++
  })
  $('.prod-block').css({'height': maxheight+'px'})
}
