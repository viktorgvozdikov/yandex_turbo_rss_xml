<?
use \ModuleBZ\YandexTurbo;

include_once "../vendor/autoload.php";

$turbo = new YandexTurbo();
$turbo->title = 'Первый тест';
$turbo->description = 'Описание канала';
$turbo->link = 'https://ya.ru';
$turbo->language = \ModuleBZ\ISO\enum\ISO639_1::_RU;
echo htmlspecialchars($turbo);
