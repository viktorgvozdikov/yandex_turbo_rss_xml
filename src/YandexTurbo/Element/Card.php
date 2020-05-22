<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Card {

    /** @var string $header_image картинка в шапке карточки */
    protected $header_image;
    /** @var string $header_title заголовок в шапке карточки */
    protected $header_title;
    /** @var string $content контент карточки */
    protected $content;
    /** @var Link $footer подвал карточки */
    protected $footer;
    /** @var Link $more ссылка "читать ещё" под карточкой */
    protected $more;

    /**
     * Установка картинка в шапке карточки
     * @param string $header_image
     * @return Card
     */
    public function setHeaderImage(string $header_image): Card
    {
        $this->header_image = $header_image;
        return $this;
    }

    /**
     * Установка заголовка в шапке карточки
     * @param string $header_title
     * @return Card
     */
    public function setHeaderTitle(string $header_title): Card
    {
        $this->header_title = $header_title;
        return $this;
    }

    /**
     * Установка контента карточки в формате html
     * @param string $html
     * @return Card
     */
    public function setContent(string $html): Card
    {
        $this->content = $html;
        return $this;
    }

    /**
     * Указание ссылки в подвале
     * @param string $url
     * @param string $text
     * @return Card
     */
    public function setFooter(string $url,string $text): Card
    {
        $this->footer = (new Link($url,$text))->setIsButton(true);
        return $this;
    }

    /**
     * Указание ссылки "читать ещё"
     * @param string $url
     * @param string $text
     * @return Card
     */
    public function setMore(string $url,string $text): Card
    {
        $this->more = new Link($url,$text);
        return $this;
    }
    public function __toString() {
        return
        '<div data-block="card"><header>'
            .($this->header_image?'<img src="'.$this->header_image.'"/>':'')
            .($this->header_title?'<h2>'.$this->header_title.'</h2>':'')
            .'</header>'
            .$this->content
            .($this->footer?'<footer>'.$this->footer.'</footer>':'')
            .($this->more?'<div data-block="more">'.$this->more.'</div>':'')
        .'</div>';
    }


}
