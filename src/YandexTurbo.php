<?php

namespace ModuleBZ;

use ModuleBZ\YandexTurbo\analytics\CustomMetric;
use ModuleBZ\YandexTurbo\analytics\GoogleAnalytics;
use ModuleBZ\YandexTurbo\analytics\LiveInternet;
use ModuleBZ\YandexTurbo\analytics\MailRu;
use ModuleBZ\YandexTurbo\analytics\MediaScope;
use ModuleBZ\YandexTurbo\analytics\RamblerTop;
use ModuleBZ\YandexTurbo\analytics\YandexMetrica;
use ModuleBZ\YandexTurbo\Item;

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

    /** @var Item[] - массив страниц */
    private $items = [];

    /** @var array  */
    private $ad_network_yandex = [];
    /** @var array  */
    private $ad_network_adfox = [];

    /**
     * @param string $block_id
     * @param string $turbo_ad_id
     * @return $this
     */
    function addAdNetworkYandex(string $block_id,string $turbo_ad_id){ $this->ad_network_yandex[] = [$block_id,$turbo_ad_id]; return $this;}

    /**
     * @param string $turbo_ad_id
     * @param string $code
     * @return $this
     */
    function addAdNetworkAdFox(string $turbo_ad_id,string $code){ $this->ad_network_adfox[] = [$turbo_ad_id,$code]; return $this;}


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


    public function addItem(Item $item){ if($item) $this->items[] = $item; }


    /**
     * @return string
     */
    private function analyticsToString():string{
        $res ='';
        foreach ($this->analytics as $v) $res .= $v;
        return $res;
    }

    /**
     * @return string
     */
    private function itemsToString():string{
        $res = '';
        foreach ($this->items as $v){ $res .= $v; }
        return $res;
    }

    /**
     * @return string
     */
    private function adNetworkToString():string{
        $res = '';
        foreach ($this->ad_network_yandex as $v){ $res .= '<turbo:adNetwork type="Yandex" id="'.$v[0].'" turbo-ad-id="'.$v[1].'"></turbo:adNetwork>'; }
        foreach ($this->ad_network_adfox as $v){ $res .= '<turbo:adNetwork type="AdFox" turbo-ad-id="'.$v[0].'"><![CDATA['.$v[1].']]></turbo:adNetwork>'; }
        return $res;
    }


    public function echoXml(){
        header("Content-Type: text/xml");
        //header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
        header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Cache-Control: post-check=0,pre-check=0");
        header("Cache-Control: max-age=0");
        header("Pragma: no-cache");
        echo $this;
    }

    public function __toString() {
        return '<?xml version="1.0" encoding="UTF-8"?>'
        .'<rss xmlns:yandex="http://news.yandex.ru"
             xmlns:media="http://search.yahoo.com/mrss/"
             xmlns:turbo="http://turbo.yandex.ru"
             version="2.0"><channel>'
            .(($c = $this->title)?'<title>'.$c.'</title>':'')
            .(($c = $this->link)?'<link>'.$c.'</link>':'')
            .(($c = $this->description)?'<description>'.$c.'</description>':'')
            .(($c = $this->language)?'<language>'.$c.'</language>':'')
            .$this->analyticsToString()
            .$this->adNetworkToString()
            .$this->itemsToString()
        .'</channel></rss>';
    }
}
