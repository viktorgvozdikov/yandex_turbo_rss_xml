<?php

namespace ModuleBZ\YandexTurbo\Element;
use ModuleBZ\YandexTurbo;

class Accordion {
    /** @var AccordionItem[] $items */
    protected $items;


    public function __toString() {
        return '<div data-block="accordion">'.implode("",$this->items).'</div>';
    }
}
