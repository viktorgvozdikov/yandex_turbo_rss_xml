# Акардеон

Добавление аккордеона в контент яндекс турбо страницы

## Код генерации
```php
<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\AccordionItem;
use ModuleBZ\YandexTurbo\Item;

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
```

## Результат

```xhtml
<div data-block="accordion">
	<div data-block="item" data-title="Первый заголовок">
		<p>Контент элемента</p>
	</div>
	<div data-block="item" data-title="Второй заголовок" data-expanded="true">
		<p>Контент элемента</p>
	</div>
	<div data-block="item" data-title="Третий заголовок">
		<p>Контент элемента</p>
	</div>
</div>
```


