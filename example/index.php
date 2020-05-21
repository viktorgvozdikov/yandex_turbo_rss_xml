<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Ad;
use ModuleBZ\YandexTurbo\Element\Audio;
use ModuleBZ\YandexTurbo\Element\Button;
use ModuleBZ\YandexTurbo\Element\CallbackForm;
use ModuleBZ\YandexTurbo\Element\Card;
use ModuleBZ\YandexTurbo\Element\Cards;
use ModuleBZ\YandexTurbo\Element\Carousel;
use ModuleBZ\YandexTurbo\Element\Feed;
use ModuleBZ\YandexTurbo\Element\FeedItem;
use ModuleBZ\YandexTurbo\Element\Fold;
use ModuleBZ\YandexTurbo\Element\Gallery;
use ModuleBZ\YandexTurbo\Element\Histogram;
use ModuleBZ\YandexTurbo\Element\HistogramItem;
use ModuleBZ\YandexTurbo\Element\Image;
use ModuleBZ\YandexTurbo\Element\InPage;
use ModuleBZ\YandexTurbo\Element\Rating;
use ModuleBZ\YandexTurbo\Element\Search;
use ModuleBZ\YandexTurbo\Element\Share;
use ModuleBZ\YandexTurbo\Element\Slider;
use ModuleBZ\YandexTurbo\Element\Snippet;
use ModuleBZ\YandexTurbo\Element\Video;
use ModuleBZ\YandexTurbo\Enum\EFeedItemThumbPosition;
use ModuleBZ\YandexTurbo\Enum\EFeedItemThumbRatio;
use ModuleBZ\YandexTurbo\Enum\EFeedLayout;
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
        ->addVideo((new Video(300,200,"https://clck.ru/Kiunj",15)))

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

        // Добавляем карусель
        ->addCarousel((new Carousel())
            ->setHeader('Заголовок карусели')
            ->addSnippet(new Snippet('Заголовок','https://clck.ru/FFAuR','https://gvozdikov.net/'))
            ->addSnippet(new Snippet('Второй заголовок','https://clck.ru/FFAvn','https://gvozdikov.net/'))
        )

        // Добавляем длинный текст, с кнопкой "читать ещё"
        ->addFold(new Fold('Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.'))

        // Добавляем вертикальный блок "Читайте также"
        ->addFeed((new Feed())
            ->setTitle('Читайте также')
            ->setLayout(EFeedLayout::VERTICAL)
            ->addItem(
                (new FeedItem())
                    ->setTitle('Заголовок')
                    ->setDescription('Описание элемента')
                    ->setHref('https://gvozdikov.net')
                    ->setThumb('https://clck.ru/FFAvn')
                    ->setThumbPosition(EFeedItemThumbPosition::TOP)
                    ->setThumbRatio(EFeedItemThumbRatio::RATIO_4_3)
            )
            ->addItem(
                (new FeedItem())
                    ->setTitle('Заголовок')
                    ->setDescription('Описание элемента')
                    ->setHref('https://gvozdikov.net')
                    ->setThumb('https://clck.ru/FFAvn')
                    ->setThumbPosition(EFeedItemThumbPosition::LEFT)
                    ->setThumbRatio(EFeedItemThumbRatio::RATIO_1_1)
            )
            ->addItem(
                (new FeedItem())
                    ->setTitle('Заголовок')
                    ->setDescription('Описание элемента')
                    ->setHref('https://gvozdikov.net')
                    ->setThumb('https://clck.ru/FFAvn')
                    ->setThumbPosition(EFeedItemThumbPosition::RIGHT)
                    ->setThumbRatio(EFeedItemThumbRatio::RATIO_3_4)
            )
        )

        // Добавляем горизонтальный блок "Читайте также" (элементы продублированы из предыдущего блока)
        ->addFeed((new Feed())
            ->setTitle('Читайте также горизонтально')
            ->setLayout(EFeedLayout::HORIZONTAL)
            ->addItem(
                (new FeedItem())
                    ->setTitle('Заголовок')
                    ->setDescription('Описание элемента')
                    ->setHref('https://gvozdikov.net')
                    ->setThumb('https://clck.ru/FFAvn')
                    ->setThumbRatio(EFeedItemThumbRatio::RATIO_4_3)
            )
            ->addItem(
                (new FeedItem())
                    ->setTitle('Заголовок 2')
                    ->setDescription('Описание элемента 2')
                    ->setHref('https://gvozdikov.net')
                    ->setThumb('https://clck.ru/FFAvn')
                    ->setThumbRatio(EFeedItemThumbRatio::RATIO_4_3)
            )
        )

        // Добавляем рекламу
        ->addAd((new Ad())
            ->setAdId('123456')
            ->setMobile(true)
            ->setDesktop(true)
        )

        // Добавляем рекламу InPage
        ->addInPage((new InPage())
            ->setAdId('123456')
            ->setInpageAdId('64654654')
        )

        // Добавляем кнопку, чтобы нам могли позвонить
        ->addButton((new Button())
            ->setText('Позвоните нам')
            ->setFormAction('tel:+7(495)77777777')
            ->setBackground('#222')
            ->setColor('#eee')
            ->setPrimary(true)
            ->setTurbo(true)
        )

        // Добавляем неактивную кнопку
        ->addButton((new Button())
            ->setText('Не пишите нам')
            ->setFormAction('mailto:mail@gvozdikov.net')
            ->setBackground('red')
            ->setColor('white')
            ->setDisabled(true)
        )

        // Добавляем кнопку с формой обратной связи
        ->addButton((new Button())
            ->setText('Напишите нам')
            ->setFormAction('mailto:mail@gvozdikov.net')
            ->setBackground('green')
            ->setColor('white')
            ->setSendTo('mail@gvozdikov.net')
            ->setAgreementCompany('ООО «Гвоздиков.нет»')
            ->setAgreementLink('https://gvozdikov.net/confidential/')
        )


        // Добавление формы поиска
        ->addSearch((new Search())
            ->setName('text')
            ->setPlaceholder('Давайте что-нибудь поищем')
            ->setAction('https://gvozdikov.net/search/?text={text}')
        )

        // Добавление звёздочек рейтинга
        ->addRating((new Rating())
            ->setValue(5)
            ->setBest(10)
        )
        // Добавление звёздочек рейтинга, их можно добавлять несколько
        ->addRating((new Rating())
            ->setValue(4)
            ->setBest(5)
        )

        // Добавляем кнпоку "поделиться" и расставляем кнопки в нужном нам порядке
        ->addShare((new Share())
            ->addVkontakte()
            ->addTelegram()
            ->addOdnoklassniki()
            ->addFacebook()
            ->addTwitter()
        )

        // Добавляем форму обратной связи
        ->addCallbackForm((new CallbackForm())
            ->setSendTo('mail@gvozdikov.net')
            ->setAgreementCompany('ООО «Гвоздиков.нет»')
            ->setAgreementLink('https://gvozdikov.net/confidential/')
        )

        // Добавляем гистограмму
        ->addHistogram((new Histogram())
            ->addItem((new HistogramItem())
                ->setValue(5)
                ->setHeight(5)
                ->setTitle('ПН')
                ->setColor('red')
                ->setIcon('https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg')
            )
            ->addItem((new HistogramItem())
                ->setValue(50)
                ->setHeight(10)
                ->setTitle('ВТ')
                ->setColor('blue')
                ->setIcon('https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg')
            )
            ->addItem((new HistogramItem())
                ->setValue(200)
                ->setHeight(15)
                ->setTitle('СР')
                ->setColor('green')
                ->setIcon('https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg')
            )
            ->addItem((new HistogramItem())
                ->setValue(500)
                ->setHeight(20)
                ->setTitle('ЧТ')
                ->setColor('purple')
                ->setIcon('https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg')
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
