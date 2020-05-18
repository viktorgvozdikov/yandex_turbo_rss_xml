<?php

namespace ModuleBZ\YandexTurbo;

use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Image;

class Content {
    protected $content = [];

    /**
     * Функция добавление контента. Это полезно для добавления повторяющихся наборов блоков
     * @param Content $content
     * @return $this
     */
    function addContent(Content $content) { $this->content[] = $content; return $this; }
    /**
     * Добавление простого html в страницу
     * @link https://yandex.ru/dev/turbo/doc/rss/elements/typography-docpage/
     * @param string $html
     * @return $this
     */
    function addHtml(string $html = ''){ $this->content[] = $html; return $this; }

    /**
     * Добавление картинки, с заголовком или без
     * @param string $src
     * @param string|null $header
     * @param array $img_attributes
     * @param array $header_attributes
     * @return $this
     */
    function addImage(string $src,string $header=null,$img_attributes=[],$header_attributes=[]){
        $this->content[] = new Image($src,$header,$img_attributes,$header_attributes);
        return $this;
    }

    /**
     * Добавление аккордиона
     * @param Accordion $accordion
     * @return $this
     */
    function addAccordion(Accordion $accordion){
        $this->content[] = $accordion;
        return $this;
    }


    public function __toString() {
        return implode("",$this->content);
    }

}
