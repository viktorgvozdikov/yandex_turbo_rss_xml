<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class HistogramItem {

    /** @var string $title заголовок  */
    protected $title;
    /** @var string $value значение */
    protected $value;
    /** @var float $height высота столбца */
    protected $height;
    /** @var string $color цвет */
    protected $color;
    /** @var string $icon иконка */
    protected $icon;

    /**
     * HistogramItem constructor.
     * @param string $title
     * @param string $value
     * @param float $height
     * @param string $color
     * @param string $icon
     */
    public function __construct(string $title = '', string $value = '', float $height = 0, string $color = '', string $icon = '')
    {
        $this->title = $title;
        $this->value = $value;
        $this->height = $height;
        $this->color = $color;
        $this->icon = $icon;
    }

    /**
     * Установка заголовка столбца
     * @param string $title
     * @return HistogramItem
     */
    public function setTitle(string $title): HistogramItem
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Установка значения столбца
     * @param string $value
     * @return HistogramItem
     */
    public function setValue(string $value): HistogramItem
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Установка высоты столбца
     * @param float $height
     * @return HistogramItem
     */
    public function setHeight(float $height): HistogramItem
    {
        $this->height = $height;
        return $this;
    }

    /**
     * Установка цвета столбца
     * @param string $color
     * @return HistogramItem
     */
    public function setColor(string $color): HistogramItem
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Установка url иконки
     * @param string $icon
     * @return HistogramItem
     */
    public function setIcon(string $icon): HistogramItem
    {
        $this->icon = $icon;
        return $this;
    }



    public function __toString() {
        return
        '<div data-block="histogram-item"'
            .($this->title?' data-title="'.$this->title.'"':'')
            .($this->value?' data-value="'.$this->value.'"':'')
            .($this->height?' data-height="'.$this->height.'"':'')
            .($this->color?' data-color="'.$this->color.'"':'')
            .($this->icon?' data-icon="'.$this->icon.'"':'')
        .'></div>';
    }

}
