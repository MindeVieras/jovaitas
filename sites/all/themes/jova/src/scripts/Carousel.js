
import 'slick-carousel'
import 'slick-carousel/slick/slick.scss'

class Carousel {

  productCarousel(selector) {

    // Product carousel slider
    $(selector).each((i, el) => {
      
      $(el).slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        prevArrow: '<div class="carousele-prev carousele-arrow"><i class="fa fa-chevron-left"></i></div>',
        nextArrow: '<div class="carousele-next carousele-arrow"><i class="fa fa-chevron-right"></i></div>'
      })

    })
  }

  productListCarousel(selector) {

    // Product carousel slider
    $(selector).each((i, el) => {
      
      $(el).slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        prevArrow: '<div class="carousele-prev carousele-arrow"><i class="fa fa-chevron-left"></i></div>',
        nextArrow: '<div class="carousele-next carousele-arrow"><i class="fa fa-chevron-right"></i></div>',
        appendArrows: $(el).parent().find('.karusele-arrows'),
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      })

    })
  }

}

export default Carousel
