<?
use \ModuleBZ\YandexTurbo;

include_once "../vendor/autoload.php";

$turbo = new YandexTurbo();
$turbo->setTitle('Первый тест')
    ->setDescription('Описание канала')
    ->setLink( 'https://ya.ru')
    ->setLanguage( \ModuleBZ\ISO\enum\ISO639_1::_RU)
    ->addYandeMetrica(5000,['a'=>'b'])
    ->addLiveInternet('hello')
    ->addGoogleAnalytics(5000)
    ->addMailRu(7500)
    ->addRamblerTop(10000)
    ->addMediascope(12000)
    ->addCustomMetric('https://ya.ru/')
;

echo htmlspecialchars($turbo);
