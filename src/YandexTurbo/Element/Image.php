<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Image {
    /** @var string $src путь к картинке */
    protected $src;
    /** @var string|null текст заголовка */
    protected $header;
    /** @var array аттрибуты картинки */
    protected $img_attributes;
    /** @var array аттрибуеты заголовка */
    protected $header_attributes;

    /**
     * Image constructor.
     * @param string $src
     * @param string|null $header
     * @param array $img_attributes
     * @param array $header_attributes
     */
    public function __construct(string $src=null,string $header=null,$img_attributes=[],$header_attributes=[]) {
        $this->src = $src;
        $this->header = $header;
        $this->img_attributes = $img_attributes;
        $this->header_attributes = $header_attributes;
    }

    /**
     * Указание URL к картинке
     * @param string $src
     * @return Image
     */
    public function setSrc(string $src) {
        $this->src = $src;
        return $this;
    }

    public function __toString() {
        $img = '<img src="'.$this->src.'" '.YandexTurbo::renderAttribute($this->img_attributes).' alt="'.$this->header.'"/>';
        return '<figure>'.$img.($this->header?'<figcaption '.YandexTurbo::renderAttribute($this->header_attributes).'>'.$this->header.'</figcaption>':'').'</figure>';
    }
}
