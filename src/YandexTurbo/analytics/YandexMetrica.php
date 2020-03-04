<?php

namespace ModuleBZ\YandexTurbo\Analytics;

class YandexMetrica {
    var $id;
    var $params;
    /**
     * @param $id string | int номер счётчика
     * @param array $params array | \stdClass
     */
    public function __construct($id,$params){
        $this->id = $id;
        $this->params = $params;
    }
    public function __toString() {
        return '<turbo:analytics type="Yandex" id="'.$this->id.'" params=\''.json_encode($this->params,JSON_HEX_APOS).'\'></turbo:analytics>';
    }

}
