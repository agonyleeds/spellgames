<?php 
    include '../core.php';
    $id = $_GET['id'];
    $result =  mysqli_query($link, "SELECT * FROM `products` WHERE id = '$id'");
    $product = mysqli_fetch_array($result);
    
    $productReviews = mysqli_query($link, "SELECT * FROM `reviews` WHERE product_id = '$id'");
    if(!$product['count_reviews'] == 0){
        $productPoint = $product['point']/$product['count_reviews'];
        $productPoint = number_format($productPoint,2);
    }
    else{
        $productPoint = '?';
    }
    $products = mysqli_query($link, "SELECT `products`.*, `product_jeanre`.*, `kategories`.* FROM `products`
       
        LEFT JOIN `product_jeanre` ON `product_jeanre`.`product_id` = `products`.`id` 
        LEFT JOIN `kategories` ON `products`.`kategory_id` = `kategories`.`id`
        GROUP BY `products`.`id` ORDER BY `products`.`point`/ `products`.`count_reviews` DESC LIMIT 4
    ");

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/swiper/swiper.min.css">
    <link rel="stylesheet" href="../components/slider/css/slick.css">
    <link rel="stylesheet" href="../components/slider/css/styl.css">
    <!-- <link rel="stylesheet" href="../components/scroll/aos.css"> -->
    <link rel="stylesheet" href="../style.css">
    <title><?=$product['name']?></title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
    <!-- модальное окно -->
    <div class="main-modal">
        <div class="main-modal-container">
            <div class="main-modal__h-input-block">
                <div class="main-modal-exit__input">
                    <input type="button" id="modal-exit" value="Закрыть" onclick="exit()">
                </div>
                <div class="main-modal__h">
                    <h3>Напишите свой отзыв</h3>
                </div>
            </div>

            <!-- Форма отзыва  -->
            <form action="../addReview.php" method="post">
                <div class="main-modal-name">
                    <input type="hidden" name="product_id" value="<?=$id?>">
                    <input type="text" name="review_author" id="modal-name" placeholder="Ваше имя">
                </div>
                <div class="main-modal-text">
                    <textarea name="review_desc" id="modal-text"  placeholder="Текст отзыва"></textarea>
                </div>
                <div class="main-modal__h">
                    <h3 style="margin: 0px;">Оцените товар</h3>
                </div>
                <select name="product_point" id="">
                    <option value="1">★</option>
                    <option value="2">★★</option>
                    <option value="3">★★★</option>
                    <option value="4">★★★★</option>
                    <option value="5">★★★★★</option>
                </select>

              
                
                <div class="main-modal__button">
                    <button id="modal-add" name="modal-add" >Добавить отзыв</button>
                </div>
            </form>
            <!-- Форма отзыва  -->

        </div>          
    </div>
    <!-- конец модального окна -->
    <div class="wrapper">
        <div class="main_product_window">
            <div class="info_product">
                <div class="product_poster"><img src="../assets/upload_images/<?=$product['img']?>" alt="" class="prosuct_poster_img"></div>
                <div class="product_name1"><?=$product['name']?></div>
                <div class="product_price price"><?=$product['price']?><span id="span_valute">₽</span></div>
                <div class="description_product_small">
                        <div class="small">
                            <p class="p_small"  for="">Разработчик:</p> 
                            <label class="label_small" for=""><?=$product['diagonal']?></label>
                        </div>
                        
                        <div class="small">
                            <p class="p_small"  for="">Издатель:</p> 
                            <label class="label_small" for=""><?=$product['resolution']?></label>
                        </div>
                        
                        <div class="small">
                            <p class="p_small"  for="">Дата релиза:</p> 
                            <label class="label_small" for=""><?=$product['release_year']?></label>
                        </div>
                        <div class="small">
                            <p class="p_small"  for="">Страна разработчика:</p> 
                            <label class="label_small" for=""><?=$product['guarantee']?></label>
                        </div>
                </div>
                    <div class="buttonss">
                        <button name="cart" class="button_product">В корзину</button>
                        <button  id="main-middle-right-reviews" onclick="add()"  name="modal-add" class="button_product">Написать отзыв</button>
                    </div>
                    <div class="marks_review">
                        <div class="p_review">Средняя оценка игроков</div>
                        <div class="num_review"><?=$productPoint?><div class="star_review"><img src="../assets/img/Star 1.png" alt="" class="star_img_review"></div></div>
                        
                    </div>
           </div>

           <div class="main_product">
                
                <div class="main-middle-left">
                    <?php 
                        $productGallery = mysqli_query($link,"SELECT `img` FROM `gallery` WHERE `product_id` = '$id'");
                    ?>
                    <div class="cliders">
                        <?php 
                            foreach($productGallery as $productGalleryItem => $valueGalleryItem):
                        ?>
                        <div class="clider-block">
                            <div class="slider-wrapper" ><img class="img_slider" src="../assets/upload_images/<?=$valueGalleryItem['img']?>" alt=""></div>
                        </div>
                        <?php 
                            endforeach;
                        ?>
                    </div>
                    <div class="cliders-two">

                        <?php 
                            foreach($productGallery as $productGalleryItem => $valueGalleryItem):
                        ?>
                        <div class="clider-block2">
                            <div class="slider-wrapper" style="display: flex; flex-direction: row; justify-content:base-line; height: 100px; width: 100px; "><img class="small_img_gal" src="../assets/upload_images/<?=$valueGalleryItem['img']?>" alt=""></div>
                        </div>
                        <?php 
                            endforeach;
                        ?>

                    </div>
                </div>

                          
           </div>
        </div>

        <div class="dpj">

            <div class="dpj_left">

                <div class="platforms">
                    <p class="dpj_p">Доступные платформы</p>
                    <div class="dpj_window">
                                   
                        <?php
                            $colorsProduct = mysqli_query($link, "SELECT `platforms`.*, `product_platforms`.* FROM `product_platforms` LEFT JOIN `platforms` ON `product_platforms`.`platform_id` = `platforms`.`id` WHERE `product_platforms`.`product_id` = '$id'");
                            foreach($colorsProduct as $keyColor => $valueColor):
                        ?>
                            <p class="dpj_value" value="<?=$valueColor['id']?>"><?=$valueColor['platform']?></p>
                            <?php endforeach; ?>
                               
                    </div>
                </div>

                <div class="jeanres">
                    <p class="dpj_p">Жанры</p>
                    <div class="dpj_window">
                        <?php
                            $memoriesProduct = mysqli_query($link, "SELECT `jeanres`.*, `product_jeanre`.* FROM `product_jeanre` LEFT JOIN `jeanres` ON `product_jeanre`.`jeanre_id` = `jeanres`.`id` WHERE `product_jeanre`.`product_id` = '$id'");
                            foreach($memoriesProduct as $keyMemoryProduct => $valueMemoryProduct):
                        ?>
                        
                        <p class="dpj_value" for="ROM1"><?=$valueMemoryProduct['jeanre']?></p>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

            <div class="dpj_right">
            <p class="dpj_p">Описание</p>
                <div class="dpj_window">
                    <div class="descriptions">
                        <p><?=$product['descriptions']?> </p>
                    </div>
                    </div>
            </div>
        </div>
        
        

        <div class="reviews_window">  
            
             <div class="reviews_block">
          
                <?php 
                    if($productReviews -> num_rows > 0){
                ?>
            <p id='description_p' class='description_pp'>Обзоры игроков</p>
                <div class="swiper-container main-reviesw-block">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($productReviews as $keyReview => $valueReview):
                           
                        ?>
                        <div class="review_card main-reviews-item swiper-slide card">
                            <div class="review_info">
                                <div class="main-reviews-item__h">
                                    <h3><?= $valueReview['name']?></h3>
                                </div>
                                <div class="review_point">
                                    <p style="font-size: 18px;">Оценка: <span class="span_point" ><?= $valueReview['point']?></span></p>
                                </div>
                            </div>
                            <div class="review_descriptions">
                                <p><?= $valueReview['descriptions']?></p>
                            </div>
                            
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
            </div>
            <?php }?>
           
        </div>
      
    
    </div>
    <?php 
        include "../footer.php";
    ?>
  
    <script src="../components/swiper/swiper.min.js"></script>
    <script src="../components/slider/js/jquery.js"></script>
    <script src="../components/slider/js/slick.js"></script>
    <script src="../components/scroll/aos.js"></script>
    <script src="../components/modal/modal.js"></script>
    <script src="../components/slider/js/script.js"></script>
</body>
</html>
