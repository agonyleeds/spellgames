<?php 
    include 'core.php';
    if(isset($_SESSION['user'])){
        if(!empty($_POST['memory_id'])){
            $memory = $_POST['memory_id'];
            $productId = $_POST['product_id'];
            $addColor = mysqli_query($link, "INSERT INTO `product_jeanre` (`product_id`, `jeanre_id`) VALUES ('$productId', '$memory')");
            $_SESSION['success']['addProductMemory'] = "Вы успешно добавили память ROM товару!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else{
            $_SESSION['error']['addProductMemory'] = 'Ошибка! Заполните поля!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    else{
        header("location: index.php");
    }
?>