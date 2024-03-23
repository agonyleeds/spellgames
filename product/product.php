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
                    <option value="1">Звёзд: 1</option>
                    <option value="2">Звёзд: 2</option>
                    <option value="3">Звёзд: 3</option>
                    <option value="4">Звёзд: 4</option>
                    <option value="5">Звёзд: 5</option>
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
    <div class="main_product">
            <div class="main-top">
                <!-- <div class="main-top__p" id="product_name">
                    <p><?=$product['name']?></p>
                </div> -->
                <?php 
                    if(!$product['count_reviews'] == 0){
                ?>
                <div class="main-top-status">
                    <p style="font-size: 24px; color: #737373;">Оценка: <span style="color: #C14231;"><?=$productPoint?><span></p>
                </div>
                <?php } ?>
            </div>
            <div class="main-top-review">
                <div class="main-top-review__p">
                    <p><?= $product['count_reviews']?> отзыв(а/ов)</p>
                    <br>
                </div>
            </div>
            <div class="main-middle">
                <div class="main-middle-left">
                    <?php 
                        $productGallery = mysqli_query($link,"SELECT `img` FROM `gallery` WHERE `product_id` = '$id'");
                    ?>
                    <div class="cliders">
                        <?php 
                            foreach($productGallery as $productGalleryItem => $valueGalleryItem):
                        ?>
                        <div class="clider-block">
                            <div class="slider-wrapper" ><img src="../assets/upload_images/<?=$valueGalleryItem['img']?>" alt=""></div>
                        </div>
                        <?php 
                            endforeach;
                        ?>
                    </div>
                    <div class="cliders-two">

                        <?php 
                            foreach($productGallery as $productGalleryItem => $valueGalleryItem):
                        ?>
                        <div class="clider-block">
                            <div class="slider-wrapper" style="display: flex; flex-direction: row; justify-content:center; height: 100px; width: 100px;"><img src="../assets/upload_images/<?=$valueGalleryItem['img']?>" alt=""></div>
                        </div>
                        <?php 
                            endforeach;
                        ?>

                    </div>
                </div>
                
                <div class="main-middle-right">
                    <div class="main-middle-right__h">
                       <h1><?=$product['name']?></h1> 
                    </div>
                    <form action="../deleteProductColor.php" method="post" enctype="multipart/form-data">
                        <div class="main-admin-block-update" id="update_Tovar">
                            
                            <div class="main-admin-update-inputs colorProduct">
                                <div class="main-middle-right-platform">
                                   
                                        <?php
                                            $colorsProduct = mysqli_query($link, "SELECT `platforms`.*, `product_platforms`.* FROM `product_platforms` LEFT JOIN `platforms` ON `product_platforms`.`platform_id` = `platforms`.`id` WHERE `product_platforms`.`product_id` = '$id'");
                                            foreach($colorsProduct as $keyColor => $valueColor):
                                        ?>
                                        <p value="<?=$valueColor['id']?>"><?=$valueColor['platform']?></p>
                                        <?php endforeach; ?>
                                    
                                </div>
                                <div class="main-admin-update-inputs-id">
                                    <input type="hidden" id="idUpdate" name="product_id_color" value="<?=$id?>">
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    <!-- <div class="main-middle-right-ROM__p">
                      <p>Встроенная память (ROM)</p>  
                    </div> -->
                    <form action="">
                    <div class="main-middle_right-ROM__radio">
                        <?php
                            $memoriesProduct = mysqli_query($link, "SELECT `jeanres`.*, `product_jeanre`.* FROM `product_jeanre` LEFT JOIN `jeanres` ON `product_jeanre`.`jeanre_id` = `jeanres`.`id` WHERE `product_jeanre`.`product_id` = '$id'");
                            foreach($memoriesProduct as $keyMemoryProduct => $valueMemoryProduct):
                        ?>
                        
                        <label for="ROM1" style="font-size: 20px;"><?=$valueMemoryProduct['jeanre']?> ГБ</label>
                        <?php endforeach; ?>
                    </div>
                </form>
                <div class="main-middle-right__p">
                    <p>О товаре</p>
                </div>
                <div class="main-middle-right__description__p">
                    <p><?=$product['descriptions']?> </p>
                </div>
                    <div class="main-middle-right-button_count">
                        <div class="main-middle-right__button">
                            <button id="main-middle-right">
                                В корзину
                            </button>
                            <button id="main-middle-right-reviews" onclick="add()">
                                Добавить отзыв
                            </button>
                        </div>
                        <div class="main-middle-right-count__p">
                            <p><?=$product['price']?> р.</p>
                        </div>
                    </div>
                    <?php 
                        if(isset($_SESSION['success']['addReview'])){
                            echo "<p style='margin-top: 10px; color: green;'>".$_SESSION['success']['addReview']."</p>";
                            unset($_SESSION['success']['addReview']);
                        }
                        if(isset($_SESSION['error']['addReview'])){
                            echo "<p style='margin-top: 10px; color: green;'>".$_SESSION['error']['addReview']."</p>";
                            unset($_SESSION['error']['addReview']);
                        }
                    ?>
                </div>
            </div>

            <?php 
                $modelProduct = mysqli_query($link, "SELECT `products`.`id`, `kategories`.`id`, `kategories`.`kategory` FROM `products` LEFT JOIN `kategories` ON `products`.`kategory_id` = `kategories`.`id` WHERE `products`.`id` = '$id';");
                $resModel = mysqli_fetch_array($modelProduct);
            ?>
            <div class="main-characteristic">
                <h1>ХАРАКТЕРИСТИКИ</h1>
                <div class="main-characteristic-block" >
                    <div class="main-characteristic-left">
                        
                        <!-- <div class="charact__h">
                            <h3>Общие параметры</h3>
                        </div> -->
                        <div class="charact__p">
                            <p>Страна разработчика</p>
                            <p><?=$product['guarantee']?></p>
                        </div>
                        <div class="charact__p">
                            <p>Категория</p>
                            <p><?=$resModel['kategory']?></p>
                        </div>
                        
                        <div class="charact__p">
                            <p>Дата релиза</p>
                            <p><?=$product['release_year']?></p>
                        </div>
                        
                        <div class="charact__p">
                            <p>Издатель</p>
                            <p><?=$product['diagonal']?></p>
                        </div>
                        
                        <div class="charact__p">
                            <p>Разработчик</p>
                            <p><?=$product['resolution']?></p>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
            <?php 
                if($productReviews -> num_rows > 0){
            ?>
            <div class="main-reviews">
                <div class="main-reviesw__h">
                    <h1>ОТЗЫВЫ</h1>
                </div>
                <div class="swiper-container main-reviesw-block">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($productReviews as $keyReview => $valueReview):
                        ?>
                        <div class="main-reviews-item swiper-slide card">
                            <div class="main-reviews-item__h-status">
                                <div class="main-reviews-item__h">
                                    <h3><?= $valueReview['name']?></h3>
                                </div>
                                <div class="main-reviews-item-status">
                                    <p style="font-size: 18px;">Оценка: <span style="color: #C14231;"><?= $valueReview['point']?></span></p>
                                </div>
                            </div>
                            <div class="main-reviesw__p">
                                <p><?= $valueReview['descriptions']?></p>
                            </div>
                            <div class="main-reviesw-date">
                                  <p>29.12.2022</p>  
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div class="main-reviesw-block__button">
                    <button class="swiper-button-do"></button>
				<button class="swiper-button-let"></button>
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