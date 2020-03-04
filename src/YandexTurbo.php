<?php

namespace ModuleBZ;

use ModuleBZ\YandexTurbo\Analytics\CustomMetric;
use ModuleBZ\YandexTurbo\Analytics\GoogleAnalytics;
use ModuleBZ\YandexTurbo\Analytics\LiveInternet;
use ModuleBZ\YandexTurbo\Analytics\MailRu;
use ModuleBZ\YandexTurbo\Analytics\MediaScope;
use ModuleBZ\YandexTurbo\Analytics\RamblerTop;
use ModuleBZ\YandexTurbo\Analytics\YandexMetrica;
use  ModuleBZ\YandexTurbo\EAnalyticsOptions;
use ModuleBZ\YandexTurbo\EAnalyticsType;

class YandexTurbo {
    public function __construct() {

    }
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
    function addYandexMetrica( $id, $params = []){ $this->analytics[] = new YandexMetrica($id,$params); return $this;}
    /**
     * @param string $name
     * @return $this
     */
    function addLiveInternet( $name = ''){ $this->analytics[] = new LiveInternet($name); return $this;}

    /**
     * @param int | string $id
     * @return $this
     */
    function addGoogleAnalytics( $id ){ $this->analytics[] = new GoogleAnalytics($id); return $this;}

    /**
     * @param int | string $id
     * @return $this
     */
    function addMailRu( $id ){ $this->analytics[] = new MailRu($id); return $this;}

    /**
     * @param int | string $id
     * @return $this
     */
    function addRamblerTop( $id ){ $this->analytics[] = new RamblerTop($id); return $this;}


    /**
     * @param int | string $id
     * @return $this
     */
    function addMediascope( $id ){ $this->analytics[] = new Mediascope($id); return $this;}

    /**
     * @param string $url
     * @return $this
     */
    function addCustomMetric( $url ){ $this->analytics[] = new CustomMetric($url); return $this;}


    private function analyticsToString():string{
        $res ='';
        foreach ($this->analytics as $v) $res .= $v;
        return $res;
    }

    /**
     * @param $title string
     * @return $this
     */
    public function setTitle($title)               {$this->title = $title;              return $this;}

    /**
     * @param $description string
     * @return $this
     */
    public function setDescription($description)   {$this->description = $description;  return $this;}

    /**
     * @param $link string
     * @return $this
     */
    public function setLink($link)                 {$this->link = $link;                return $this;}

    /**
     * Можно использовать enumerator \ModuleBZ\ISO\enum\ISO639_1::_RU
     * @see \ModuleBZ\ISO\enum\ISO639_1
     * @link https://packagist.org/packages/modulebz/iso
     * @param $language string
     * @return $this
     */
    public function setLanguage($language)         {$this->language = $language;        return $this;}

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
