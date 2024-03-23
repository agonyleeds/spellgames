<?php 
    include '../core.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-busket.css">
    <title>Корзина</title>
</head>
<body>
    <?php 
        include "../header.php";
    ?>

     <!-- модальное окно -->
    <div class="modal-basket">
        <div class="modal-basket-container">
            <div class="main-modal__h-input-block">
                <div class="main-modal-exit__input">
                    <input type="button" id="modal-exit" onclick="exit()" value="Закрыть">
                </div>
            </div>
            <div class="modal-basket-text">
                <p>Спасибо за заказ</p>
                <p>Через 15 минут мы Вам перезвоним!</p>
            </div>
        </div>            
    </div>
<main class="main">
    <div class="container">
        <div class="main-basket">
            <div class="main-basket__h">
                <h1>КОРЗИНА</h1>
            </div>
            <div class="main-basket-block">
                <div class="main-basket-left">
                    <div class="main-basket-left-block">
                        <!-- Отсюда начинается карточка товара -->
                        <div class="main-basket-left-item">
                            <div class="main-basket-left-item__img">
                                <img src="../assets/img/basket-item.png" alt="" id="basket-item">
                            </div>
                            <div class="main-basket-left-item__h3">
                                <h3>Apple IPhone 11</h3>
                            </div>
                            <div class="main-basket-left-item-block-counter">
                                <div class="main-basket-left-item-block__button">
                                    <button id="counter-less">
                                        -
                                    </button>
                                    <span id="counter">
                                        1
                                    </span>
                                    <button id="counter-more">
                                        +
                                    </button>
                                </div>
                                <div class="main-basket-left-item-count">
                                    <p>169$</p>
                                </div>
                            </div>
                            <div class="main-basket-left-item-delete">
                                <div class="main-basket-left-item-delete__button">
                                    <button id="busket-delete">
                                        Удалить товар
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- А здесь заканчивается -->
                        <div class="main-basket-left-item">
                            <div class="main-basket-left-item__img">
                                <img src="../assets/img/basket-item.png" alt="" id="basket-item">
                            </div>
                            <div class="main-basket-left-item__h3">
                                <h3>Apple IPhone 11</h3>
                            </div>
                            <div class="main-basket-left-item-block-counter">
                                <div class="main-basket-left-item-block__button">
                                    <button id="counter-less">
                                        -
                                    </button>
                                    <span id="counter">
                                        1
                                    </span>
                                    <button id="counter-more">
                                        +
                                    </button>
                                </div>
                                <div class="main-basket-left-item-count">
                                    <p>169$</p>
                                </div>
                            </div>
                            <div class="main-basket-left-item-delete">
                                <div class="main-basket-left-item-delete__button">
                                    <button id="busket-delete">
                                        Удалить товар
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-basket-right">
                    <div class="main-basket-right__h2">
                        <h2>Оформление заказа</h2>
                    </div>
                    <div class="main-basket__p">
                        <p>2 товара</p>
                        <p>338$</p>
                    </div>
                    <hr>
                    <div class="main-basket__p">
                        <p>Скидка</p>
                        <p>Нет</p>
                    </div>
                    <hr>
                    <div class="main-basker-right__p__input">
                        <p>Выберите город и способ получения</p>
                    </div>
                   <form action="">
                       <div class="main-basket-right-input">
                       <select name="city" id="city">
                            <option value="" disabled>Выберите город</option>
                            <option value="">Омск</option>
                            <option value="">Москва</option>
                            <option value="">Григорий</option>
                       </select>
                        </div>
                        <div class="main-basket-delivery-block">
                            <div class="delivery-block-pickup">
                                <input type="radio" name="delivery" id="pickup">
                                <label for="pickup">Самовывоз</label>
                            </div>
                            <div class="delivery-block-delivery">
                                <input type="radio" name="delivery" id="delivery">
                                <label for="delivery">Доставка</label>
                            </div>
                        </div>
                    <div class="main-basket-delivery-city__input">
                        <input type="text" name="city_delivery" id="city_delivery" placeholder="Введите адрес доставки">
                    </div>
                    <div class="main-basket-payment">
                        <div class="main-basket-payment__p">
                            <p>Оплата заказа</p>
                        </div>
                        <div class="main-basket-payment-card">
                            <div class="payment-card-left">
                                <div class="payment-card-left-number__input">
                                    <input type="number" name="number-card" id="number-card" placeholder="Номер карты" >
                                </div>
                                <div class="payment-card-left-date__input">
                                    <input type="number" name="date-card" id="date-card" placeholder="XX/XX" >
                                </div>
                                <div class="payment-card-left-holder-block">
                                <div class="payment-card-left-holder__input">
                                    <input type="text" name="holder-card" id="holder-card" placeholder="Владелец карты">    
                                </div>
                                <div class="payment-card-left-holder__img">
                                    <img src="../assets/img/card_mir.png" alt="">
                                </div>
                            </div>
                            </div>
                            <div class="payment-card-right">
                                <div class="payment-card-right__span">
                                    <span></span>
                                </div>
                                <div class="payment-card-right-cvc__input">
                                    <input type="number" name="cvc" id="cvc" placeholder="cvc">
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="main-delivary-block">
                        <div class="main-delivary__p">
                            <p>Доставка</p>
                        </div>
                        <div class="main-delivary-cost__p">
                            <p>10$</p>
                        </div>
                    </div>
                    <hr>
                    <div class="main-busket-total-block">
                        <div class="main-busket-total__h">
                            <h1>Итого</h1>
                        </div>
                        <div class="main-busket-total__count">
                            <h1>348$</h1> 
                        </div>
                    </div>
                    <div class="main-busket-consent">
                        <input type="checkbox" name="consent" id="consent">
                        <label for="consent" id="consent__label"> Я даю согласие на обработку моих персональных данных согласно <font color="#C14231"> политике конфиденциальности</font></label>
                    </div>
                    <div class="main-busket-order">
                        <div class="main-busket-order__button">
                            <button id="busket-order" onclick="order()"> Сделать заказ</button>
                        </div>
                    </div>
                   </form>
                </div>
                
            </div>
            <div class="main-hits">
                <div class="main-hits__h">
                    <h1>Возможно вас заинтересует</h1>
                </div>
                <div class="main-hits-block">
                    
                        <div class="grid-catalog">
                            <div class="grid-catalog__img">
                                <img src="../assets/img/grid-catalog.png" alt="" id="grid-catalog">
                            </div>
                            <div class="grid-catalog-middle">
                                <div class="grid-catalog__h2">
                                    <h3>Apple IPhone 11</h3>
                                </div>
                                <div class="grid-catalog__button-color">
                                    <button id="color-black"></button>
                                    <button id="color-two"></button>
                                    <button id="color-three"></button>
                                </div>
                            </div>
                            <div class="grid-catalog-bottom">
                                <div class="grid-catalog__button-busket">
                                    <button id="btn-basket">
                                        В корзину
                                    </button>
                                </div>
                                <div class="grid-catalog__p-count">
                                    <p>160$</p>
                                </div>
                            </div>
                            <div class="grid-catalog__a-more">
                                <a href="../product/product.php" id="grid-catalog__a-more">Подробнее</a>
                            </div>
                        </div>
                        <div class="grid-catalog">
                            <div class="grid-catalog__img">
                                <img src="../assets/img/grid-catalog.png" alt="" id="grid-catalog">
                            </div>
                            <div class="grid-catalog-middle">
                                <div class="grid-catalog__h2">
                                    <h3>Apple IPhone 11</h3>
                                </div>
                                <div class="grid-catalog__button-color">
                                    <button id="color-black"></button>
                                    <button id="color-two"></button>
                                    <button id="color-three"></button>
                                </div>
                            </div>
                            <div class="grid-catalog-bottom">
                                <div class="grid-catalog__button-busket">
                                    <button id="btn-basket">
                                        В корзину
                                    </button>
                                </div>
                                <div class="grid-catalog__p-count">
                                    <p>160$</p>
                                </div>
                            </div>
                            <div class="grid-catalog__a-more">
                                <a href="../product/product.php" id="grid-catalog__a-more">Подробнее</a>
                            </div>
                        </div>
                        <div class="grid-catalog">
                            <div class="grid-catalog__img">
                                <img src="../assets/img/grid-catalog.png" alt="" id="grid-catalog">
                            </div>
                            <div class="grid-catalog-middle">
                                <div class="grid-catalog__h2">
                                    <h3>Apple IPhone 11</h3>
                                </div>
                                <div class="grid-catalog__button-color">
                                    <button id="color-black"></button>
                                    <button id="color-two"></button>
                                    <button id="color-three"></button>
                                </div>
                            </div>
                            <div class="grid-catalog-bottom">
                                <div class="grid-catalog__button-busket">
                                    <button id="btn-basket">
                                        В корзину
                                    </button>
                                </div>
                                <div class="grid-catalog__p-count">
                                    <p>160$</p>
                                </div>
                            </div>
                            <div class="grid-catalog__a-more">
                                <a href="../product/product.php" id="grid-catalog__a-more">Подробнее</a>
                            </div>
                        </div>
                        <div class="grid-catalog">
                            <div class="grid-catalog__img">
                                <img src="../assets/img/grid-catalog.png" alt="" id="grid-catalog">
                            </div>
                            <div class="grid-catalog-middle">
                                <div class="grid-catalog__h2">
                                    <h3>Apple IPhone 11</h3>
                                </div>
                                <div class="grid-catalog__button-color">
                                    <button id="color-black"></button>
                                    <button id="color-two"></button>
                                    <button id="color-three"></button>
                                </div>
                            </div>
                            <div class="grid-catalog-bottom">
                                <div class="grid-catalog__button-busket">
                                    <button id="btn-basket">
                                        В корзину
                                    </button>
                                </div>
                                <div class="grid-catalog__p-count">
                                    <p>160$</p>
                                </div>
                            </div>
                            <div class="grid-catalog__a-more">
                                <a href="../product/product.php" id="grid-catalog__a-more">Подробнее</a>
                            </div>
                        </div>
                        <div class="grid-catalog__a-catalog">
                            
                             <a href="" id="grid-catalog__a-catalog">Каталог</a>   
                           
                        </div>
            
                </div>
            </div>
        </div>
    </div>
</main>
    <?php 
        include "../footer.php";
    ?>
<script src="components/scroll/aos.js"></script>
<script src="script-modal-basket.js"></script>
</body>
</html>