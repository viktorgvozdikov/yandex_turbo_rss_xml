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

    function addSlide(){

    }

    public function __toString() {
        return
        '<div data-block="slider"  data-view="'.$this->view.'" data-item-view="'.$this->item_view.'">'.
            ($this->header?'<header>'.$this->header.'</header>':'').
            implode("",$this->slides)
        .'</div>';
    }

}
