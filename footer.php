<?php 
    include "core.php";

    if(isset($_POST['subs'])){

        $link->query("INSERT INTO `subscriptions`(`email`) VALUES ('{$_POST['subscribition']}')");
    }

?>
<footer class="footer" id="contact" data-aos="fade-up">
    <div class="footer_block footer_block_1">
       <a href="#" class="footer_a"><div class="footer_img"><img src="assets/img/free-icon-font-discord.png" alt="" class="social_img"></div></a>
       <a href="#" class="footer_a"><div class="footer_img"><img src="assets/img/free-icon-font-facebook.png" alt="" class="social_img"></div></a>
       <a href="#" class="footer_a"><div class="footer_img"><img src="assets/img/free-icon-font-twitter.png" alt="" class="social_img"></div></a>
       <a href="#" class="footer_a"><div class="footer_img"><img src="assets/img/free-icon-font-youtube.png" alt="" class="social_img"></div></a>
       
    </div>

    <div class="footer_block footer_block_2">
        <div class="footer_block_2_top">
            <form method="post" class="subs_win">
                <input type="email" name="subscribition" class="subscribition" placeholder="Электронная почта" id="subs_email_input" required> 
                <button name="subs" class="subs">Подписаться</button> 
            </form>
            
        </div>
        <div class="footer_block_2_bottom">
       
            <p class="p_header"><a href="./index.php" class="link_header">Главная</a></p>
            <p class="p_header"><a href="" class="link_header">Каталог</a></p>
            <p class="p_header"><a href="" class="link_header">Контакты</a></p>
            
            <!-- <p class="p_header"><a href="login.php" class="link_header">Вход</a></p> -->
      
        </div>
    </div>

    <div class="footer_block footer_block_3">
        <a href="#" class="footer_a"><div><img src="assets/img/upper3 3.png" alt="" class="social_upper"></div></a>
       
    </div>
    
    <script src="scripts/jquery.min.js"></script>
    <script src="scripts/jquery.maskedinput.min.js"></script>
    <script src="scripts/script.js"></script>
</footer>