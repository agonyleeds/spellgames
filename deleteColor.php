<?php
include 'core.php';
if (!empty($_POST['idColor'])) {
    $colorId = $_POST['idColor'];
    mysqli_query($link, "DELETE FROM `platforms` WHERE id = $colorId");
    $_SESSION['success']['deleteColor'] = 'Вы успешно удалили цвет из БД!';
    header('location: product/addColor_page.php');
}
else {
    $_SESSION['error']['deleteColor'] = 'Ошибка!';
    header('location: product/addColor_page.php');
}
?>