$(document).ready(function () {
    $('.cliders').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:false,
        asNavFor:".cliders-two",
responsive: [

   {
    breakpoint: 1172,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
      }
   },
   {
   breakpoint: 958,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
      }
    },
    {
    breakpoint: 580,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        dots: true,
        arrows: false,
      }
    }
]    
})

$(".cliders-two").slick({
    infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows:true,
        centerMode: true,
        centerPadding: '60px',
        focusOnSelect: true,
        asNavFor:".cliders",
    prevArrow:'<button class="btn slider-btn slider-prev"><img src="../assets/img/prev.png" alt=""></button>',
    nextArrow:'<button class="btn slider-btn slider-next"><img src="../assets/img/next.png" alt=""></button>',
        autoplay: true,
  autoplaySpeed: 5000,
})
});

const slider = document.querySelector('.swiper-container');

let mySwiper = new Swiper(slider, {
	slidesPerView: 3,
	spaceBetween: 15,
	loop: true,
	navigation: {
		nextEl: '.swiper-button-do',
		prevEl: '.swiper-button-let',
	},
})
