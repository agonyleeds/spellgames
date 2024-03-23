const modal = document.querySelector('.main-modal');

const hed = document.querySelector('.header');
const man = document.querySelector('.main');
const fot = document.querySelector('.footer');

const addModal = document.getElementById('main-middle-right-reviews');
const exitModal = document.getElementById('modal-exit');

function add() {
     modal.style.display = "flex";
     modal.style.position = "fixed";
     man.style.backgrount = "black";
     man.style.opacity = 0.2;
     fot.style.opacity = 0.2;
     hed.style.display = "block";
     man.style.pointer_events = "none";
     
}
function exit(){
    modal.style.display = "none";
    man.style.opacity = 1;
    fot.style.opacity = 1;
    
}
