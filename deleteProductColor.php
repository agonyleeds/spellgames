<?php 
    include 'core.php';
    if(isset($_SESSION['user'])){
        if(!empty($_POST['color_id_product'])){
            $colorProduct = $_POST['color_id_product'];
            $deleteProductColor = mysqli_query($link, "DELETE FROM `product_platforms` WHERE `id` = '$colorProduct'");
            $_SESSION['success']['deleteProductColor'] = 'Вы успешно удалили цвет товару!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else{
            $_SESSION['error']['deleteProductColor'] = 'Ошибка! Пустое поле!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        
    }
        
?>