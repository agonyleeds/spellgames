<?php
include "./core.php";

$id = $_SESSION['user']['id'];
$result = $link -> query("SELECT * FROM `users` WHERE `id` = '$id'");
$profile = mysqli_fetch_assoc($result);


if (isset($_POST["updateProfile"])) {
    
    $link-> query("UPDATE `users` SET `login`='{$_POST['login']}',`email`='{$_POST['email']}' WHERE `id` = '$id'");
    $id = $_SESSION['user']['id'];
    $result = $link -> query("SELECT * FROM `users` WHERE `id` = '$id'");
    $profile = mysqli_fetch_assoc($result);
}

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
        <div class="block_profile_win">
                <div class="profile_win_blur">
                <!-- onerror="this.style.visibility = 'hidden'" Avatar-2636.jpg -->
                    <form method="post" class="profile_win">
                        <div class="profile_img"><img src="assets/img/Avatar-2636.jp" alt="" class="avatar"></div>
                        <!-- <div class="profile_img"><img src="assets/img/profile.png" alt="" class="avatar_stock"></div> -->
                        <div class="profie_info">
                            <div class="profile_string"><div class="info_p">Новый логин:</div>
                                <span class="user_info"><input value="<?=$profile['login']?>" class="upd_inp_profile" type="text" name="login" id=""></span>
                            </div>    
                            <div class="profile_string"><div class="info_p">Новая электронная почта:</div>
                                <span class="user_info"><input value="<?=$profile['email']?>" class="upd_inp_profile" type="email" name="email" id=""></span>
                            </div> 
                            <!-- <div class="profile_string"><div class="info_p">Новая дата рождения:</div><span  class="user_info"><?=$profile['birthday']?></span></div>    -->
                            <div class="profile_info_button">
                                <button name="updateProfile" id="spans_profile_panel_update">Обновить профиль</button>
                                <a onclick="location.reload()" class="spans_profile_panel_update">Отменить изменения</a>
                                <a href="profile.php" class="spans_profile_panel_update">Профиль</a>
                            </div> 

                        </div>
                    </form>
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