<?php 
    include 'core.php';
    if (!empty($_POST['addROM'])) {
        $rom = $_POST['addROM'];
        $addROM = mysqli_query($link, "INSERT INTO `jeanres` (`jeanre`) VALUES ('$rom')");
        $_SESSION['success']['addROM'] = "Цвет успешно добавлен в базу данных!";
        header('location: product/addROM_page.php');
    }
    else{
        $_SESSION['error']['addROM'] = "Заполните поле!";
        header("location: product/addROM_page.php");
    }
?>