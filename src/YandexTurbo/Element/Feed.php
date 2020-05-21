<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Enum\EFeedLayout;

class Feed {

    /** @var FeedItem[] $items массив элементов  */
    protected $items = [];
    /** @var string $title заголовок  */
    protected $title;
    /** @var string $layout направление блока */
    protected $layout = EFeedLayout::VERTICAL;

    /**
     * Feed constructor.
     * @param string|null $title
     * @see EFeedLayout
     * @param string|null $layout
     */
    public function __construct(string $title = null,string $layout=null) {
        $this->title = $title;
        $this->layout = $layout;
    }

    /**
     * Установка заголовка блока "Читайте также"
     * @param string $title
     * @return Feed
     */
    public function setTitle(string $title): Feed
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Установка направление "Читайте также" - вертикальное или горизонтальное
     * @see EFeedLayout
     * @param string $layout
     * @return Feed
     */
    public function setLayout(string $layout = EFeedLayout::VERTICAL): Feed {
        $this->layout = $layout;
        return $this;
    }

    /**
     * Добавление нового пункта в "читайте также"
     * @param FeedItem $feedItem
     * @return $this
     */
    public function addItem(FeedItem $feedItem){
        $this->items[] = $feedItem;
        return $this;
    }

    public function __toString() {
        return
        '<div data-block="feed"'
            .($this->layout?' data-layout="'.$this->layout.'"':'')
            .($this->title?' data-title="'.$this->title.'"':'').'>'
            .implode($this->items)
        .'</div>';
    }


}
