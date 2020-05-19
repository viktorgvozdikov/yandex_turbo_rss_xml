<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Audio {
    /** @var string $src url к файлу mp3 */
    protected $src;

    /**
     * Audio constructor.
     * @param $src
     */
    public function __construct($src=null) {
        $this->src = $src;
    }

    /**
     * Указание пути к файлу mp3
     * @param string $src
     * @return Audio
     */
    public function setSrc(string $src) { $this->src = $src; return $this; }

    public function __toString() {
        return '<div data-block="audio" src="'.$this->src.'"></div>';
    }
}
