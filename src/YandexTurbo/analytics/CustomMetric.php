<?php

namespace ModuleBZ\YandexTurbo\analytics;

class CustomMetric {
    /** @var  string */
    var $url;

    /**
     * LiveInternet constructor.
     * @param string $url
     */
    public function __construct($url =''){
        $this->url = $url;
    }
    public function __toString() {
        return '<turbo:analytics type="custom" url="'.$this->url.'"></turbo:analytics>';
    }

}
