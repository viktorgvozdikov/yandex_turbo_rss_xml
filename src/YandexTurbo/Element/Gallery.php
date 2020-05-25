<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Gallery {
    /** @var string[] $images массив картинок */
    protected $images = [];
    /** @var string $header заголовок галерии */
    protected $header;

    /**
     * Установка заголовка галереи
     * @param string $header
     * @return Gallery
     */
    public function setHeader(string $header): Gallery
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Добавление картинки в галерею
     * @param string $src
     * @return $this
     */
    public function addImage(string $src = ''){
        $this->images[] = $src;
        return $this;
    }
    public function __toString() {
        return '<div data-block="gallery">'
            .(implode("",array_map(function($v){return '<img src="'.$v.'" alt="'.$this->header.'"/>';},$this->images)))
            .($this->header?'<header>'.$this->header.'</header>':'')
            .'</div>';
    }


}
