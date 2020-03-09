<?php

namespace ModuleBZ\YandexTurbo\Analytics;

class MediaScope {
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
        return '<turbo:analytics type="Mediascope" id="'.$this->id.'"></turbo:analytics>';
    }

}
