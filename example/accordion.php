<?php
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;

include_once "../vendor/autoload.php";

// создаём новый объект контента
$content = (new Content())
    // Добавляем в него аккордеон
    ->addAccordion((new Accordion())
        // Добавляем элементы в аккаордеон
        // Добавляем первый - он будет не раскрытым по умолчанию
        ->addItem('Первый заголовок','<p>Контент элемента</p>')
        // Доблавяем второй - он будет раскрытым
        ->addItem('Второй заголовок','<p>Контент элемента</p>',true)
        // И доблавяем третий элемент
        ->addItem('Третий заголовок','<p>Контент элемента</p>')
    );


// смотрим результат
echo $content;

