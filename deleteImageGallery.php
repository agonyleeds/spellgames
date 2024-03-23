<?php
    include('core.php');
    if(isset($_POST['deleteGalleryImgBtn'])){
        $productImageId = $_POST['delImgProductId'];
        $deleteoldimgGallery = mysqli_query($link, "SELECT * FROM `gallery` WHERE `id` = '$productImageId'");
        $deleteresGallery = mysqli_fetch_assoc($deleteoldimgGallery);
        $deletelinkGallery = "assets/upload_images/{$deleteresGallery['img']}";
        unlink($deletelinkGallery);
        mysqli_query($link,"DELETE FROM `gallery` WHERE `id` = '{$deleteresGallery['id']}'");
        header("location:".$_SERVER['HTTP_REFERER']."#productGallery");
    }
?>