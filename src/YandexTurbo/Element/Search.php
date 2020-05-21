<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Search {

    /** @var string $action url для выполнения запроса */
    protected $action;
    /** @var string $name имя поля ввода */
    protected $name;
    /** @var string $placeholder текст в поисковой строке по умолчанию */
    protected $placeholder;

    /**
     * Search constructor.
     * @param string $action
     * @param string $name
     * @param string $placeholder
     */
    public function __construct(string $action='',string $name='',string $placeholder='') {
        $this->action = $action;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    /**
     * Установка url для выполнения запроса
     * @param string $action
     * @return Search
     */
    public function setAction(string $action): Search
    {
        $this->action = $action;
        return $this;
    }

    /**
     * Установка имени поля ввода
     * @param string $name
     * @return Search
     */
    public function setName(string $name): Search
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Установка значения в строке по умолчанию
     * @param string $placeholder
     * @return Search
     */
    public function setPlaceholder(string $placeholder): Search
    {
        $this->placeholder = $placeholder;
        return $this;
    }



    public function __toString() {
        return '<form action="'.$this->action.'" method="GET"><input type="search" name="'.$this->name.'" placeholder="'.$this->placeholder.'" /></form>';
    }
}
