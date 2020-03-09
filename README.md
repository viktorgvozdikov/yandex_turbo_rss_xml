# Генерация rss в формате xml для яндекс turbo

## Установка

```composer require modulebz/yandex_turbo_rss_xml```

### Пример использования 

Тут приведены все возможные функции для генерации 

```php
<?php
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = (new YandexTurbo())
    // Добавление заголовка
    ->setTitle('Первый тест')
    // Добавление описания
    ->setDescription('Описание канала')
    // Указание ссылки на сайт
    ->setLink( 'https://ya.ru')
    // Установка языка
    ->setLanguage( \ModuleBZ\ISO\enum\ISO639_1::_RU)
    // Добавление различных метрик
    // Добавление метрики: Яндекс.Метрика
    ->addYandexMetrica(5000,['a'=>'b'])
    // Добавление метрики: LiveInternet
    ->addLiveInternet('hello')
    // Добавление метрики: GoogleAnalytics
    ->addGoogleAnalytics(5000)
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
    // Указываем хлебные крошки статьи
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
    ->setContent(str_repeat('<p>Тут будет контент новости</p>',20))
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

```
### Результат

```xhtml
<?xml version = "1.0" encoding = "UTF-8"?>
<rss xmlns:yandex="http://news.yandex.ru" xmlns:media="http://search.yahoo.com/mrss/" xmlns:turbo="http://turbo.yandex.ru" version="2.0">
    <channel><title>Первый тест</title>
        <link>https://ya.ru</link>
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
            <![CDATA[
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
            <pubDate>Mon, 09 Mar 20 18:49:17 +0000</pubDate>
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
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                    <p>Тут будет контент новости</p>
                ]]>
            </turbo:content>
        </item>
    </channel>
</rss>
```
