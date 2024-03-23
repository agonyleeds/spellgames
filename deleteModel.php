<?php
include 'core.php';
if (!empty($_POST['idModel'])) {
    $modelId = $_POST['idModel'];
    mysqli_query($link, "DELETE FROM `kategories` WHERE id = $modelId");
    $_SESSION['success']['deleteModel'] = 'Вы успешно удалили модель из БД!';
    header('location: product/addModel_page.php');
}
else {
    $_SESSION['error']['deleteModel'] = 'Ошибка!';
    header('location: product/addModel_page.php');
}
?>