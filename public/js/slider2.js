$(document).ready(function(){
  $('.image-slider-2').slick({
    slidesToShow:2,
    slidesToScroll:2,
    infinite:true,
    autoplay:true,
    autoplaySpeed:2000,
    draggable:false,
    arrows:true,
    vertical:true,
    prevArrow:`<button type='button' class='slick-prev slick-arrow pull-left'><i class="fa fa-angle-up"></i></button>`,
    nextArrow:`<button type='button' class='slick-next slick-arrow pull-right'><i class='fa fa-angle-down' aria-hidden='true'></i></button>`,
    // dots:true,
    responsive:[
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,

        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          vertical:false
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows:false,
          infinite:false
        }
      }
    ]
  });
});
			