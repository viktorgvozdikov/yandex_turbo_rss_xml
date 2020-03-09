<?php

namespace ModuleBZ\YandexTurbo\analytics;

class LiveInternet {
    /** @var string  */
    var $name;

    /**
     * LiveInternet constructor.
     * @param string $name
     */
    public function __construct($name=''){
        $this->name = $name;
    }
    public function __toString() {
        return '<turbo:analytics type="LiveInternet" '.(($c = $this->name)?'params="'.$c.'"':'').'></turbo:analytics>';
    }

}
