<?php
include 'core.php';
if (!empty($_POST['idROM'])) {
    $ROMId = $_POST['idROM'];
    mysqli_query($link, "DELETE FROM `jeanres` WHERE id = $ROMId");
    $_SESSION['success']['deleteROM'] = 'Вы успешно удалили ROM из БД!';
    header('location: product/addROM_page.php');
}
else {
    $_SESSION['error']['deleteROM'] = 'Ошибка!';
    header('location: product/addROM_page.php');
}
?>