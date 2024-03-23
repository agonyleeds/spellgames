<?php 
    session_start();
    include '../core.php';
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    } else{
        if($_SESSION['user']['isAdmin'] != 1){
            header("Location: index.php");
        }
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
    <div class="main main_admin">
        
            <div class="admin_div">

                <div class="main-admin-block-a">
                    <div class="main-admin-block__p">
                        <p>Воспользуйся следующими функциями:</p>
                    </div>
                    <div class="main-admin-block__a">
                        <!-- <a href="#add_Tovar">Добавить товар</a>
                        <a href="#delete_Tovar">Удалить товар</a>
                        <a href="#update_Tovar">Обновить товар</a> -->
                        <a href="addColor_page.php">Добавить платформы для игр</a>
                        <a href="addROM_page.php">Добавить жанры</a>
                        <a href="addModel_page.php">Добавить категории</a>
                    </div>
                </div>
                
                <div class="main-admin-block-a">
                    <div class="main-admin-block__p">
                        <p>Закончили с изменениями?</p>
                    </div>
                    <a href="../exit.php" id="exit"> <div class="main-admin-block__exit">
                        Выход
                    </div></a>
                </div>

            </div>
            <div class="admin_div">
                <form action="../addProduct.php" method="post" enctype="multipart/form-data" >
                    <div class="main-admin-block-inputs" id="add_Tovar">
                        <div class="main-admin-block-inputs-block">
                            <div class="main-admin-block__p_h">
                                <p>Добавление товара</p>
                            </div>
                        </div>
                        
                        <div class="main-admin-block-right">
                            <div class="main-admin-block__input-name">
                                <input class="input_form" type="text" placeholder="Название" name='name_product'>
                            </div>
                            
                            <div class="main-admin-block-right-cost">
                                <input class="input_form" type="text" placeholder="Цена" id="cost" name="price_product">
                            </div>
                            <div class="main-admin-block-right__textarea">
                                <textarea class="input_form" name="description_product" id="description" placeholder="Описание"></textarea>
                            </div>
                            <div class="main-admin-block-right-cost">
                                <input class="input_form" type="text" placeholder="Страна разработчика" id="cost" name="guarantee_product">
                            </div>
                            <div class="main-admin-block-right-cost">
                                <input class="input_form" type="date" placeholder="Год выпуска" id="cost" name="release_year_product">
                            </div>
                            <div class="main-admin-block-right-cost">
                                <input class="input_form" type="text" placeholder="Издатель" id="cost" name="diagonal_product">
                            </div>
                            <div class="main-admin-block-right-cost">
                                <input class="input_form" type="text" placeholder="Разработчик" id="cost" name="resolution_product">
                            </div>
                            <?php 
                                $models = mysqli_query($link, "SELECT * FROM `kategories`");
                            ?>
                            <p class="main-admin-block__p_h" style="">Выберите модель</p>

                            <select name="productModels" style="width: 100px; height: 30px; margin-top: 20px;">
                                <?php 
                                    foreach($models as $keyModel => $valueModel):
                                ?>
                                <option value="<?= $valueModel['id']?>"><?= $valueModel['kategory']?></option>
                                <?php 
                                    endforeach;
                                ?>
                            </select>

                            <div class="main-admin-block__p_h">
                                <p>Изображение</p>
                            </div>
                            <div class="main-admin-block-right-img__input">
                                <input type="file" id="img__file" name="img_product" >
                            </div>
                            <div class="main-admin-block-right-addTovar">
                                <button class="form_button" id="addTovar" name="addTovar">Добавить товар</button>
                            </div>
                            <?php 
                                if(isset($_SESSION['success']['addProduct'])){
                                    echo "<br><p style='color: green'>".$_SESSION['success']['addProduct']."</p>";
                                    unset($_SESSION['success']['addProduct']);
                                }
                                elseif(isset($_SESSION['error']['addProductError'])){
                                    echo "<br><p style='color: red'>".$_SESSION['error']['addProductError']."</p>";
                                    unset($_SESSION['error']['addProductError']);
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <div class="admin_div">
                <form action="../deleteProduct.php" method="post">
                    <div class="main-admin-block-delete" id="delete_Tovar">
                        <div class="main-admin-block__p_h">
                            <p>Удаление товара</p>
                        </div>
                        <div class="main-admin-block-delete__input">
                            <input class="input_form" type="text" placeholder="id товара" name="id_product">
                        </div>
                    </div>
                            <?php 
                                if(isset($_SESSION['success']['deleteProduct'])){
                                    echo "<br><p style='color: green'>".$_SESSION['success']['deleteProduct']."</p>";
                                    unset($_SESSION['success']['deleteProduct']);
                                }
                                elseif(isset($_SESSION['success']['DeleteProductError'])){
                                    echo "<br><p style='color: red'>".$_SESSION['error']['DeleteProductError']."</p>";
                                    unset($_SESSION['error']['DeleteProductError']);
                                }
                            ?>
                
                    <div class="main-admin-block-delete__button">
                        <button class="form_button" id="deleteTovar" name="deleteTovar">Удалить товар</button>
                    </div>
                </form>
            </div>

            <div class="admin_div">
                <form action="update_page.php" method="get">
                    <div class="main-admin-block-update" id="update_Tovar">
                        <div class="main-admin-update-p">
                            <div class="main-admin-block__p_h">
                                <p>Обновление товара</p>
                            </div>
                        </div>
                        <div class="main-admin-update-inputs">
                            <div class="main-admin-update-inputs-id">
                                <input class="input_form" type="text" id="idUpdate" name="idUpdate" placeholder="id товара">
                            </div>
                            <div class="main-admin-block-right-updateTovar">
                                <button class="form_button" id="updateTovar" name="updateTovar">Обновить товар</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
       
    </div>
    </div>
</body>
</html>
