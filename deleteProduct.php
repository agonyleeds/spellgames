<?php
include 'core.php';
if (!empty($_POST['id_product'])) {
    $productId = $_POST['id_product'];
    $deleteoldimg = mysqli_query($link, "SELECT `img` FROM `products` WHERE id=$productId");
    $deleteres = mysqli_fetch_assoc($deleteoldimg);
    $deletelink = "assets/upload_images/{$deleteres['img']}";
    unlink($deletelink);
    mysqli_query($link, "DELETE FROM `products` WHERE id = $productId");
    $_SESSION['success']['deleteProduct'] = 'Вы успешно удалили товар из БД!';
    header('location: product/admin_panel.php#delete_Tovar');
}
else {
    $_SESSION['error']['DeleteProductError'] = 'Заполните поле!';
    header('location: product/admin_panel.php#delete_Tovar');
}
?>