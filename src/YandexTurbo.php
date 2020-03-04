<?php

namespace ModuleBZ;

use ModuleBZ\YandexTurbo\Analytics\YandexMetrica;
use  ModuleBZ\YandexTurbo\EAnalyticsOptions;
use ModuleBZ\YandexTurbo\EAnalyticsType;

class YandexTurbo {
    /**
     * Название RSS-канала.
     * Если экспортируется содержимое всего сайта, укажите название сайта. Если экспортируется раздел сайта, укажите только название раздела.
     * @var string
     */
    var $title;
    /**
     * Домен сайта, данные которого транслируются.
     * @var string
     */
    var $link;
    /**
     * Описание канала одним предложением. Не используйте HTML-разметку.
     * @var string
     */
    var $description;
    /**
     * Можно использовать enumerator \ModuleBZ\ISO\enum\ISO639_1::_RU
     * @see \ModuleBZ\ISO\enum\ISO639_1
     * @link https://packagist.org/packages/modulebz/iso
     * @var string Язык статьи по стандарту ISO 639-1
     */
    var $language;

    /**
     * @var array массив для turbo:analytics
     */
    private $analytics = [];

    /**
     * @param $id string | int номер счётчика
     * @param array $params array | \stdClass
     * @return YandexTurbo
     */
    function addYandeMetrica( $id, $params = []){ $this->analytics[] = new YandexMetrica($id,$params); return $this;}

    private function analyticsToString(){
        $res ='';
        foreach ($this->analytics as $v) $res .= $v;
        return $res;
    }
    public function __construct() {

    }
    public function __toString() {
        return '<?xml version="1.0" encoding="UTF-8"?>'."\n"
.'<rss xmlns:yandex="http://news.yandex.ru"
     xmlns:media="http://search.yahoo.com/mrss/"
     xmlns:turbo="http://turbo.yandex.ru"
     version="2.0"><channel>'
            .(($c = $this->title)?'<title>'.$c.'</title>':'')
            .(($c = $this->link)?'<link>'.$c.'</link>':'')
            .(($c = $this->description)?'<description>'.$c.'</description>':'')
            .(($c = $this->language)?'<language>'.$c.'</language>':'')
            .$this->analyticsToString()
        .'</channel></rss>';
    }
}
