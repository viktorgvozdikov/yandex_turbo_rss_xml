<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Enum\ESliderItemView;
use ModuleBZ\YandexTurbo\Enum\ESliderView;

class Slider {
    /** @var array $slides слайды */
    protected $slides = [];
    /** @var string $header заголовок слайдера */
    protected $header;
    /**
     * @see ESliderView;
     * @var string
     */
    protected $view = ESliderView::LANDSCAPE;
    /**
     * @see ESliderItemView;
     * @var string
     */
    protected $item_view = ESliderItemView::CONTAIN;

    /**
     * Установка значение отобржаение слайдера
     * @param string $view
     * @return Slider
     * @see ESliderView;
     */
    public function setView(string $view) { $this->view = $view; return $this; }

    /**
     * @param string $item_view
     * @return Slider
     * @see ESliderItemView;
     */
    public function setItemView(string $item_view) { $this->item_view = $item_view; return $this; }

    /**
     * Установка заголовка слайдера. Отображается, если ни у одного слайда нет figcaption
     * @param string $header
     * @return Slider
     */
    public function setHeader(string $header) { $this->header = $header; return $this; }

    /**
     * Добавление видео в слайдер
     * При добавлении видео в слайдер - превью-картинка обязательна
     * @param Video $video
     * @return $this
     */
    function addVideo(Video $video){
        $this->slides[] = $video;
        return $this;
    }

    /**
     * Добавление картинки в слайдер
     * @param Image $image
     * @return $this
     */
    function addImage(Image $image){
        $this->slides[] = $image;
        return $this;
    }


    /**
     * Добавление ссылки в слайдер
     * @param string $url
     * @param string $text
     * @return $this
     */
    function addLink(string $url,string $text){
        $this->slides[] = '<figure><a href="'.$url.'">'.$text.'</a></figure>';
        return $this;
    }

    /**
     * Добавление рекламного блока РСЯ
     * @param string $turbo_ad_id
     * @return $this
     */
    function addTurboAdID(string $turbo_ad_id = ''){
        $this->slides[] = '<figure data-turbo-ad-id="'.$turbo_ad_id.'"></figure>';
        return $this;
    }

    public function __toString() {
        return
        '<div data-block="slider"  data-view="'.$this->view.'" data-item-view="'.$this->item_view.'">'.
            ($this->header?'<header>'.$this->header.'</header>':'').
            implode("",$this->slides)
        .'</div>';
    }

}
