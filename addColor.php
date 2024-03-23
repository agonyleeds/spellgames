<?php 
    include 'core.php';
    if($_POST['addColor']){
        $color = $_POST['addColor'];
        $addColor = mysqli_query($link, "INSERT INTO `platforms` (`platform`) VALUES ('$color')");
        $_SESSION['success']['addColor'] = "Цвет успешно добавлен в базу данных!";
        header('location: product/addColor_page.php');
    }
    elseif($_POST['addColor_Picker']){
        $colorPicker = $_POST['addColor_Picker'];
        $addColor = mysqli_query($link, "INSERT INTO `platforms` (`platform`) VALUES ('$colorPicker')");
        $_SESSION['success']['addColor'] = "Цвет успешно добавлен в базу данных!";
        header('location: product/addColor_page.php');
    }
?>