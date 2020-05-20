<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Cards {

    /** @var Card[] $cards массив карточек  */
    protected $cards = [];

    /**
     * Добавление новой карточки
     * @param Card $card
     * @return $this
     */
    function addCard(Card $card){
        $this->cards[] = $card;
        return $this;
    }

    public function __toString() {
        return '<div data-block="cards">'.implode("",$this->cards).'</div>';
    }

}
