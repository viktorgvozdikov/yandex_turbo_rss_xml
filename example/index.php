<?
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Item;

include_once "../vendor/autoload.php";

$turbo = new YandexTurbo();
$turbo->setTitle('Первый тест')
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
;
$item = new Item;
$item->setPubDate(time())
    ->addMetricsYandexSchemaIdentifier(100)
    ->addMetricsBreadcrumb('https://gvozdikov.net','Главная')
    ->addMetricsBreadcrumb('https://gvozdikov.net/log','Разное')
    ->setLink('https://gvozdikov.net')
    ->setAuthor('Виктор')
    ->setIsTurbo(true)
    ->setRelatedInfinity(true)
    ->setTurboSource('https://source.ru')
    ->setTurboTopic('topic')
    ->addRelated('https://gvozdikov.net','Дарова')
    ->addRelated('https://gvozdikov.net','Дарова','https://gvozdikov.net/content/gvozdikov/pics/avatar.jpg')
;

$turbo->addItem($item);

//$turbo->echoXml();
echo htmlspecialchars($turbo);
