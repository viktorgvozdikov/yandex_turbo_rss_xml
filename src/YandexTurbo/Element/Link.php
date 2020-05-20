<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Link {

    /** @var string $url url ссылки */
    protected $url;
    /** @var string $text текст ссылки */
    protected $text;
    /** @var bool $isButton это ссылка как кнопка */
    protected $isButton = false;

    /**
     * Установить, является ли эта ссылка кнопкой - нужно для Card
     * @param bool $isButton
     * @return Link
     */
    public function setIsButton(bool $isButton): Link
    {
        $this->isButton = $isButton;
        return $this;
    }




    /**
     * Link constructor.
     * @param string $url
     * @param string $text
     */
    public function __construct(string $url,string $text) {
        $this->url = $url;
        $this->text = $text;
    }

    /**
     * @param string $url
     * @return Link
     */
    public function setUrl(string $url): Link
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $text
     * @return Link
     */
    public function setText(string $text): Link
    {
        $this->text = $text;
        return $this;
    }

    public function __toString() {
        return '<a'.($this->isButton?' data-block="button"':'').' href="'.$this->url.'">'.$this->text.'</a>';
    }

}
