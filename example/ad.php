<?php
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Ad;

include_once "../vendor/autoload.php";

// создаём новый объект контента
$content = (new Content())
    // Добавляем рекламу
    ->addAd((new Ad())
        // Указываем id рекламы
        ->setAdId('123456')
        // Включён ли рекламный блок на мобильных устройствах
        ->setMobile(true)
        // Включён ли рекламный блок на дескптопных устройствах
        ->setDesktop(true)
    )
;
// смотрим результат
echo $content;

