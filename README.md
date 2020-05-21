# Генерация rss в формате xml для яндекс turbo

## Установка

```composer require modulebz/yandex_turbo_rss_xml```

## TODO:
Генерация элементов:
- Рекламные блоки
- Кнопка
- Поиск
- Рейтинг
- Обратная связь
- Комменатрии
- Форма обратной связи
- Динамическая форма
- Гистограма
- video iframe

Генерация встраиваемого контента
- Facebook
- Вконтакте
- Одноклассники
- Instagram
- Twitter
- Яндекс.Карты
- Яндекс.Музыка
- Яндекс.Маркет и Беру
- Playbuzz
- Apester



### Пример использования 

Тут приведены все возможные функции для генерации 

```php
<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;
use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Audio;
use ModuleBZ\YandexTurbo\Element\Card;
use ModuleBZ\YandexTurbo\Element\Cards;
use ModuleBZ\YandexTurbo\Element\Carousel;
use ModuleBZ\YandexTurbo\Element\Fold;
use ModuleBZ\YandexTurbo\Element\Gallery;
use ModuleBZ\YandexTurbo\Element\Image;
use ModuleBZ\YandexTurbo\Element\Share;
use ModuleBZ\YandexTurbo\Element\Slider;
use ModuleBZ\YandexTurbo\Element\Snippet;
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

        // Добавляем карусель
        ->addCarousel((new Carousel())
            ->setHeader('Заголовок карусели')
            ->addSnippet(new Snippet('Заголовок','https://clck.ru/FFAuR','https://gvozdikov.net/'))
            ->addSnippet(new Snippet('Второй заголовок','https://clck.ru/FFAvn','https://gvozdikov.net/'))
        )

        // Добавляем длинный текст, с кнопкой "читать ещё"
        ->addFold(new Fold('Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.'))



        // Добавляем кнпоку "поделиться" и расставляем кнопки в нужном нам порядке
        ->addShare((new Share())->addVkontakte()->addTelegram()->addOdnoklassniki()->addFacebook()->addTwitter())


    )
);

// Выводим сразу xml файл с необходимыми заголовками
$turbo->echoXml();
// Или сначала смотрим получившийся код в формате строки
///echo htmlspecialchars($turbo);


```
### Результат

```xhtml
<?xml version = "1.0" encoding = "UTF-8"?>
<rss xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:turbo="http://turbo.yandex.ru" version="2.0">
  <channel><title>Первый тест</title>
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
    <turbo:adNetwork type="AdFox" turbo-ad-id="second_ad_place"><![CDATA[
      <div id="идентификатор контейнера"></div>
      <script> window.Ya.adfoxCode.create({
              ownerId: 123456,
              containerId: 'идентификатор контейнера',
              params: {pp: 'g', ps: 'cmic', p2: 'fqem'}
          }); </script>
      ]]>
    </turbo:adNetwork>
    <item turbo="true">
      <author>Виктор</author>
      <turbo:source>https://source.ru</turbo:source>
      <turbo:topic>topic</turbo:topic>
      <link>https://gvozdikov.net</link>
      <pubDate>Thu, 21 May 20 12:04:32 +0300</pubDate>
      <yandex:related type="infinity">
        <link url="https://gvozdikov.net/about">Обо мне</link>
        <link url="https://gvozdikov.net/portfolio" img="https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg">Портфолио</link></yandex:related>
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
        <header><h1>Первая новость</h1>
          <h2>Подзаголовок</h2>
          <figure><img src="https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg"></figure>
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
        <figure><img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png"/></figure>
        <figure><img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png"/><figcaption>Как во Flutter установить цвет текста для AppBar.</figcaption></figure>
        <figure><img src="https://gvozdikov.net/upload/images/acc1/1583066709_6113933_0500_95_0_1.png" alt="Картинка" width="200px"/><figcaption style="color:red">Как во Flutter установить цвет текста для AppBar.</figcaption></figure>
        <div data-block="gallery"><img src="https://clck.ru/FFAuR"/><img src="https://clck.ru/FFAvn"/>
          <header>Заголовок галереи</header>
        </div>
        <div data-block="audio" src="https://clck.ru/MJY6J"></div>
        <div data-block="accordion">
          <div data-block="item" data-title="О чём проект"><p>Это очень интересный проект</p></div>
          <div data-block="item" data-title="Как оплатить" data-expanded="true"><p>Пока никак, но скоро как-нибудь можно будет</p></div>
          <div data-block="item" data-title="Контакты"><p>Есть контакт</p></div>
        </div>
        <div data-block="slider" data-view="landscape" data-item-view="contain">
          <header>Заголовок слайдера</header>
          <figure>
              <img src="https://clck.ru/FFAuR"/>
          </figure>
          <figure>
              <img src="https://clck.ru/FFAuR"/>
            <figcaption>Картинка с подписью</figcaption>
          </figure>
          <figure>
            <video width="300" height="200">
              <source src="https://clck.ru/Kiunj" type="video/mp4" data-duration="15"/>
            </video>
            <img src="https://clck.ru/FFAuR"/></figure>
          <figure>
            <video width="300" height="200">
              <source src="https://clck.ru/Kiunj" type="video/mp4" data-duration="15"/>
            </video>
            <img src="https://clck.ru/FFAuR"/>
            <figcaption>Видео с подписью</figcaption>
          </figure>
          <figure data-turbo-ad-id="123456"></figure>
          <figure><a href="https://gvozdikov.net">Читайте мой блог</a></figure>
        </div>
        <div data-block="cards">
          <div data-block="card">
            <header><img src="https://clck.ru/FFAuR">
              <h2>Заголовок карточки</h2></header>
            <p>Это мой контент</p>
            <p><b>А это </b><i>вторая </i><del>карточка</del><ins>строка</ins>
            </p>
            <footer><a data-block="button" href="http://gvozdikov.net/">Продолжение</a></footer>
            <div data-block="more"><a href="http://gvozdikov.net/">Читать ещё</a></div>
          </div>
          <div data-block="card">
            <header><img src="https://clck.ru/FFAuR">
              <h2>Заголовок карточки</h2></header>
            <p>Это мой контент</p>
            <p><b>А это </b><i>вторая </i><del>карточка</del><ins>строка</ins>
            </p>
            <footer><a data-block="button" href="http://gvozdikov.net/">Продолжение</a></footer>
            <div data-block="more"><a href="http://gvozdikov.net/">Читать ещё</a></div>
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
        <div data-block="share" data-network="vkontakte, telegram, odnoklassniki, facebook, twitter"></div>
      ]]>
      </turbo:content>
    </item>
  </channel>
</rss>
```
