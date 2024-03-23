<?php 
    //session_start();
    include '../core.php';
    
    if(!empty($_SESSION['user'])){
            $id = $_GET['idUpdate'];
            $result =  mysqli_query($link, "SELECT * FROM `products` WHERE id = '$id'");
            $num = mysqli_num_rows($result);
            if($num == 0) {
                $_SESSION['error']['updateError'] = 'Данного товара нет в БД!';
                header("location: admin_panel.php#update_Tovar");
            }
            else{
                $upQuery = mysqli_query($link, "SELECT * FROM `products` WHERE id=$id");
                $upQueryRow = mysqli_fetch_array($upQuery);
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Редактор</title>
</head>
<body>
    <?php 
        include "./header.php";
    ?>
    <div class="wrapper">
    <div class="main main_product">
        <div class="admin_update">
            <form action="../updateProduct.php" method="post" enctype="multipart/form-data">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                        <div class="main-admin-block__p_h">
                                <p>Обновить товар</p>
                            </div>
                            <?php 
                            if(isset($_SESSION['success']['updateProduct'])){
                                echo "<br><p style='color: green; font-size: 18px;'>".$_SESSION['success']['updateProduct']."</p>";
                                unset($_SESSION['success']['updateProduct']);
                            }
                            if(isset($_SESSION['error']['updateError'])){
                                echo "<br><p style='color: red; font-size: 18px;'>".$_SESSION['error']['updateError']."</p>";
                                unset($_SESSION['error']['updateError']);
                            }
                            elseif(isset($_SESSION['error']['updateProductError'])){
                                echo "<br><p style='color: red; font-size: 18px;'>".$_SESSION['error']['updateProductError']."</p>";
                                unset($_SESSION['error']['updateProductError']);
                            }
                            if(isset($_SESSION['success']['addProductColor'])){
                                echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['addProductColor']."</p>";
                                unset($_SESSION['success']['addProductColor']);
                            }
                            if(isset($_SESSION['error']['addProductColor'])){
                                echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['addProductColor']."</p>";
                                unset($_SESSION['error']['addProductColor']);
                            }
                            if(isset($_SESSION['success']['deleteProductColor'])){
                                echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['deleteProductColor']."</p>";
                                unset($_SESSION['success']['deleteProductColor']);
                            }
                            if(isset($_SESSION['success']['addProductMemory'])){
                                echo "<p style='color: green; font-size: 18px;';>".$_SESSION['success']['addProductMemory']."</p>";
                                unset($_SESSION['success']['addProductMemory']);
                            }
                            if(isset($_SESSION['success']['deleteProductMemory'])){
                                echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['deleteProductMemory']."</p>";
                                unset($_SESSION['success']['deleteProductMemory']);
                            }
                            if(isset($_SESSION['error']['addProductROM'])){
                                echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['addProductROM']."</p>";
                                unset($_SESSION['error']['addProductROM']);
                            }
                            if(isset($_SESSION['error']['deleteProductMemory'])){
                                echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['deleteProductMemory']."</p>";
                                unset($_SESSION['error']['deleteProductMemory']);
                            }
                        ?>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs">
                        <div class=" update">
                            <input type="hidden" id="idUpdate" name="idUpdate" placeholder="id товара" value="<?php echo $id;?>">
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <label class="label_update" for="nameUpdate">Наименование товара</label>
                            <input class="input_form" type="text" id="nameUpdate" name="nameUpdate" placeholder="Новое название" value="<?php echo $upQueryRow['name'];?>">
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <label class="label_update" for="priceUpdate">Цена товара</label>
                            <input class="input_form" type="text" id="costUpdate" name="priceUpdate" placeholder="Новая цена" value="<?php echo $upQueryRow['price'];?>">
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <label class="label_update" for="descriptionUpdate">Описание товара</label>
                            <textarea style="height:200px; max-width:300px;" class="input_form textarea1" name="descriptionUpdate" id="descriptionUpdate" placeholder="Новое описание"><?= $upQueryRow['descriptions']?></textarea>
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <label class="label_update" for="guaranteeUpdate">Страна разработчика</label>
                            <input class="input_form" type="text" id="costUpdate" name="guaranteeUpdate" placeholder="Новая Страна разработчика" value="<?php echo $upQueryRow['guarantee'];?>">
                        </div>

                        <div class="main-admin-update-inputs-newCost update">
                            <?php 
                                $modelProduct = mysqli_query($link, "SELECT `products`.`id`, `kategories`.`id`, `kategories`.`kategory` FROM `products` LEFT JOIN `kategories` ON `products`.`kategory_id` = `kategories`.`id` WHERE `products`.`id` = '$id';");
                                $resModel = mysqli_fetch_array($modelProduct);
                                $models = mysqli_query($link, "SELECT * FROM `kategories`");
                            ?>
                            <p class="label_update  ">Старая категория продукта: <?=$resModel['kategory']?></p>
                            <p class="label_update">Новая:</p>
                            <select name="modelUpdate" style="width: 100px; height: 30px; margin-top: 10px;">
                            <?php 
                                foreach($models as $keyModel => $valueModel):
                            ?>
                            <option value="<?= $valueModel['id']?>"><?= $valueModel['kategory']?></option>
                            <?php 
                                endforeach;
                            ?>
                        </div>
                       
                        
                        <div class="main-admin-update-inputs-newCost update">
                            <label for="release_yearUpdate">Дата выпуска</label>
                            <input  class="input_form" type="text" id="costUpdate" name="release_yearUpdate" placeholder="Новыя лата выпуска" value="<?php echo $upQueryRow['release_year'];?>">
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <labe class="label_update"l for="diagonalUpdate">Новый издатель</label>
                            <input  class="input_form" type="text" id="costUpdate" name="diagonalUpdate" placeholder="Новый издатель" value="<?php echo $upQueryRow['diagonal'];?>">
                        </div>
                        <div class="main-admin-update-inputs-newCost update">
                            <label class="label_update" for="resolutionUpdate">Новый разработчик</label>
                            <input  class="input_form" type="text" id="costUpdate" name="resolutionUpdate" placeholder="Новый разработчик" value="<?php echo $upQueryRow['resolution'];?>">
                        </div>
                        <div class="main-admin-block-right-img__p">
                            <p class="label_update" >Изображения</p>
                        </div>
                        <div class="main-admin-block-right-img__input ">
                            <input   type="file" id="img__file"  name="imgUpdate" >
                        </div>
                        <div class="main-admin-block-right-img__p">
                            <p class="label_update" >Старое изображение</p>
                        </div>
                        <div class="main-admin-block-right-img__input">
                            <img src="../assets/upload_images/<?= $upQueryRow['img']?>" alt="img" class="img__s">
                        </div>
                        <?php
                            if(isset($_SESSION['error']['updateProductError'])){
                                echo "<br><p style='color: red'>".$_SESSION['error']['updateProductError']."</p>";
                                unset($_SESSION['error']['updateProductError']);
                            }
                        ?>

                        <?php 
                            $productImages = mysqli_query($link, "SELECT * FROM `gallery` WHERE `product_id` = '$id'");
                        ?>
                        <div class="main-admin-block-right-img__p">
                            <p class="label_update"  id="productGallery">Галлерея продукта</p>
                        </div>
                        <div class="main-admin-block-right-img__input ">
                            <input type="file" id="img__file_slider" name="imgUpdate_Slider" style="padding: 0px;">
                        </div>
                        <?php
                            if(isset($_SESSION['error']['updateProductError'])){
                                echo "<br><p style='color: red'>".$_SESSION['error']['updateProductError']."</p>";
                                unset($_SESSION['error']['updateProductError']);
                            }
                        ?>

                        <div class="main-admin-block-right-updateTovar">
                            <button class="form_button"  id="updateTovar1" name="updateTovar1">Обновить товар</button>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>

            <?php 
                $productImages = mysqli_query($link, "SELECT * FROM `gallery` WHERE `product_id` = '$id'");
            ?>

            <!-- Галлерея -->
            <div class="admin_update">
                <div class="main-admin-block-update" id="productGallery">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                            <p class="p_update">Галлерея продукта</p>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs colorProduct">
                        <div style="display: flex; gap: 10px; width: 100%; flex-wrap: wrap;">
                            <?php
                                    foreach($productImages as $keyProductImage => $valueProductImage):
                            ?>
                            <form action="../deleteImageGallery.php" method="post">
                                <div style="display: flex; gap: 10px; width: 100%; flex-wrap: wrap;">
                                    <div class="main-admin-block-right-img__input" style="display: flex; flex-direction: column; width: 100px; gap: 10px;">
                                        <img src="../assets/upload_images/<?= $valueProductImage['img']?>" alt="img" style="width: 100px; height: 100px;     object-fit: cover;">
                                        <input class="input_form" type="hidden" value="<?=$valueProductImage['id']?>" name="delImgProductId" style="padding: 0px; margin: 0px;">
                                        <button type="submit" name="deleteGalleryImgBtn" style="padding: 5px; background-color: #C14231; color: white; border-radius: 5px;">Удалить</button>
                                    </div>
                                </div>
                            </form>
                            <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
                <?php 
                $memories = mysqli_query($link, "SELECT * FROM `jeanres`");
            ?>
            <div class="admin_update">
            <form action="../addProductROM.php" method="post" enctype="multipart/form-data">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                            <p class="p_update">Добавить Жанр</p>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs colorProduct">
                        <div class="main-admin-update-inputs-newName update addColorProduct">
                            <select name="memory_id">
                                <?php 
                                    foreach($memories as $keyMemory => $valueMemory):
                                ?>
                                <option value="<?=$valueMemory['id']?>"><?=$valueMemory['jeanre']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="main-admin-update-inputs-id">
                            <input class="input_form" type="hidden" id="idUpdate" name="product_id" value="<?php echo $id;?>">
                        </div>
                        <div class="main-admin-block-right-updateTovar addColorTovarBtn">
                            <button class="form_button"  id="updateTovar1" name="updateTovar1">Добавить жанр</button>
                        </div>
                    </div>
                </div>
            </form>

            <form action="../deleteProductROM.php" method="post" enctype="multipart/form-data">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                            <p class="p_update">Все жанры продукта</p>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs colorProduct">
                        <div class="main-admin-update-inputs-newName update addColorProduct">
                            <select name="memory_id_product">
                                <?php
                                    $memoriesProduct = mysqli_query($link, "SELECT `jeanres`.*, `product_jeanre`.* FROM `product_jeanre` LEFT JOIN `jeanres` ON `product_jeanre`.`jeanre_id` = `jeanres`.`id` WHERE `product_jeanre`.`product_id` = '$id'");
                                    foreach($memoriesProduct as $keyMemoryProduct => $valueMemoryProduct):
                                ?>
                                <option value="<?=$valueMemoryProduct['id']?>"><?=$valueMemoryProduct['jeanre']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="main-admin-update-inputs-id">
                            <input class="input_form" type="hidden" id="idUpdate" name="product_id_color" value="<?=$id?>">
                        </div>
                        <div class="main-admin-block-right-updateTovar addColorTovarBtn">
                            <button class="form_button"  id="updateTovar1" name="updateTovar1">Удалить жанр</button>
                        </div>
                    </div>
                </div>
            </form>

            <?php 
                $colors = mysqli_query($link, "SELECT * FROM `platforms`");
            ?>
            <form action="../addProductColor.php" method="post" enctype="multipart/form-data">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                            <p class="p_update">Добавить платформу</p>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs colorProduct">
                        <div class="main-admin-update-inputs-newName update addColorProduct">
                            <select name="color_id">
                                <?php 
                                    foreach($colors as $key => $value):
                                ?>
                                <option value="<?=$value['id']?>"><?=$value['platform']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="main-admin-update-inputs-id">
                            <input class="input_form" type="hidden" id="idUpdate" name="product_id" value="<?php echo $id;?>">
                        </div>
                        <div class="main-admin-block-right-updateTovar addColorTovarBtn">
                            <button class="form_button"  id="updateTovar1" name="updateTovar1">Добавить платформу</button>
                        </div>
                    </div>
                </div>
            </form>

            <form action="../deleteProductColor.php" method="post" enctype="multipart/form-data">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                            <p class="p_update">Все платформы</p>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs colorProduct">
                        <div class="main-admin-update-inputs-newName update addColorProduct">
                            <select name="color_id_product">
                                <?php
                                    $colorsProduct = mysqli_query($link, "SELECT `platforms`.*, `product_platforms`.* FROM `product_platforms` LEFT JOIN `platforms` ON `product_platforms`.`platform_id` = `platforms`.`id` WHERE `product_platforms`.`product_id` = '$id'");
                                    foreach($colorsProduct as $keyColor => $valueColor):
                                ?>
                                <option value="<?=$valueColor['id']?>"><?=$valueColor['platform']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="main-admin-update-inputs-id">
                            <input class="input_form" type="hidden" id="idUpdate" name="product_id_color" value="<?=$id?>">
                        </div>
                        <div class="main-admin-block-right-updateTovar addColorTovarBtn">
                            <button class="form_button"  id="updateTovar1" name="updateTovar1">Удалить платформу</button>
                        </div>
                    </div>
                </div>
            </form>

           
        </div >
         
    </div>
    </div>
</body>
</html>
<?php 
    }else{
        header('location: ../index.php');
    }
?>