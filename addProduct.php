<?php
include 'core.php';
if (!empty($_POST['name_product']) and !empty($_POST['price_product']) and !empty($_POST['description_product']) and !empty($_POST['guarantee_product']) and !empty($_POST['release_year_product']) and !empty($_POST['diagonal_product']) and !empty($_POST['resolution_product'])) {
  $productName = $_POST['name_product'];
  $productPrice = $_POST['price_product'];
  $productDescription = $_POST['description_product'];
  $productGuarantee = $_POST['guarantee_product'];
//  $productModel = $_POST['model_product'];
  $productReleaseYear = $_POST['release_year_product'];
  $productDiagonal = $_POST['diagonal_product'];
  $productResolution = $_POST['resolution_product'];
  $productModel = $_POST['productModels'];
  $productImg = $_FILES['img_product'];
  if("image" == substr($productImg['type'], 0, 5)){
    $nameImg = uniqid().".".substr($productImg['type'], 6);
    move_uploaded_file($productImg['tmp_name'], "assets/upload_images/".$nameImg);
    mysqli_query($link, "INSERT INTO `products` (`name`, `price`, `descriptions`, `img`, `guarantee`, `release_year`, `diagonal`, `resolution`, `kategory_id`) VALUES ('$productName', '$productPrice', '$productDescription', '$nameImg', '$productGuarantee','$productReleaseYear', '$productDiagonal', '$productResolution', '$productModel')");
    $_SESSION['success']['addProduct'] = 'Вы успешно добавили товар в БД!';
    header('location: product/admin_panel.php#add_Tovar');
  }
  else{
    $_SESSION['error']['addProductError'] = 'Заполните поля!';
    header('location: product/admin_panel.php#add_Tovar');
  }
}
else {
  $_SESSION['error']['addProductError'] = 'Заполните поля!';
  header('location: product/admin_panel.php#add_Tovar');
}
?>
