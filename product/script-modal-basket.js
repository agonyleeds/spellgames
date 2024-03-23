const basket = document.querySelector('.modal-basket');
const heade = document.querySelector('.header');
const mai = document.querySelector('.main');
const foot = document.querySelector('.footer');
const addModal = document.getElementById('busket-order');

function order() {
     basket.style.display = "flex";
    basket.style.position = "fixed";
     man.style.backgrount = "black";
     man.style.opacity = 0.2;
     fot.style.opacity = 0.2;
     hed.style.display = "block";
     man.style.pointer_events = "none";
     
}
function exit(){
    basket.style.display = "none";
}