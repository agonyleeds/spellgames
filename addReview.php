<?php 
    include 'core.php';
    if(!empty($_POST['review_author']) and !empty($_POST['review_desc'])){
        $review_author = $_POST['review_author'];
        $review_desc = $_POST['review_desc'];
        $review_point = $_POST['product_point'];
        $product_id = $_POST['product_id'];
        $addReview = mysqli_query($link, "INSERT INTO `reviews` (`product_id`, `name`, `descriptions`, `point`) VALUES ('$product_id', '$review_author', '$review_desc', '$review_point')");
        $addReviewProducts = mysqli_query($link, "UPDATE `products` SET `point` = (`point`+'$review_point'), `count_reviews` = (`count_reviews`+1) WHERE `id` = '$product_id'");
        
        $_SESSION['success']['addReview'] = "Отзыв успешно добавлен!";
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        $_SESSION['error']['addReview'] = "Заполните поля!";
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
?>