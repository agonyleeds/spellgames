<?php 
    include 'core.php';
     
  if(isset($_POST['reg']) ){
    $password = md5($_POST['password']);

    $link -> query("INSERT INTO `users`(`login`, `password`, `isAdmin`, `email`, `birthday`) 
    VALUES ('{$_POST['login']}','{$password}', 0 ,'{$_POST['email']}','{$_POST['birthday']}')");
    // var_dump($_POST['reg']);
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
    <title>Регистрация</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
   
   <div class="wrapper">
        <div class="main">
               <div class="half_reg">

                    <div id="randomChange" class="random-change reg" >
                        
                    </div>

                    <div class="reg_block">
                        <h1 class="h2_reg">Начни пользоваться магазином</h1>
                        <h1 class="color_h3_reg">Spell Games</h1>

                        <form action="" class="form_reg" method="post">
                            <p><input placeholder="Логин" name="login" type="text" class="input_log" required></p>
                            <p><input placeholder="Пароль" name="password" type="password" class="input_log "required></p>
                            <p><input placeholder="Электронная почта" name="email" type="email" class="input_log" required></p>
                            <p><input placeholder="Дата рождения" name="birthday" type="date" class="input_log" required></p>

                            <button name="reg" class="button_reg">Создать аккаунт</button>

                        </form>

                        <p class="p_hr_reg">Или</p>

                        <p class="h2_reg">Уже есть аккаунт? Войдите в систему:</p>
                        <a href="login.php"><button class="button_reg">Авторизироваться</button></a>

                        <!-- <h3 class="h2_log">Подпишитесь на рассылку по электронной почте:</h3>
                        <div class="subs_win_reg">
                            <input required  type="email" name="subscribition" class="subscribition_reg" placeholder="Электронная почта" id="subs_email_input"> 
                            <button name="subs" class="subs_reg">Подписаться</button>
                        </div> -->

                    </div>

               </div>
        
        </div>
        
    </div>
 
    <?php 
        include "footer.php";
    ?>


    <script src="components/range/nouislider.min.js"></script>
    <script src="components/scroll/aos.js"></script> 
    <script src="range/script.js"></script>
    <script src="script.js"></script>
    
</body>
</html>