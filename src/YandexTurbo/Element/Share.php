<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Share {
    /** @var string[] $socials массив соц сетей */
    protected $socials;


    /**
     * Добавление кнопки на vkontakte
     * @return $this
     */
    function addVkontakte(){
        $this->socials[] = 'vkontakte';
        return $this;
    }

    /**
     * Добавление кнопки на facebook
     * @return $this
     */
    function addFacebook(){
        $this->socials[] = 'facebook';
        return $this;
    }

    /**
     * Добавление кнопки на odnoklassniki
     * @return $this
     */
    function addOdnoklassniki(){
        $this->socials[] = 'odnoklassniki';
        return $this;
    }

    /**
     * Добавление кнопки на telegram
     * @return $this
     */
    function addTelegram(){
        $this->socials[] = 'telegram';
        return $this;
    }

    /**
     * Добавление кнопки на twitter
     * @return $this
     */
    function addTwitter(){
        $this->socials[] = 'twitter';
        return $this;
    }


    public function __toString() {
        return '<div data-block="share" '.($this->socials?'data-network="'.implode(", ",$this->socials).'"':'').'></div>';
    }

}
