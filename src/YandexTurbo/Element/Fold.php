<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Fold {
    /** @var string $text текст в блок в читать ещё */
    protected $text;

    public function __construct($text) {
        $this->text = $text;
    }

    /**
     * установка текста
     * @param string $text
     * @return Fold
     */
    public function setText(string $text): Fold
    {
        $this->text = $text;
        return $this;
    }

    public function __toString() {
        return '<div data-block="fold"><p>'.strip_tags($this->text).'</p></div>';
    }


}
