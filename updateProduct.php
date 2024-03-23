<?php
include 'core.php';
if (!empty($_POST['nameUpdate']) and !empty($_POST['priceUpdate']) and !empty($_POST['descriptionUpdate']) and !empty($_POST['idUpdate']) and !empty($_POST['guaranteeUpdate']) and !empty($_POST['modelUpdate']) and !empty($_POST['release_yearUpdate']) and !empty($_POST['diagonalUpdate']) and !empty($_POST['resolutionUpdate'])) {
    $productId = $_POST['idUpdate'];
    $productName = $_POST['nameUpdate'];
    $productPrice = $_POST['priceUpdate'];
    $productDescription = $_POST['descriptionUpdate'];
    $productGuarantee = $_POST['guaranteeUpdate'];
    $productModel = $_POST['modelUpdate'];
    $productReleaseYear = $_POST['release_yearUpdate'];
    $productDiagonal = $_POST['diagonalUpdate'];
    $productResolution = $_POST['resolutionUpdate'];
    $productImg = $_FILES['imgUpdate'];
    $productImages = $_FILES['imgUpdate_Slider'];
    if(empty($productImg['name'])){
        mysqli_query($link, "UPDATE `products` SET `name`='$productName', `price`='$productPrice', `descriptions` = '$productDescription', `guarantee` = '$productGuarantee', `kategory_id` = '$productModel', `release_year` = '$productReleaseYear', `diagonal` = '$productDiagonal', `resolution` = '$productResolution' WHERE `id`='$productId'");
    }
    elseif("image" == substr($productImg['type'], 0, 5)){
        $deleteoldimg = mysqli_query($link, "SELECT `img` FROM `products` WHERE id=$productId");
        $deleteres = mysqli_fetch_assoc($deleteoldimg);
        $deletelink = "assets/upload_images/{$deleteres['img']}";
        unlink($deletelink);
        $nameImg = uniqid().".".substr($productImg['type'], 6);
        move_uploaded_file($productImg['tmp_name'], "assets/upload_images/".$nameImg);
        mysqli_query($link, "UPDATE `products` SET `name`='$productName', `price`='$productPrice', `descriptions` = '$productDescription', `img` = '$nameImg', `guarantee` = '$productGuarantee', `kategory_id` = '$productModel', `release_year` = '$productReleaseYear', `diagonal` = '$productDiagonal', `resolution` = '$productResolution' WHERE `id`='$productId'");
    }
    if(empty($productImages['name'])){
        mysqli_query($link, "UPDATE `products` SET `name`='$productName', `price`='$productPrice', `descriptions` = '$productDescription', `guarantee` = '$productGuarantee', `kategory_id` = '$productModel', `release_year` = '$productReleaseYear', `diagonal` = '$productDiagonal', `resolution` = '$productResolution' WHERE `id`='$productId'");
    }
    elseif("image" == substr($productImages['type'], 0, 5)){
        $nameImg_Slider = uniqid().".".substr($productImages['type'], 6);
        move_uploaded_file($productImages['tmp_name'], "assets/upload_images/".$nameImg_Slider);
        mysqli_query($link, "INSERT INTO `gallery` (`product_id`, `img`) VALUES ('$productId', '$nameImg_Slider')");
    }

    $_SESSION['success']['updateProduct'] = 'Вы успешно обновили товар в БД!';
    header("location:".$_SERVER['HTTP_REFERER']);
}
else {
    $_SESSION['error']['updateProductError'] = 'Заполните поля!';
    header("location:".$_SERVER['HTTP_REFERER']);
}
?>