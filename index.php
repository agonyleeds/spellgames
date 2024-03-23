<?php 
    include 'core.php';

    if(isset($_GET['radio_model'])){
        if(isset($where)){
            $where .= " AND `kategories`.`id` = '{$_GET['radio_model']}' ";
        }
        else{
            $where = " WHERE `kategories`.`id` = '{$_GET['radio_model']}' ";
        }
    }
    if(isset($_GET['radio_memory'])){
        if(isset($where)){
            $where .= " AND `product_jeanre`.`jeanre_id` = '{$_GET['radio_memory']}' ";
        }
        else{
            $where = " WHERE `product_jeanre`.`jeanre_id` = '{$_GET['radio_memory']}' ";
        }
    }
  
    if(isset($_GET['range_min']) && isset($_GET['range_max'])){
        if(isset($where)){
            $where .= " AND `products`.`price` >= {$_GET['range_min']} AND `products`.`price` <= {$_GET['range_max']}";
        }
        else{
            $where = " WHERE `products`.`price` >= {$_GET['range_min']} AND `products`.`price` <= {$_GET['range_max']}";
        }
    }
    if(isset($where)){
        $products = mysqli_query($link, "SELECT `products`.*, `product_jeanre`.*, `kategories`.* FROM `products`
        LEFT JOIN `product_platforms` ON `product_platforms`.`product_id` = `products`.`id` 
        LEFT JOIN `product_jeanre` ON `product_jeanre`.`product_id` = `products`.`id` 
        LEFT JOIN `kategories` ON `products`.`kategory_id` = `kategories`.`id` $where
        GROUP BY `products`.`id` 
        ");
    }
    else{
        $products = mysqli_query($link, "SELECT `products`.*, `product_jeanre`.*, `kategories`.* FROM `products`
        LEFT JOIN `product_platforms` ON `product_platforms`.`product_id` = `products`.`id` 
        LEFT JOIN `product_jeanre` ON `product_jeanre`.`product_id` = `products`.`id` 
        LEFT JOIN `kategories` ON `products`.`kategory_id` = `kategories`.`id`
        GROUP BY `products`.`id`
        ");
    }

       $rows = mysqli_query($link, 'SELECT * FROM products');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="components/range/nouislider.min.css">
    <link rel="stylesheet" href="components/scroll/aos.css">
    <link rel="stylesheet" href="style.css">
    <title>Главная</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
   
    <div class="wrapper">
        <div class="main">
            
           <div class="filters">
                <form class="form_filter" action="#top__catalog__h1" method="get">
                    <div class="catalog__googs__left__block">
                        <div class="goods_left_h">
                            <p>Фильтр</p>
                        </div>
                            
                        <div class="googs_h">
                            <p>Категория</p>
                        </div>
                            <?php 
                                $models = mysqli_query($link, "SELECT * FROM `kategories`");
                                foreach($models as $keyModel => $valueModel):
                            ?>
                            <div class="googs_radio"> 
                                <input type="radio" id="radio_model" name="radio_model" value="<?= $valueModel['id']?>">
                                <label for="radio_model"><?= $valueModel['kategory']?></label>
                            </div>
                            <?php endforeach; ?>

                            <div class="googs_h">
                                <p>Жанры</p>
                            </div>
                            <?php 
                                $ROM = mysqli_query($link, "SELECT * FROM `jeanres`");
                                foreach($ROM as $keyROM => $valueROM):
                            ?>
                            <div class="googs_radio"> 
                                <input type="radio" id="radio_memory" name="radio_memory" value="<?= $valueROM['id']?>">
                                <label for="radio_model"><?= $valueROM['jeanre']?></label>
                            </div>
                            <?php endforeach; ?>
                        
  
                            <div class="googs_left_model_count" id="googs_left_model_count">
                                <div class="googs_h">
                                    <p>Цена</p>
                                </div>
                                <div class="googs_range">
                                    <div class="range_left range_count">
                                        <input type="number" id="range_left" value="1000" min="<?= $config['minPrice']?>" max="<?= $config['maxPrice']?>" name="range_min">
                                    </div>
                                    <div class="range_right range_count">
                                        <input type="number" id="range_right" value="80000" min="1000" max="<?= $config['maxPrice']?>" name="range_max">
                                    </div>
                                </div>
                                <div class="slider-track" id="slider-track"></div>
                            </div>
                            
                        <div class="button_goods_more">
                            <div id="button_goods_more">
                                    <button class="show_filters" id="show_filters">Показать варианты</button>
                            </div>
                            <form class="top__catalog__searc" action="#top__catalog__h1">
                                <button id="delete_filters"><img id="img_filters" src="assets/img/delete_filters.png"  alt=""></button>
                            </form>
                        </div>
                          
                    </div>
                </form>
           </div>

           <div class="main_store">
                
                <?php
                if($products -> num_rows == 0){?>
                    <div style="text-align: center; margin: 0 auto;">
                        <h3 style="color: #C14231; font-size: 24px;">Товаров нет в наличии</h3>
                    </div>
                <?php 
                }else{
                    foreach($products as $key => $value):
                ?>
                <!-- Здесь начинается каталог -->

                    
                        <div class="product"> 
                        
                            <div class="product_img"><a href="product/product1.php?id=<?= $value['product_id']?>" id="grid-catalog__a-more">
                                <img src="./assets/upload_images/<?= $value['img'];?>" alt="" class="img_poster"> </a>
                            </div>
                       
                            <div class="platform">
                           
                                <?php
                                    $colorsProduct = mysqli_query($link, "SELECT `platforms`.*, `product_platforms`.* FROM `product_platforms` LEFT JOIN `platforms` ON `product_platforms`.`platform_id` = `platforms`.`id` WHERE `product_platforms`.`product_id` = '{$value['product_id']}'");
                                    foreach($colorsProduct as $keyColor => $valueColor):
                                ?>
                                
                                <p class="platform_item"><?= $valueColor['platform']?></p>
                                <?php endforeach; ?>
                            
                            </div>
                            <div class="basket">
                                <button name="cart" class="cart" id="cart"><img id="img_cart" src="./assets/img/basket 2.png" alt=""></button>
                            </div>
                            <div class="product_main">
                                <div class="right_info">
                                <a href="product/product1.php?id=<?= $value['product_id']?>" id="grid-catalog__a-more"><div class="product_name"><?= $value['name'] ?></div></a>
                                    
                                </div>
                                <div class="left_info">
                                    <div class="price"><?= $value['price'] ?><span id="span_valute">₽</span></div>
                                </div>
                            </div>

                        </div>
                    

                <?php 
                    endforeach;
                }
                ?>
                        
           </div>

        </div>
        
        <?php 
            include "footer.php";
        ?>
        
    </div>
    <script>
        let maxPrice = <?= $config['maxPrice']?>;
        let minPrice = <?= $config['minPrice']?>;
    </script>
    <script src="components/range/nouislider.min.js"></script>
    <script src="components/scroll/aos.js"></script>
    <!-- <script src="range/script.js"></script> -->
    <script src="script.js"></script>
    
</body>
</html>