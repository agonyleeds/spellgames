<?php 
    include '../core.php';
    if(!empty($_SESSION['user'])){
        $allROM = mysqli_query($link, "SELECT * FROM `jeanres`");
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
            <form action="../addROM.php" method="post">
                <div class="main-admin-block-update" id="update_Tovar">
                    <div class="main-admin-update-p">
                        <div class="main-admin-update__p">
                        <div class="main-admin-block__p_h"> <p>Добавить Жанр</p></div>
                            <?php 
                                if(isset($_SESSION['success']['deleteROM'])){
                                    echo "<p style='color: green; font-size: 18px;'>".$_SESSION['success']['deleteROM']."</p>";
                                    unset($_SESSION['success']['deleteROM']);
                                }
                                if(isset($_SESSION['error']['deleteROM'])){
                                    echo "<p style='color: red; font-size: 18px;'>".$_SESSION['error']['deleteROM']."</p>";
                                    unset($_SESSION['error']['deleteROM']);
                                }
                            ?>
                        </div>
                    </div>
                    <div class="main-admin-update-inputs">
                        <div class="main-admin-update-inputs-newName update">
                            <label><div class="main-admin-block__p_h"><h2>Введите Жанр</h2></div></label>
                            <input class="input_form" type="text" id="addROM" name="addROM" placeholder="Название">
                            <?php 
                                if(isset($_SESSION['error']['deleteROM'])){
                                    echo "<p style='color: red;'>".$_SESSION['error']['deleteROM']."</p>";
                                    unset($_SESSION['error']['deleteROM']);
                                }
                                if(isset($_SESSION['success']['deleteROM'])){
                                    echo "<p style='color: green;'>".$_SESSION['success']['deleteROM']."</p>";
                                    unset($_SESSION['success']['deleteROM']);
                                }
                                
                            ?>
                        </div>
                        <div class="main-admin-block-right-updateTovar">
                            <button class="form_button"  id="addROMTovar" name="addROMTovar">Добавить жанр</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

            <div class="platforms_list admin_div">
                <h3>Все жанры:</h3>
                <?php
                    foreach($allROM as $key => $value):
                ?>
                <div class="platform">
                    <p class="platforms_item"><?= $value['jeanre'];?></p>
                    <form action="../deleteROM.php" method="post">
                        <input type="hidden" name="idROM" value="<?= $value['id']?>">
                        <button class="delete_but_form"  class="delete_but_form">Удалить</button>
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