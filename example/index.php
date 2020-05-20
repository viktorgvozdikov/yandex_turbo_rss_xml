<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Audio;
use ModuleBZ\YandexTurbo\Element\Card;
use ModuleBZ\YandexTurbo\Element\Cards;
use ModuleBZ\YandexTurbo\Element\Gallery;
use ModuleBZ\YandexTurbo\Element\Image;
use ModuleBZ\YandexTurbo\Element\Slider;
use ModuleBZ\YandexTurbo\Element\Video;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = (new YandexTurbo())
    // Добавление заголовка
    ->setTitle('Первый тест')
    // Добавление описания
    ->setDescription('Описание канала')
    // Указание ссылки на сайт
    ->setLink( 'https://gvozdikov.net/')
    // Установка языка
    ->setLanguage( \ModuleBZ\ISO\enum\ISO639_1::_RU)
    // Добавление различных метрик
    // Добавление метрики: Яндекс.Метрика
    ->addYandexMetrica(5000,['a'=>'b'])
    // Добавление метрики: LiveInternet
    ->addLiveInternet('hello')
    // Добавление метрики: GoogleAnalytics
    ->addGoogleAnalytics(50005)
    // Добавление метрики: Mail.ru
    ->addMailRu(7500)
    // Добавление метрики: Rambler Top
    ->addRamblerTop(10000)
    // Добавление метрики: Mediascope
    ->addMediascope(12000)
    // Добавление метрики: Подключение собственной метрики
    ->addCustomMetric('https://ya.ru/')
    // Подключение реклмного блока яндекса
    ->addAdNetworkYandex('идентификатор блока','first_ad_place')
    // Подключение реклмного блока adfox
    ->addAdNetworkAdFox('second_ad_place',"<div id=\"идентификатор контейнера\"></div><script> window.Ya.adfoxCode.create({ ownerId: 123456, containerId: 'идентификатор контейнера', params: { pp: 'g', ps: 'cmic', p2: 'fqem' } }); </script>")
;

// Формиурем заготовленные блоки контента, которые часто повторяются в статьх.
// Например формы обратной связи, ссылки на соц. сети. и т.д.
$form = (new Content())
    ->addHtml('<p>Если у вас остались вопросы, то вы можете их задать нам в этой форме обратной связи</p>');



// Добавляем новую статью в RSS
$turbo->addItem(
    (new Item())
    // Указываем заголовок статьи
    ->setHeaderH1('Первая новость')
    // Указываем подзаголовок статьи
    ->setHeaderH2('Подзаголовок')
    // Указываем адрес картинки для статьи в заголовок
    ->setHeaderImg('https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg')
    // Указываем пункты меню
    ->addHeaderMenu('https://gvozdikov.net','Пукнт 1')
    ->addHeaderMenu('https://gvozdikov.net','Пукнт 2')
    ->addHeaderMenu('https://gvozdikov.net','Пукнт 3')
    // Указываем хлебные крошки  статьи
    ->addHeaderBreadcrumbs('https://gvozdikov.net','Главная')
    ->addHeaderBreadcrumbs('https://gvozdikov.net/usefull','Полезное')
    ->addHeaderBreadcrumbs('https://gvozdikov.net/usefull/page1','Страница 1')
    // Указываем дату публикации
    ->setPubDate(time())
    // Укаызваем ссылку на статью
    ->setLink('https://gvozdikov.net')
    // Укаызваем автора статьи
    ->setAuthor('Виктор')
    // Укзаываем, это турбо статья, по умолчанию true
    ->setIsTurbo(true)
    // Указываем как подгружать схожие статьи
    ->setRelatedInfinity(true)
    // Указываем схожие статьи
    ->addRelated('https://gvozdikov.net/about','Обо мне')
    ->addRelated('https://gvozdikov.net/portfolio','Портфолио','https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg')
    // указываем идентификатор статьи
    ->addMetricsYandexSchemaIdentifier(100)
    // Указываем рубрики
    ->addMetricsBreadcrumb('https://gvozdikov.net','Главная')
    // Указываем рубрики
    ->addMetricsBreadcrumb('https://gvozdikov.net/log','Разное')
    // Указываем URL страницы-источника, который можно передать в Яндекс.Метрику.
    ->setTurboSource('https://source.ru')
    // Указываем заголовок страницы, который можно передать в Яндекс.Метрику.
    ->setTurboTopic('topic')

    // Задаём контент новости
    ->setContent( (new Content())
        // Добавляем просто html inline-блоки
        ->addHtml('<p>Привет, меня зовут Виктор.</p>')

        // Добавляем просто картинку без подписи
        ->addImage(new Image('https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png'))
        // Добавляем просто картинку с подписью
        ->addImage(new Image(
            'https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png'
            ,'Как во Flutter установить цвет текста для AppBar.'
            )
        )
        // Добавляем просто картинку с подписью и дополнительными аттрибутыми для картинки и заголовка. Аттрибуты яндекс проигнорирует, но они могут быть нужны для версии статьи на сайте
        ->addImage(new Image(
            'https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png'
                ,'Как во Flutter установить цвет текста для AppBar.'
                ,['alt'=>'Картинка','width'=>'200px']
                ,['style'=>'color:red']
            )
        )

        // Добавляем галерею
        ->addGallery((new Gallery())
            ->addImage('https://clck.ru/FFAuR')
            ->addImage('https://clck.ru/FFAvn')
            ->setHeader('Заголовок галереи')
        )


        // Добавляем аудио
        ->addAudio(new Audio('https://clck.ru/MJY6J'))

        // Добавляем видео
        //->addVideo((new Video(300,200,"https://clck.ru/Kiunj",15)))

        // Добавляем аккардион
        ->addAccordion((new Accordion())
            // Добавляем пункты в аккардеон
            ->addItem('О чём проект','<p>Это очень интересный проект</p>')
            ->addItem('Как оплатить','<p>Пока никак, но скоро как-нибудь можно будет</p>',true)
            ->addItem('Контакты','<p>Есть контакт</p>')
        )

        ->addSlider((new Slider())
            // Указываем заголовок слайдера
            ->setHeader('Заголовок слайдера')
            // Добавляем картинку
            ->addImage((new Image('https://clck.ru/FFAuR')))
            // Добавляем картинку с подписью
            ->addImage((new Image('https://clck.ru/FFAuR','Картинка с подписью')))
            // Добавляем видео в слайдер. При добавлении видео в слайдер, превью картинки обязательно
            ->addVideo((new Video(300,200,"https://clck.ru/Kiunj",15,'https://clck.ru/FFAuR')))
            // Добавляем видео с подпистб в слайдер. При добавлении видео в слайдер, превью картинки обязательно
            ->addVideo((new Video(300,200,"https://clck.ru/Kiunj",15,'https://clck.ru/FFAuR','Видео с подписью')))
            // Добавляем рекламный блок РСЯ в слайдеры
            ->addTurboAdID('123456')
            // Добавляем ссылку в слайдер
            ->addLink('https://gvozdikov.net','Читайте мой блог')
        )


        // Добавляем карточки на страницу
        ->addCards((new Cards())
            // Добавляем карточку
            ->addCard((new Card())
                // Указываем картинку в шапку
                ->setHeaderImage('https://clck.ru/FFAuR')
                // Указываем текст в шапке
                ->setHeaderTitle('Заголовок карточки')
                // Задаём контет в карточке
                ->setContent('<p>Это мой контент</p><p><b>А это </b><i>вторая </i><del>карточка</del> <ins>строка</ins></p>')
                // Указываем ссылку в подвале
                ->setFooter('http://gvozdikov.net/','Продолжение')
                // Указываем ссылку "читать ещё"
                ->setMore('http://gvozdikov.net/','Читать ещё')
            )
            // Добавляем вторую карточку для красоты примера
            ->addCard((new Card())
                // Указываем картинку в шапку
                ->setHeaderImage('https://clck.ru/FFAuR')
                // Указываем текст в шапке
                ->setHeaderTitle('Заголовок карточки')
                // Задаём контет в карточке
                ->setContent('<p>Это мой контент</p><p><b>А это </b><i>вторая </i><del>карточка</del> <ins>строка</ins></p>')
                // Указываем ссылку в подвале
                ->setFooter('http://gvozdikov.net/','Продолжение')
                // Указываем ссылку "читать ещё"
                ->setMore('http://gvozdikov.net/','Читать ещё')
            )
        )

        // Добавляем блоки, которые у нас повторяются во всех статьях
        ->addContent($form)
    )
);

// Выводим сразу xml файл с необходимыми заголовками
$turbo->echoXml();
// Или сначала смотрим получившийся код в формате строки
///echo htmlspecialchars($turbo);
