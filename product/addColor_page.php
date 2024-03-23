<?php 
    include '../core.php';
    if(!empty($_SESSION['user'])){
        $allColors = mysqli_query($link, "SELECT * FROM `platforms`");
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
            <form action="../addColor.php" method="post">
                    <div class="main-admin-block-update" id="update_Tovar">
                        <div class="main-admin-update-p">
                            <div class="main-admin-update__p">
                            <div class="main-admin-block__p_h"><p>Добавить Платформу</p> </div>
                                <?php 
                                    if(isset($_SESSION['success']['deleteColor'])){
                                        echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['deleteColor']."</p>";
                                        unset($_SESSION['success']['deleteColor']);
                                    }
                                    if(isset($_SESSION['error']['deleteColor'])){
                                        echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['deleteColor']."</p>";
                                        unset($_SESSION['error']['deleteColor']);
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="main-admin-update-inputs">
                            <div class="main-admin-update-inputs-newName update">
                                <label>  <div class="main-admin-block__p_h"><h2>Введите платформу</h2></div></label>
                                <input class="input_form" type="text" id="addColor" name="addColor" placeholder="Название">
                    
                                <?php 
                                    if(isset($_SESSION['error']['addColor'])){
                                        echo "<p style='color: red;'>".$_SESSION['error']['addColor']."</p>";
                                        unset($_SESSION['error']['addColor']);
                                    }
                                    if(isset($_SESSION['success']['addColor'])){
                                        echo "<p style='color: green;'>".$_SESSION['success']['addColor']."</p>";
                                        unset($_SESSION['success']['addColor']);
                                    }
                                    
                                ?>
                            </div>
                            <div class="main-admin-block-right-updateTovar">
                                <button class="form_button"  id="addColorTovar" name="addColorTovar">Добавить платформу</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>

            <div class="platforms_list admin_div">
                <h3>Все платформы:</h3>
                <?php
                    foreach($allColors as $key => $value):
                ?>
                <div class="platform">
                    <div class="color_block">
                    <p class="platforms_item"><?= $value['platform']; ?></p>
                     
                    </div>
                    <form action="../deleteColor.php" method="post">
                        <input type="hidden" name="idColor" value="<?= $value['id']?>">
                        <button class="delete_but_form" >Удалить</button>
                    </form>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
           
        </div>
        
        <!-- <?php 
            include "../footer.php";
        ?> -->
        
    </div>
            
</body>
</html>
<?php 
    }else{
        header('location: ../index.php');
    }
?>