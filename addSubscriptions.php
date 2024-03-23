<?php 
    include 'core.php';
    $email = $_POST['email_footer'];

    if(empty($email)){
        $_SESSION['error']['email'] = 'Ошибка! Заполните поле E-Mail!';
    }
    elseif(isset($_POST['footer-email__button'])){
        $_SESSION['success']['email'] = 'Вы успешно подписались на рассылку!';
        $email;
        mysqli_query($link, "INSERT INTO `subscriptions` (`email`) VALUES ('$email')");
    };
    header('location: index.php#contact');
    
?>