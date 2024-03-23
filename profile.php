<?php
include "core.php";

$id = $_SESSION['user']['id'];
$result =  mysqli_query($link, "SELECT * FROM `users` WHERE `id` = '$id'");
$profile = mysqli_fetch_array($result);

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
    <title>Профиль - <?=$profile['login']?></title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
   
    <div class="wrapper">
        <div class="main">
            
            <div class="block_profile_win">
                
                    <div class="profile_win">
                        <div class="profile_img"><img src="assets/img/Avatar-2636.jp" alt="" class="avatar"></div>
                        <!-- <div class="profile_img"><img src="assets/img/profile.png" alt="" class="avatar_stock"></div> -->
                        <div class="profie_info">
                        <div class="profile_string"><div class="info_p">Ваш логин:</div><span class="user_info"><?=$profile['login']?></span></div>    
                        <div class="profile_string"><div class="info_p">Ваша электронная почта:</div><span  class="user_info"><?=$profile['email']?></span></div> 
                        <div class="profile_string"><div class="info_p">Ваша дата рождения:</div><span  class="user_info"><?=$profile['birthday']?></span></div>   

                            <div class="profile_info_button">
                                <a href="updateProfile.php"class="spans_profile_panel_update">Обновить профиль</a>
                                <a href="#"class="spans_profile_panel_update">Корзина</a>
                                <a href="exit.php"class="spans_profile_panel_update">Выйти с учетной записи</a>
                            </div> 

                        </div>
                    </div>
                
            
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