<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Ad {

    /** @var string $ad_id id рекламы */
    protected $ad_id;
    /** @var bool $mobile отображать рекламу на мобильных устройствах */
    protected $mobile = true;
    /** @var bool $desktop отображать рекламу на десктопной версии */
    protected $desktop = false;

    /**
     * Ad constructor.
     * @param string $ad_id
     * @param bool $mobile
     * @param bool $desktop
     */
    public function __construct(string $ad_id = '',bool $mobile=true,bool $desktop=false) {
        $this->ad_id   = $ad_id;
        $this->mobile  = $mobile;
        $this->desktop = $desktop;
    }

    /**
     * Установка id рекламы
     * @param string $ad_id
     * @return Ad
     */
    public function setAdId(string $ad_id): Ad {
        $this->ad_id = $ad_id;
        return $this;
    }

    /**
     * Установка, показывать ли рекламу на мобильных устройствах
     * @param bool $mobile
     * @return Ad
     */
    public function setMobile(bool $mobile): Ad {
        $this->mobile = $mobile;
        return $this;
    }

    /**
     * Установка, показывать ли рекламу на десктопной версии
     * @param bool $desktop
     * @return Ad
     */
    public function setDesktop(bool $desktop): Ad {
        $this->desktop = $desktop;
        return $this;
    }

    public function __toString() {
        return
        '<figure'
            .($this->ad_id?' data-turbo-ad-id="'.$this->ad_id.'"':'')
            .' data-platform-mobile="'.($this->mobile?'true':'false').'"'
            .' data-platform-desktop="'.($this->desktop?'true':'false').'">'
        .'</figure>';
    }

}
