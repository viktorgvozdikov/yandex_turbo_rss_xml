<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class InPage {
    /** @var string $ad_id  Значение turbo-ad-id */
    protected $ad_id;
    /** @var string $inpage_ad_id Значение turbo-inpage-ad-id */
    protected $inpage_ad_id;

    /**
     * InPage constructor.
     * @param string $ad_id
     * @param string $inpage_ad_id
     */
    public function __construct(string $ad_id='', string $inpage_ad_id='') {
        $this->ad_id = $ad_id;
        $this->inpage_ad_id = $inpage_ad_id;
    }

    /**
     * Установка значения turbo-inpage-ad-id
     * @param string $ad_id
     * @return InPage
     */
    public function setAdId(string $ad_id): InPage
    {
        $this->ad_id = $ad_id;
        return $this;
    }

    /**
     * Установка значения turbo-inpage-ad-id
     * @param string $inpage_ad_id
     * @return InPage
     */
    public function setInpageAdId(string $inpage_ad_id): InPage
    {
        $this->inpage_ad_id = $inpage_ad_id;
        return $this;
    }

    public function __toString() {
        return
        '<figure inpage="true"'
            .($this->ad_id?'data-turbo-ad-id="'.$this->ad_id.'"':'')
            .($this->inpage_ad_id?'data-turbo-inpage-ad-id="'.$this->inpage_ad_id.'"':'')
        .'></figure>';
    }
}
