<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Carousel {

    /** @var Snippet[] массив карточек */
    protected $snippets;
    /** @var string $header заголовок карусели  */
    protected $header;

    /**
     * Установка заголовка карусели
     * @param string $header
     * @return Carousel
     */
    public function setHeader(string $header): Carousel
    {
        $this->header = $header;
        return $this;
    }

    /**
     * Добавление карточки в карусель
     * @param Snippet $snippet
     * @return $this
     */
    function addSnippet(Snippet $snippet){
        $this->snippets[] = $snippet;
        return $this;
    }


    public function __toString() {
        return '<div data-block="cards"><div data-block="carousel">'.($this->header?'<header>'.$this->header.'</header>':'').implode($this->snippets).'</div></div>';
    }

}
