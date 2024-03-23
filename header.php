<?php 
    include 'core.php';
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
    <link rel="shortcut icon" href="./assets/img/spell games 1.png" type="image/x-icon">
   <!-- <link rel="stylesheet" href="range/style.css"> -->

</head>
<header class="header" data-aos="fade-up">

    <div class="header_list">
        
        <a href="http://localhost/%d0%9a%d0%9a%d0%9a/index.php" class="logo"><img src="./assets/img/spell games 1.png" alt="" class="logo_img"></a>
        
        <?php if(!isset($_SESSION['user'])): ?>
            <p class="p_header"><a href="./index.php" class="link_header">Главная</a></p>
            <p class="p_header"><a href="" class="link_header">Каталог</a></p>
            <p class="p_header"><a href="" class="link_header">Контакты</a></p>
            <p class="p_header"><a href="reg.php" class="link_header">Вход</a></p>

        <?php else: ?>
            <p class="p_header"><a href="../index.php" class="link_header">Главная</a></p>
            <p class="p_header"><a href="" class="link_header">Каталог</a></p>
            <p class="p_header"><a href="" class="link_header">Контакты</a></p>
            <p class="p_header"><a href="profile.php" class="link_header">Профиль</a></p>
            <p class="p_header"><a href="" class="link_header">Корзина</a></p>
            <!-- <p class="p_header"><a href="login.php" class="link_header">Вход</a></p> -->
        <?php if($_SESSION['user']['isAdmin']==1): ?> 

            <p class="p_header"><a href="./product/admin_panel.php" class="link_header">Админ панель</a></p>

        <?php endif; ?> 

            <p class="p_header"><a href="exit.php" class="link_header">Выход</a></p>

        <?php endif; ?> 
        
    </div>

        
</header>