<?php 
    include '../core.php';
    if(!empty($_SESSION['user'])){
        $allModels = mysqli_query($link, "SELECT * FROM `kategories`");
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
        <div class="main">
        <div class="admin_div">
            <form action="../addModel.php" method="post">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                        <div class="main-admin-block__p_h"> <p>Добавить категорию</p></div>
                            <?php 
                                if(isset($_SESSION['success']['deleteModel'])){
                                    echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['deleteModel']."</p>";
                                    unset($_SESSION['success']['deleteModel']);
                                }
                                if(isset($_SESSION['error']['deleteModel'])){
                                    echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['deleteModel']."</p>";
                                    unset($_SESSION['error']['deleteModel']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs">
                        <div class="main-admin-update-inputs-newName update">
                            <label><div class="main-admin-block__p_h"><h2>Введите категорию</h2></div></label>
                            <input class="input_form" type="text" id="addModel" name="addModel" placeholder="Название">
                            <?php 
                                if(isset($_SESSION['error']['addModel'])){
                                    echo "<p style='color: red;'>".$_SESSION['error']['addModel']."</p>";
                                    unset($_SESSION['error']['addModel']);
                                }
                                if(isset($_SESSION['success']['addModel'])){
                                    echo "<p style='color: green;'>".$_SESSION['success']['addModel']."</p>";
                                    unset($_SESSION['success']['addModel']);
                                }
                                
                            ?>
                        </div>
                        <div class="main-admin-block-right-updateTovar">
                            <button class="form_button" id="addModelTovar" name="addModelTovar">Добавить категорию</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
            <div class="platforms_list admin_div">
                <h3>Все категории:</h3>
                <?php
                    foreach($allModels as $key => $value):
                ?>
                <div class="platform">
                    <div class="color_block">
                        <p class="platforms_item"><?= $value['kategory']; ?></p>
                    </div>
                    <form action="../deleteModel.php" method="post">
                        <input type="hidden" name="idModel" value="<?= $value['id']?>">
                        <button class="delete_but_form">Удалить</button>
                    </form>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
            </div>
        
      
        
    </div>
</body>
</html>
<?php 
    }else{
        header('location: ../index.php');
    }
?>