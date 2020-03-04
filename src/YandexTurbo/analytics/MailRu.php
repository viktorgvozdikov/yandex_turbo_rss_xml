<?php

namespace ModuleBZ\YandexTurbo\Analytics;

class MailRu {
    /** @var int | string */
    var $id;

    /**
     * LiveInternet constructor.
     * @param int | string $id
     */
    public function __construct($id=0){
        $this->id = $id;
    }
    public function __toString() {
        return '<turbo:analytics type="MailRu" id="'.$this->id.'"></turbo:analytics>';
    }

}
