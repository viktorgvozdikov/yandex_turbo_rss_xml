<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Rating {
    /** @var float $value значение рейтинга */
    protected $value;
    /** @var float $best из скольки максимальных */
    protected $best;


    /**
     * Rating constructor.
     * @param float $value
     * @param float $best
     */
    public function __construct(float $value = 0,float $best=0) {
        $this->value = $value;
        $this->best = $best;
    }

    /**
     * Установка значения рейтинга
     * @param float $value
     * @return Rating
     */
    public function setValue(float $value): Rating
    {
        $this->value = $value;
        return $this;
    }

    /**
     * Установка максимального значения в рейтинге
     * @param float $best
     * @return Rating
     */
    public function setBest(float $best): Rating
    {
        $this->best = $best;
        return $this;
    }

    public function __toString() {
        return
        '<div itemscope itemtype="http://schema.org/Rating">'
            .'<meta itemprop="ratingValue" content="'.$this->value.'"/>'
            .'<meta itemprop="bestRating" content="'.$this->best.'"/>'
        .'</div>';
    }
}
