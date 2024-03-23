<?php 
    include 'core.php';
    if(isset($_SESSION['user'])){
        header("Location: index.php");
    }
    
    if(isset($_POST['log'])){
        $password = md5($_POST['password']);
    
        $users = $link->query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' AND `password` = '{$password}'");
        // var_dump($_POST['log']);
        if($users ->num_rows != 0){
    
            $user = $users->fetch_assoc();
            $_SESSION['user'] = [
                'id' => $user['id'],
                'isAdmin' => $user['isAdmin']
            ];
            header("Location: index.php");
        } else{
            $error = "Не верный логин или пароль";
        }
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
    <title>Авторизация</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>
   
   <div class="wrapper">
        <div class="main">
               <div class="half_reg">
                    <div class="reg_block">
                        

                        <h1 class="h2_reg">Авторизируйся, играй</h1>
                        <h1 class="color_h3_reg">Spell Games</h1>

                        <form action="" class="form_reg" method="post">
                            <p><input placeholder="Логин" name="login" type="text" class="input_log" required></p>
                            <p><input placeholder="Пароль" name="password" type="password" class="input_log" required></p>
                            
                            <button name="log" class="button_reg">Войти</button>

                        </form>

                        <?php  
                                if(isset($error)){
                                    echo "<p id='error'>$error</p>";
                                }
                            ?>

                        <p class="p_hr_reg">Или</p>

                        <p class="h2_reg">Еще нет аккаунта? Зарегистрируйтесь:</p>
                        <a href="reg.php"><button class="button_reg">Зарегистрироваться</button></a>

                        
                    </div>

                    <div id="randomChange" class="random-change reg" >
                        
                    </div>
            </div>
        </div>
        
    </div>
 
    <?php 
        include "footer.php";
    ?>
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