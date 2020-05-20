<?php

namespace ModuleBZ\YandexTurbo;

use ModuleBZ\YandexTurbo\Element\Accordion;
use ModuleBZ\YandexTurbo\Element\Audio;
use ModuleBZ\YandexTurbo\Element\Gallery;
use ModuleBZ\YandexTurbo\Element\Image;
use ModuleBZ\YandexTurbo\Element\Slider;
use ModuleBZ\YandexTurbo\Element\Video;

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
     * @param Image $image
     * @return $this
     */
    function addImage(Image $image){
        $this->content[] = $image;
        return $this;
    }

    /**
     * Добавление галереи
     * @param Gallery $gallery
     * @return $this
     */
    function addGallery(Gallery $gallery){
        $this->content[] = $gallery;
        return $this;
    }

    /**
     * Добавление слайдера в галерею
     * @param Slider $slider
     * @return $this
     */
    function addSlider(Slider $slider){
        $this->content[] = $slider;
        return $this;
    }


    /**
     * Добавление видео
     * @param Video $video
     * @return $this
     */
    function addVideo(Video $video){
        $this->content[] = $video;
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

    /**
     * Добавляем аудио
     * @param Audio $audio
     * @return $this
     */
    function addAudio(Audio $audio){
        $this->content[] = $audio;
        return $this;
    }

    public function __toString() {
        return implode("",$this->content);
    }

}
