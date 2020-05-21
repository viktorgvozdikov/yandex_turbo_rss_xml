<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Enum\EFeedItemThumbRatio;
use ModuleBZ\YandexTurbo\Enum\EFeedItemThumbPosition;

class FeedItem {

    /** @var string $title заголовок */
    protected $title;
    /** @var string $description описание */
    protected $description;
    /** @var string $href ссылка */
    protected $href;
    /** @var string $thumb картинка иконка */
    protected $thumb;
    /** @var string $thumb_position позиция иконки */
    protected $thumb_position;
    /** @var string $thumb_ratio пропорции иконки */
    protected $thumb_ratio;

    /**
     * FeedItem constructor.
     * @param string|null $title
     * @param string|null $description
     * @param string|null $href
     * @param string|null $thumb
     * @see EFeedItemThumbPosition
     * @param string|null $thumb_position
     * @see EFeedItemThumbRatio
     * @param string|null $thumb_ratio
     */
    public function __construct(  string $title = null, string $description = null, string $href = null, string $thumb = null, string $thumb_position = null, string $thumb_ratio = null ) {
        $this->title = $title;
        $this->description = $description;
        $this->href = $href;
        $this->thumb = $thumb;
        $this->thumb_position = $thumb_position;
        $this->thumb_ratio = $thumb_ratio;
    }

    /**
     * Установка заголовка элемента
     * @param string $title
     * @return FeedItem
     */
    public function setTitle(string $title): FeedItem
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Установка описание элемента
     * @param string $description
     * @return FeedItem
     */
    public function setDescription(string $description): FeedItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Установка ссылки элемента
     * @param string $href
     * @return FeedItem
     */
    public function setHref(string $href): FeedItem
    {
        $this->href = $href;
        return $this;
    }

    /**
     * Установка картинки элемента
     * @param string $thumb
     * @return FeedItem
     */
    public function setThumb(string $thumb): FeedItem
    {
        $this->thumb = $thumb;
        return $this;
    }

    /**
     * Установка позиции картинки элемента
     * @see EFeedItemThumbPosition
     * @param string $thumb_position
     * @return FeedItem
     */
    public function setThumbPosition(string $thumb_position): FeedItem
    {
        $this->thumb_position = $thumb_position;
        return $this;
    }

    /**
     * Установка пропорций картинки
     * @see EFeedItemThumbRatio
     * @param string $thumb_ratio
     * @return FeedItem
     */
    public function setThumbRatio(string $thumb_ratio): FeedItem
    {
        $this->thumb_ratio = $thumb_ratio;
        return $this;
    }


    public function __toString() {
        return '<div data-block="feed-item"'
        .($this->title?           ' data-title="'.$this->title.'"':'')
        .($this->description?     ' data-description="'.$this->description.'"':'')
        .($this->href?            ' data-href="'.$this->href.'"':'')
        .($this->thumb?           ' data-thumb="'.$this->thumb.'"':'')
        .($this->thumb_position?  ' data-thumb-position="'.$this->thumb_position.'"':'')
        .($this->thumb_ratio?     ' data-thumb-ratio="'.$this->thumb_ratio.'"':'')
    .'></div>';
    }
}
