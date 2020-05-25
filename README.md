# Генерация rss в формате xml для яндекс turbo

При помощи этой библиотеки можно сгенерировать rss ленту для яндекс турбо страниц.  
Для генерации самих страниц также реализован генератор контента со всей необходимой разметкой.

[Подробные примеры](https://gvozdikov.net/yandex_turbo/)

Добавление элементов в контент турбо страницы:
- [Accordion](/docs/accordion.md) Аккордеон 
- [Ad](/docs/ad.md) Реклама РСЯ
- [Audio](/docs/audio.md) Аудио

Todo: 
- Button
- CallbackForm
- Cards
- Carousel
- Comments
- Feed
- Feedback
- Fold
- Form
- Gallery
- Histogram
- Image
- InPage
- Link
- Rating
- Search
- Share
- Slider
- Snippet
- Video


## Установка

```composer require modulebz/yandex_turbo_rss_xml```

### Пример использования всех функций генератора

Тут приведены все возможные функции для генерации 

```php
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
use ModuleBZ\YandexTurbo\Element\Comment;
use ModuleBZ\YandexTurbo\Element\Comments;
use ModuleBZ\YandexTurbo\Element\Feed;
use ModuleBZ\YandexTurbo\Element\Feedback;
use ModuleBZ\YandexTurbo\Element\FeedItem;
use ModuleBZ\YandexTurbo\Element\Fold;
use ModuleBZ\YandexTurbo\Element\Form;
use ModuleBZ\YandexTurbo\Element\FormRadioOption;
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
use ModuleBZ\YandexTurbo\Enum\EFeedbackStick;
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

        // Добавляем комментарии
        ->addComments((new Comments())
            ->setUrl('https://gvozdikov.net/addComment.php')
            ->addComment((new Comment())
                ->setAuthor('Виктор')
                ->setSubtitle('вчера')
                ->setAvatarUrl('https://clck.ru/KyKNk')
                ->setHeader('Заголовок')
                ->setContent('<p>Первый комментарий на сайте</p>')
                ->setComments((new Comments())
                    ->addComment((new Comment())
                        ->setAuthor('Виктор')
                        ->setSubtitle('сегодня')
                        ->setAvatarUrl('https://clck.ru/KyKNk')
                        ->setHeader('Заголовок')
                        ->setContent('<p>Первый подкомментарий на сайте</p>')
                    )
                    ->addComment((new Comment())
                        ->setAuthor('Виктор')
                        ->setSubtitle('сегодня')
                        ->setAvatarUrl('https://clck.ru/KyKNk')
                        ->setHeader('Заголовок')
                        ->setContent('<p>Второй подкомментарий на сайте</p>')
                    )
                )
            )
            ->addComment((new Comment())
                ->setAuthor('Виктор')
                ->setSubtitle('вчера')
                ->setAvatarUrl('https://clck.ru/KyKNk')
                ->setHeader('Заголовок')
                ->setContent('<p>Второй комментарий на сайте</p>')
            )
        )

        // Добавление кнопок обратной связи - незакреплённые
        ->addFeedback((new Feedback())
            ->setTitle("Давайте пообщаемся")
            ->setStick(EFeedbackStick::FALSE)
            ->addCall('+7123456789')
            ->addCallbackForm('mail@gvozdikov.net','ООО «Гвоздиков.нет»','https://gvozdikov.net/confidential/')
            ->addEmail('mail@gvozdikov.net')
            ->addChat()
            ->addFacebook('https://ya.ru/')
            ->addGoogle('https://ya.ru/')
            ->addOdnoklassniki('https://ya.ru/')
            ->addTelegram('https://ya.ru/')
            ->addTwitter('https://ya.ru/')
            ->addVkontakte('https://ya.ru/')
            ->addWhatsapp('https://ya.ru/')
        )

        // Добавление кнопок обратной связи - закреплённые слева
        ->addFeedback((new Feedback())
            ->setTitle("Давайте пообщаемся")
            ->addCall('+7123456789')
            ->addCallbackForm('mail@gvozdikov.net','ООО «Гвоздиков.нет»','https://gvozdikov.net/confidential/')
            ->addEmail('mail@gvozdikov.net')
            ->addChat()
        )

        // Добавляем динамическую форму
        ->addForm((new Form)
            ->setEndPoint('https://gvozdikov.net/endPoint.php')
            ->setSubmitText('Скорее отправить')
            ->addResultText('description')
            ->addResultLink('link')
            ->addInputText('name','Имя','Введите имя')
            ->addInputNumber('cats','Сколько у вас кошек','10')
            ->addInputDate('birth_date','Когда день рождение?','1970.01.01')
            ->addTextarea('comment','Ваш комментарий','Комментарий','Здравствуйте, ')
            ->addCheckbox('subscribe','yes','Подписаться на новости')
            ->addSelect('dogs','Сколько у вас собак','two',['one'=>'Одна','two'=>'Две','three'=>'Три','more'=>'Больше 3х'])
            ->addRadio('delivery','Как доставить?',[
                new FormRadioOption('moscow','Москва','сегодня',true),
                new FormRadioOption('spb','Санкт-Петербург','завтра'),
                new FormRadioOption('Venus','Венера','3010 год'),
            ])
        )

    )
);

// Выводим сразу xml файл с необходимыми заголовками
$turbo->echoXml();
// Или сначала смотрим получившийся код в формате строки
///echo htmlspecialchars($turbo);


```
### Результат

```xhtml


<?xml version="1.0" encoding="UTF-8"?>
<rss
	xmlns:yandex="http://news.yandex.ru"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:turbo="http://turbo.yandex.ru" version="2.0">
	<channel>
		<title>Первый тест</title>
		<link>https://gvozdikov.net/</link>
		<description>Описание канала</description>
		<language>ru</language>
		<turbo:analytics type="Yandex" id="5000" params='{"a":"b"}'></turbo:analytics>
		<turbo:analytics type="LiveInternet" params="hello"></turbo:analytics>
		<turbo:analytics type="Google" id="50005"></turbo:analytics>
		<turbo:analytics type="MailRu" id="7500"></turbo:analytics>
		<turbo:analytics type="Rambler" id="10000"></turbo:analytics>
		<turbo:analytics type="Mediascope" id="12000"></turbo:analytics>
		<turbo:analytics type="custom" url="https://ya.ru/"></turbo:analytics>
		<turbo:adNetwork type="Yandex" id="идентификатор блока" turbo-ad-id="first_ad_place"></turbo:adNetwork>
		<turbo:adNetwork type="AdFox" turbo-ad-id="second_ad_place">
			<![CDATA[<div id="идентификатор контейнера"></div><script> window.Ya.adfoxCode.create({ ownerId: 123456, containerId: 'идентификатор контейнера', params: { pp: 'g', ps: 'cmic', p2: 'fqem' } }); </script>]]>
		</turbo:adNetwork>
		<item turbo="true">
			<author>Виктор</author>
			<turbo:source>https://source.ru</turbo:source>
			<turbo:topic>topic</turbo:topic>
			<link>https://gvozdikov.net</link>
			<pubDate>Fri, 22 May 20 13:17:59 +0300</pubDate>
			<yandex:related type="infinity">
				<link url="https://gvozdikov.net/about">Обо мне</link>
				<link url="https://gvozdikov.net/portfolio" img="https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg">Портфолио</link>
			</yandex:related>
			<metrics>
				<yandex schema_identifier="100">
					<breadcrumblist>
						<breadcrumb url="https://gvozdikov.net" text="Главная"/>
						<breadcrumb url="https://gvozdikov.net/log" text="Разное"/>
					</breadcrumblist>
				</yandex>
			</metrics>
			<turbo:content>
				<![CDATA[
<header>
	<h1>Первая новость</h1>
	<h2>Подзаголовок</h2>
	<figure>
		<img src="https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg"/>
	</figure>
	<menu>
		<a href="https://gvozdikov.net">Пукнт 1</a>
		<a href="https://gvozdikov.net">Пукнт 2</a>
		<a href="https://gvozdikov.net">Пукнт 3</a>
	</menu>
	<div data-block="breadcrumblist">
		<a href="https://gvozdikov.net">Главная</a>
		<a href="https://gvozdikov.net/usefull">Полезное</a>
		<a href="https://gvozdikov.net/usefull/page1">Страница 1</a>
	</div>
</header>
<p>Привет, меня зовут Виктор.</p>
<figure>
	<img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png" />
</figure>
<figure>
	<img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png" />
	<figcaption >Как во Flutter установить цвет текста для AppBar.</figcaption>
</figure>
<figure>
	<img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png" alt="Картинка" width="200px"/>
	<figcaption style="color:red">Как во Flutter установить цвет текста для AppBar.</figcaption>
</figure>
<div data-block="gallery">
	<img src="https://clck.ru/FFAuR"/>
	<img src="https://clck.ru/FFAvn"/>
	<header>Заголовок галереи</header>
</div>
<div data-block="audio" src="https://clck.ru/MJY6J"></div>
<figure>
	<video width="300" height="200">
		<source src="https://clck.ru/Kiunj" type="video/mp4" data-duration="15" />
	</video>
</figure>
<div data-block="accordion">
	<div data-block="item" data-title="О чём проект">
		<p>Это очень интересный проект</p>
	</div>
	<div data-block="item" data-title="Как оплатить" data-expanded="true">
		<p>Пока никак, но скоро как-нибудь можно будет</p>
	</div>
	<div data-block="item" data-title="Контакты">
		<p>Есть контакт</p>
	</div>
</div>
<div data-block="slider"  data-view="landscape" data-item-view="contain">
	<header>Заголовок слайдера</header>
	<figure>
		<img src="https://clck.ru/FFAuR" />
	</figure>
	<figure>
		<img src="https://clck.ru/FFAuR" />
		<figcaption >Картинка с подписью</figcaption>
	</figure>
	<figure>
		<video width="300" height="200">
			<source src="https://clck.ru/Kiunj" type="video/mp4" data-duration="15" />
		</video>
		<img src="https://clck.ru/FFAuR"/>
	</figure>
	<figure>
		<video width="300" height="200">
			<source src="https://clck.ru/Kiunj" type="video/mp4" data-duration="15" />
		</video>
		<img src="https://clck.ru/FFAuR"/>
		<figcaption>Видео с подписью</figcaption>
	</figure>
	<figure data-turbo-ad-id="123456"></figure>
	<figure>
		<a href="https://gvozdikov.net">Читайте мой блог</a>
	</figure>
</div>
<div data-block="cards">
	<div data-block="card">
		<header>
			<img src="https://clck.ru/FFAuR"/>
			<h2>Заголовок карточки</h2>
		</header>
		<p>Это мой контент</p>
		<p>
			<b>А это </b>
			<i>вторая </i>
			<del>карточка</del>
			<ins>строка</ins>
		</p>
		<footer>
			<a data-block="button" href="http://gvozdikov.net/">Продолжение</a>
		</footer>
		<div data-block="more">
			<a href="http://gvozdikov.net/">Читать ещё</a>
		</div>
	</div>
	<div data-block="card">
		<header>
			<img src="https://clck.ru/FFAuR"/>
			<h2>Заголовок карточки</h2>
		</header>
		<p>Это мой контент</p>
		<p>
			<b>А это </b>
			<i>вторая </i>
			<del>карточка</del>
			<ins>строка</ins>
		</p>
		<footer>
			<a data-block="button" href="http://gvozdikov.net/">Продолжение</a>
		</footer>
		<div data-block="more">
			<a href="http://gvozdikov.net/">Читать ещё</a>
		</div>
	</div>
</div>
<div data-block="cards">
	<div data-block="carousel">
		<header>Заголовок карусели</header>
		<div data-block="snippet" data-title="Заголовок" data-img="https://clck.ru/FFAuR" data-url="https://gvozdikov.net/"></div>
		<div data-block="snippet" data-title="Второй заголовок" data-img="https://clck.ru/FFAvn" data-url="https://gvozdikov.net/"></div>
	</div>
</div>
<div data-block="fold">
	<p>Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.</p>
</div>
<div data-block="feed" data-layout="vertical" data-title="Читайте также">
	<div data-block="feed-item" data-title="Заголовок" data-description="Описание элемента" data-href="https://gvozdikov.net" data-thumb="https://clck.ru/FFAvn" data-thumb-position="top" data-thumb-ratio="4x3"></div>
	<div data-block="feed-item" data-title="Заголовок" data-description="Описание элемента" data-href="https://gvozdikov.net" data-thumb="https://clck.ru/FFAvn" data-thumb-position="left" data-thumb-ratio="1x1"></div>
	<div data-block="feed-item" data-title="Заголовок" data-description="Описание элемента" data-href="https://gvozdikov.net" data-thumb="https://clck.ru/FFAvn" data-thumb-position="right" data-thumb-ratio="3x4"></div>
</div>
<div data-block="feed" data-layout="horizontal" data-title="Читайте также горизонтально">
	<div data-block="feed-item" data-title="Заголовок" data-description="Описание элемента" data-href="https://gvozdikov.net" data-thumb="https://clck.ru/FFAvn" data-thumb-ratio="4x3"></div>
	<div data-block="feed-item" data-title="Заголовок 2" data-description="Описание элемента 2" data-href="https://gvozdikov.net" data-thumb="https://clck.ru/FFAvn" data-thumb-ratio="4x3"></div>
</div>
<figure data-turbo-ad-id="123456" data-platform-mobile="true" data-platform-desktop="true"></figure>
<figure inpage="true"data-turbo-ad-id="123456"data-turbo-inpage-ad-id="64654654"></figure>
<button formaction="tel:+7(495)77777777" data-background-color="#222" data-color="#eee" data-turbo="true" data-primary="true">Позвоните нам</button>
<button formaction="mailto:mail@gvozdikov.net" data-background-color="red" data-color="white" data-turbo="true" disabled>Не пишите нам</button>
<button formaction="mailto:mail@gvozdikov.net" data-background-color="green" data-color="white" data-turbo="true" data-send-to="mail@gvozdikov.net" data-agreement-company="ООО «Гвоздиков.нет»" data-agreement-link="https://gvozdikov.net/confidential/">Напишите нам</button>
<form action="https://gvozdikov.net/search/?text={text}" method="GET">
	<input type="search" name="text" placeholder="Давайте что-нибудь поищем" />
</form>
<div itemscope itemtype="http://schema.org/Rating">
	<meta itemprop="ratingValue" content="5"/>
	<meta itemprop="bestRating" content="10"/>
</div>
<div itemscope itemtype="http://schema.org/Rating">
	<meta itemprop="ratingValue" content="4"/>
	<meta itemprop="bestRating" content="5"/>
</div>
<div data-block="share" data-network="vkontakte, telegram, odnoklassniki, facebook, twitter"></div>
<form data-type="callback" data-send-to="mail@gvozdikov.net" data-agreement-company="ООО «Гвоздиков.нет»" data-agreement-link="https://gvozdikov.net/confidential/"></form>
<div data-block="histogram">
	<div data-block="histogram-item" data-title="ПН" data-value="5" data-height="5" data-color="red" data-icon="https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg"></div>
	<div data-block="histogram-item" data-title="ВТ" data-value="50" data-height="10" data-color="blue" data-icon="https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg"></div>
	<div data-block="histogram-item" data-title="СР" data-value="200" data-height="15" data-color="green" data-icon="https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg"></div>
	<div data-block="histogram-item" data-title="ЧТ" data-value="500" data-height="20" data-color="purple" data-icon="https://yastatic.net/weather/i/icons/funky/dark/skc_d.svg"></div>
</div>
<div data-block="comments" data-url="https://gvozdikov.net/addComment.php">
	<div data-block="comment" data-author="Виктор" data-avatar-url="https://clck.ru/KyKNk" data-subtitle="вчера">
		<div data-block="content">
			<header>Заголовок</header>
			<p>Первый комментарий на сайте</p>
		</div>
		<div data-block="comments" >
			<div data-block="comment" data-author="Виктор" data-avatar-url="https://clck.ru/KyKNk" data-subtitle="сегодня">
				<div data-block="content">
					<header>Заголовок</header>
					<p>Первый подкомментарий на сайте</p>
				</div>
			</div>
			<div data-block="comment" data-author="Виктор" data-avatar-url="https://clck.ru/KyKNk" data-subtitle="сегодня">
				<div data-block="content">
					<header>Заголовок</header>
					<p>Второй подкомментарий на сайте</p>
				</div>
			</div>
		</div>
	</div>
	<div data-block="comment" data-author="Виктор" data-avatar-url="https://clck.ru/KyKNk" data-subtitle="вчера">
		<div data-block="content">
			<header>Заголовок</header>
			<p>Второй комментарий на сайте</p>
		</div>
	</div>
</div>
<div data-block="widget-feedback" data-title="Давайте пообщаемся" data-stick="false">
	<div data-type="call" data-url="+7123456789"></div>
	<div data-type="callback" data-send-to="mail@gvozdikov.net" data-agreement-company="ООО «Гвоздиков.нет»" data-agreement-link="https://gvozdikov.net/confidential/"></div>
	<div data-type="mail" data-url="mailto:mail@gvozdikov.net"></div>
	<div data-type="chat"></div>
	<div data-type="facebook" data-url="https://ya.ru/"></div>
	<div data-type="google" data-url="https://ya.ru/"></div>
	<div data-type="odnoklassniki" data-url="https://ya.ru/"></div>
	<div data-type="telegram" data-url="https://ya.ru/"></div>
	<div data-type="twitter" data-url="https://ya.ru/"></div>
	<div data-type="vkontakte" data-url="https://ya.ru/"></div>
	<div data-type="whatsapp" data-url="https://ya.ru/"></div>
</div>
<div data-block="widget-feedback" data-title="Давайте пообщаемся" data-stick="left">
	<div data-type="call" data-url="+7123456789"></div>
	<div data-type="callback" data-send-to="mail@gvozdikov.net" data-agreement-company="ООО «Гвоздиков.нет»" data-agreement-link="https://gvozdikov.net/confidential/"></div>
	<div data-type="mail" data-url="mailto:mail@gvozdikov.net"></div>
	<div data-type="chat"></div>
</div>
<form data-type="dynamic-form" end_point="https://gvozdikov.net/endPoint.php">
	<div type="input-block">
		<span label="Имя" type="input" name="name" required="false" placeholder="Введите имя" input-type="text"></span>
		<span label="Сколько у вас кошек" type="input" name="cats" required="false" placeholder="10" input-type="number"></span>
		<span label="Когда день рождение?" type="input" name="birth_date" required="false" placeholder="1970.01.01" input-type="date"></span>
		<span value="Здравствуйте, " label="Ваш комментарий" type="textarea" name="comment" required="false" placeholder="Комментарий"></span>
		<span value="yes" type="checkbox" name="subscribe" content="Подписаться на новости"></span>
		<span value="two" label="Сколько у вас собак" type="select" name="dogs">
			<span value="one" type="option" text="Одна"></span>
			<span value="two" type="option" text="Две"></span>
			<span value="three" type="option" text="Три"></span>
			<span value="more" type="option" text="Больше 3х"></span>
		</span>
		<span label="Как доставить?" type="radio" name="delivery">
			<span value="moscow" checked="1" label="Москва" meta="сегодня" type="option"></span>
			<span value="spb" label="Санкт-Петербург" meta="завтра" type="option"></span>
			<span value="Venus" label="Венера" meta="3010 год" type="option"></span>
		</span>
		<button type="submit" text="Скорее отправить"></button>
	</div>
	<div type="result-block">
		<span type="text" field="description"></span>
		<span type="text" field="link"></span>
	</div>
</form>
                ]]>
			</turbo:content>
		</item>
	</channel>
</rss>

```
