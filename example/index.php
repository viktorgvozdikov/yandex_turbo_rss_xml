<?
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = (new YandexTurbo())
    ->setTitle('Первый тест')
    ->setDescription('Описание канала')
    ->setLink( 'https://ya.ru')
    ->setLanguage( \ModuleBZ\ISO\enum\ISO639_1::_RU)
    ->addYandexMetrica(5000,['a'=>'b'])
    ->addLiveInternet('hello')
    ->addGoogleAnalytics(5000)
    ->addMailRu(7500)
    ->addRamblerTop(10000)
    ->addMediascope(12000)
    ->addCustomMetric('https://ya.ru/')
    ->addAdNetworkYandex('идентификатор блока','first_ad_place')
    ->addAdNetworkAdFox('second_ad_place',"<div id=\"идентификатор контейнера\"></div><script> window.Ya.adfoxCode.create({ ownerId: 123456, containerId: 'идентификатор контейнера', params: { pp: 'g', ps: 'cmic', p2: 'fqem' } }); </script>")
;
$turbo->addItem(
    (new Item())->setPubDate(time())
     ->addMetricsYandexSchemaIdentifier(100)
     ->addMetricsBreadcrumb('https://gvozdikov.net','Главная')
     ->addMetricsBreadcrumb('https://gvozdikov.net/log','Разное')
     ->setHeaderH1('Первая новость')
     ->setHeaderH2('Подзаголовок')
     ->setHeaderImg('https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg')
     ->addHeaderMenu('https://gvozdikov.net','Пукнт 1')
     ->addHeaderMenu('https://gvozdikov.net','Пукнт 2')
     ->addHeaderMenu('https://gvozdikov.net','Пукнт 3')
     ->setLink('https://gvozdikov.net')
     ->setAuthor('Виктор')
     ->setIsTurbo(true)
     ->setContent(str_repeat('<p>Тут будет контент новости</p>',20))
     ->setRelatedInfinity(true)
     ->setTurboSource('https://source.ru')
     ->setTurboTopic('topic')
     ->addRelated('https://gvozdikov.net/about','Обо мне')
     ->addRelated('https://gvozdikov.net/portfolio','Портфолио','https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg')
);

//$turbo->echoXml();
echo htmlspecialchars($turbo);
