# Генератор yandex turbo страниц в формате xml

## Установка

```composer require modulebz/yandex_turbo_rss_xml```

```php
<?
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = (new YandexTurbo())
    // Добавление заголовка
    ->setTitle('Первый тест')
    // Добавление описания
    ->setDescription('Описание канала')
    // Указание ссылки на сайи
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

// Выводим сразу xml файл
$turbo->echoXml();
// Или сначала смотрим получившийся код в формате строки
///echo htmlspecialchars($turbo);

```
