<?php 
    include 'core.php';
    if(isset($_SESSION['user'])){
        if(!empty($_POST['color_id'])){
            $color = $_POST['color_id'];
            $productId = $_POST['product_id'];
            $addColor = mysqli_query($link, "INSERT INTO `product_platforms` (`product_id`, `platform_id`) VALUES ('$productId', '$color')");
            $_SESSION['success']['addProductColor'] = "Вы успешно добавили цвет товару!";
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else{
            $_SESSION['error']['addProductColor'] = 'Ошибка! Заполните поля!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
    }
    else{
        header("location: index.php");
    }
?>