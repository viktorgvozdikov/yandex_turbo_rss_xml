<?php

namespace ModuleBZ\YandexTurbo\Element;
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;

class AccordionItem {
    /** @var string $title заголовок */
    protected $title;
    /** @var string|Content $content контент */
    protected $content;
    /** @var bool $expanded открыт или закрыт пункт */
    protected $expanded = false;

    /**
     * AccordionItem constructor.
     * @param $title
     * @param string $content
     * @param bool $expanded
     */
    public function __construct($title,$content='',$expanded=false) {
        $this->title = $title;
        $this->content = $content;
        $this->expanded = $expanded;
    }

    public function __toString() {
        return '<div data-block="item" data-title="'.htmlspecialchars($this->title).'"'.($this->expanded?' data-expanded="true"':'').'>'.$this->content.'</div>';
    }

}
