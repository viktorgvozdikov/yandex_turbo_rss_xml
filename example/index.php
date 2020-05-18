<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = (new YandexTurbo())
    // Добавление заголовка
    ->setTitle('Первый тест')
    // Добавление описания
    ->setDescription('Описание канала')
    // Указание ссылки на сайт
    ->setLink( 'https://gvozdikov.net')
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
    // Задаём контент новости
    ->setContent( (new Content())
        // Добавляем просто html inline-блоки
        ->addHtml('<p>Привет, меня зовут Виктор.</p>')

        // Добавляем просто картинку без подписи
        ->addImage('https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png')
        // Добавляем просто картинку с подписью
        ->addImage(
            'https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png'
                ,'Как во Flutter установить цвет текста для AppBar.'
        )
        // Добавляем просто картинку с подписью и дополнительными аттрибутыми для картинки и заголовка. Аттрибуты яндекс проигнорирует, но они могут быть нужны для версии статьи на сайте
        ->addImage(
            'https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png'
            ,'Как во Flutter установить цвет текста для AppBar.'
            ,['alt'=>'Картинка','width'=>'200px']
            ,['style'=>'color:red']
        )

        // Добавляем аккардион
        ->addAccordion((new Accordion())
            // Добавляем пункты в аккардеон
            ->addItem('О чём проект','<p>Это очень интересный проект</p>')
            ->addItem('Как оплатить','<p>Пока никак, но скоро как-нибудь можно будет</p>',true)
            ->addItem('Контакты','<p>Есть контакт</p>')
        )


        // Добавляем блоки, которые у нас повторяются во всех статьях
        ->addContent($form)
    )
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
);

// Выводим сразу xml файл с необходимыми заголовками
$turbo->echoXml();
// Или сначала смотрим получившийся код в формате строки
///echo htmlspecialchars($turbo);
