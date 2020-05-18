<?php

namespace ModuleBZ\YandexTurbo\Element;
use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Content;

class Accordion {
    /** @var AccordionItem[] $items */
    protected $items;

    /**
     * @param $title
     * @param string|Content $content
     * @param bool $expanded
     * @return $this
     */
    public function addItem($title,$content='',$expanded=false){
        $this->items[] = new AccordionItem($title,$content,$expanded);
        return $this;
    }

    public function __toString() {
        return '<div data-block="accordion">'.implode("",$this->items).'</div>';
    }
}
