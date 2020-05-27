<?php
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Button;

include_once "../vendor/autoload.php";

// создаём новый объект контента
$content = (new Content())
    // Добавление кнопки
    ->addButton((new Button())
        // Указываем кнопку
        ->setText('Позвоните нам')
        // Указание действия кнопки
        ->setFormAction('tel:+7(495)77777777')
        // Установка фона кнопки
        ->setBackground('#222')
        // Установка цветка кнопки
        ->setColor('#eee')
        // Сделать текст кнопки жирным
        ->setPrimary(true)
        // Указать, что надо перейти именно на турбо страницу
        ->setTurbo(true)
    )
;
// смотрим результат
echo $content;
