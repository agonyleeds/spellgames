<?php 
    include 'core.php';
    if(isset($_SESSION['user'])){
        if(!empty($_POST['memory_id_product'])){
            $memoryProduct = $_POST['memory_id_product'];
            $deleteProductMemory = mysqli_query($link, "DELETE FROM `product_jeanre` WHERE `id` = '$memoryProduct'");
            $_SESSION['success']['deleteProductMemory'] = 'Вы успешно удалили память ROM товару!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        else{
            $_SESSION['error']['deleteProductMemory'] = 'Ошибка! Пустое поле!';
            header('location:'.$_SERVER['HTTP_REFERER']);
        }
        
    }
        
?>