# Акардеон

Добавление аудио в контент яндекс турбо страницы

## Код генерации
```php
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

```

## Результат

```xhtml
<div data-block="audio" src="https://clck.ru/MJY6J"></div>
```


