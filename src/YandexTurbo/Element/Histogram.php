<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Histogram {

    /** @var HistogramItem[] $items массив столбцов */
    protected $items = [];

    /**
     * Добавление столбца в гистограму
     * @param HistogramItem $histogramItem
     * @return $this
     */
    function addItem(HistogramItem $histogramItem){
        $this->items[] = $histogramItem;
        return $this;
    }

    public function __toString() {
        return '<div data-block="histogram">'.implode("",$this->items).'</div>';
    }

}
