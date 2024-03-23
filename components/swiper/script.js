const slider = document.querySelector('.swiper-container');

let mySwiper = new Swiper(slider, {
	slidesPerView: 2,
	spaceBetween: 10,
	loop: true,
	navigation: {
		nextEl: '.swiper-button-do',
		prevEl: '.swiper-button-let',
	},
})