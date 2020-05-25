<?php
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Audio;

include_once "../vendor/autoload.php";

// создаём новый объект контента
$content = (new Content())
    // Добавляем аудио
    ->addAudio(new Audio('https://clck.ru/MJY6J'))
;
// смотрим результат
echo $content;

