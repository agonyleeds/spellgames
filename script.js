
function pic() {

	var bgm= [
        'assets/img/1.jpg',
        'assets/img/2.jpg',
        'assets/img/3.jpg',
        'assets/img/4.jpg',
        'assets/img/5.jpg',
        'assets/img/6.jpg',
        'assets/img/7.jpg',
        'assets/img/8.jpg',
        'assets/img/9.jpg',
        'assets/img/10.jpg',
        'assets/img/11.jpg',
        'assets/img/12.jpg',
        'assets/img/13.jpg',
        'assets/img/14.jpg',
        'assets/img/15.jpg',
        'assets/img/16.jpg',
        'assets/img/17.jpg'
    ];

$('.random_bg').css({
	'background':'url('+ bgm[Math.floor(Math.random()* bgm.length )]+')no-repeat',
	'background-position': '100% ',
	'background-size':'cover'
});
	// body...
}


var randomChange = document.getElementById('randomChange'), 
images = ['assets/img/1.jpg','assets/img/2.jpg','assets/img/3.jpg','assets/img/4.jpg','assets/img/5.jpg','assets/img/6.jpg','assets/img/7.jpg','assets/img/8.jpg','assets/img/9.jpg','assets/img/10.jpg','assets/img/11.jpg','assets/img/12.jpg','assets/img/13.jpg','assets/img/14.jpg','assets/img/15.jpg','assets/img/16.jpg','assets/img/17.jpg'];
// alert(images);
var imgCount = images.length
//alert(imgCount)
var
number = Math.floor(Math.random() *
imgCount);
//alert(numben)
window.onload = function(){

randomChange.style.backgroundImage = 'url('+images[number]+')'
}

AOS.init();




const rangeSlider = document.getElementById('slider-track');
if (rangeSlider) {
    noUiSlider.create(rangeSlider, {
      start: [minPrice, maxPrice],
      connect: true,
      step:50,
      range: {
          'min': [minPrice],
          'max': [maxPrice]
      }
  });

const input0 = document.getElementById('range_left');
const input1 = document.getElementById('range_right');

   const inputs = [input0, input1];
  rangeSlider.noUiSlider.on('update', function(values, handle){
inputs[handle].value = Math.round(values[handle]);
  });
  const setRangeSlider = (i, value) => {
    let arr = [null,null];
    arr[i] = value;
    rangeSlider.noUiSlider.set(arr);
  };

  inputs.forEach((el, index) => {
    el.addEventListener('change', (e) => {
setRangeSlider(index, e.currentTarget.value);
    });
  })

  }

  // fdgdfg

  $(document).on('click','.burger', function(){
    $("header nav").toggleClass('active');
});

$("#phone").mask("+7(999)-999-99-99");



let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 9000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 9000);

    
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};



