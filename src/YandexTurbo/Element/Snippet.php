<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Snippet {

    /** @var string $title заголовок сниппета */
    protected $title;
    /** @var string $img url картинки */
    protected $img;
    /** @var string $url ссылка сниппета */
    protected $url;

    /**
     * Snippet constructor.
     * @param string $title
     * @param string $img
     * @param string $url
     */
    public function __construct(string $title,string $img,string $url) {
        $this->title = $title;
        $this->img = $img;
        $this->url = $url;
    }

    /**
     * @param string $title
     * @return Snippet
     */
    public function setTitle(string $title): Snippet
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $img
     * @return Snippet
     */
    public function setImg(string $img): Snippet
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @param string $url
     * @return Snippet
     */
    public function setUrl(string $url): Snippet
    {
        $this->url = $url;
        return $this;
    }

    public function __toString() {
        return ' <div data-block="snippet" data-title="'.$this->title.'" data-img="'.$this->img.'" data-url="'.$this->url.'"></div>';
    }


}
