$(document).ready(function(){
  $('.image-slider-2').slick({
    slidesToShow:3,
    slidesToScroll:2,
    infinite:true,
    // autoplay:true,
    // autoplaySpeed:2000,
    draggable:false,
    arrows:true,
    vertical:true,
    prevArrow:`<button type='button' class='slick-prev slick-arrow pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>`,
    nextArrow:`<button type='button' class='slick-next slick-arrow pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>`,
    // dots:true,
    responsive:[
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,

        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
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
			