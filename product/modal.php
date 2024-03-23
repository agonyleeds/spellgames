<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main-modal">
        <div class="main-modal-container">
            <div class="main-modal__h-input-block">
                <div class="main-modal-exit__input">
                    <input type="button" id="modal-exit" value="Закрыть">
                </div>
                <div class="main-modal__h">
                    <h3>Напишите свой отзыв</h3>
                </div>
                
            </div>
            <div class="main-modal-name">
                <input type="text" id="modal-name" placeholder="Имя">
            </div>
            <div class="main-modal-text">
                <textarea name="modal-text" id="modal-text"  placeholder="текст отзыва"></textarea>
            </div>
            <form action="">
                    <select name="" id="">
                        <option value="">Звёзд: 1</option>
                        <option value="">Звёзд: 2</option>
                        <option value="">Звёзд: 3</option>
                        <option value="">Звёзд: 4</option>
                        <option value="">Звёзд: 5</option>
                    </select>
            </form>
            <div class="main-modal__button">
                <button id="modal-add" name="modal-add">Добавить отзыв</button>
            </div>
        </div>            
    </div>
</body>
</html>