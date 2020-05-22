<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class FormResult {

    /** @var string $type тип результат */
    protected $type;
    /** @var string $field имя результат */
    protected $field;

    /**
     * FormResult constructor.
     * @param string $type
     * @param string $field
     */
    public function __construct(string $type = '', string $field='')
    {
        $this->type = $type;
        $this->field = $field;
    }

    /**
     * Установка типа результата
     * @param string $type
     * @return FormResult
     */
    public function setType(string $type): FormResult
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Установка названия типа
     * @param string $field
     * @return FormResult
     */
    public function setField(string $field): FormResult
    {
        $this->field = $field;
        return $this;
    }


    public function __toString() {
        return '<span type="'.$this->type.'" field="'.$this->field.'"></span>';
    }

}
