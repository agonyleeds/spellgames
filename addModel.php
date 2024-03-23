<?php 
    include 'core.php';
    if(!empty($_POST['addModel'])){
        $model = $_POST['addModel'];
        $addColor = mysqli_query($link, "INSERT INTO `kategories` (`kategory`) VALUES ('$model')");
        $_SESSION['success']['addModel'] = "Модель успешно добавлена в базу данных!";
        header('location: product/addModel_page.php');
    }
    else{
        $_SESSION['error']['addModel'] = "Заполните поле!";
        header("Location: product/addModel_page.php");
    }
?>