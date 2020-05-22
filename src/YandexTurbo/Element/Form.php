<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Form {

    /** @var string $end_point ссылка на которую отправляются данные */
    protected $end_point;
    /** @var string $submit_text текст на кнопке отправки */
    protected $submit_text;
    /** @var FormInput[] $inputs поля ввода */
    protected $inputs;
    /** @var FormResult[] $results результирующие строки */
    protected $results = [];

    /**
     * Установка ссылки на которую будут отправляться данные
     * @param mixed $end_point
     * @return Form
     */
    public function setEndPoint($end_point)
    {
        $this->end_point = $end_point;
        return $this;
    }


    /**
     * Добавление текстового поля ввода
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param bool $required
     * @return $this
     */
    public function addInputText($name='',$label='',$placeholder='',bool $required = false){
        $this->inputs[] = (new FormInput())
            ->setType('input')
            ->setName($name)
            ->setLabel($label)
            ->setInputType('text')
            ->setPlaceholder($placeholder)
            ->setRequired($required)
        ;
        return $this;
    }

    /**
     * Добавление поля ввода числа
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param bool $required
     * @return $this
     */
    public function addInputNumber($name='',$label='',$placeholder='',bool $required = false){
        $this->inputs[] = (new FormInput())
            ->setType('input')
            ->setName($name)
            ->setLabel($label)
            ->setInputType('number')
            ->setPlaceholder($placeholder)
            ->setRequired($required)
        ;
        return $this;
    }

    /**
     * Добавление поля ввода даты
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param bool $required
     * @return $this
     */
    public function addInputDate($name='',$label='',$placeholder='',bool $required = false){
        $this->inputs[] = (new FormInput())
            ->setType('input')
            ->setName($name)
            ->setLabel($label)
            ->setInputType('date')
            ->setPlaceholder($placeholder)
            ->setRequired($required)
        ;
        return $this;
    }

    /**
     * Добавление многстрочного поля ввода текста
     * @param string $name
     * @param string $label
     * @param string $placeholder
     * @param string $value
     * @param bool $required
     * @return $this
     */
    public function addTextarea($name='',$label='',$placeholder='',string $value='',bool $required = false){
        $this->inputs[] = (new FormInput())
            ->setType('textarea')
            ->setName($name)
            ->setLabel($label)
            ->setValue($value)
            ->setPlaceholder($placeholder)
            ->setRequired($required)
        ;
        return $this;
    }

    /**
     * Добавление поля ввода checkbox
     * @param string $name
     * @param string $value
     * @param string $content
     * @return $this
     */
    public function addCheckbox(string $name='',string $value='',string $content = ''){
        $this->inputs[] = (new FormInput())
            ->setType('checkbox')
            ->setName($name)
            ->setValue($value)
            ->setContent($content)
        ;
        return $this;
    }

    public function addSelect(string $name='',string $label ='' ,string $value='',$options=[]){
        $select = (new FormInput())
            ->setType('select')
            ->setName($name)
            ->setValue($value)
            ->setLabel($label)
        ;
        foreach ($options as $k=>$v){
            $select->addSelectOption($k,$v);
        }
        $this->inputs[] = $select;
        return $this;
    }


    /**
     * @param string $name
     * @param string $label
     * @param FormRadioOption[] $options
     * @return $this
     */
    public function addRadio(string $name='',string $label='', $options = []){
        $radio = (new FormInput())
            ->setType('radio')
            ->setName($name)
            ->setLabel($label)
            ->setOptions($options)
        ;
        $this->inputs[] = $radio;
        return $this;
    }





    /**
     * Установка текста на кнопке отправки
     * @param mixed $submit_text
     * @return Form
     */
    public function setSubmitText($submit_text)
    {
        $this->submit_text = $submit_text;
        return $this;
    }


    /**
     * Добавление в результаты строки типа text
     * @param $field
     * @return $this
     */
    function addResultText($field){
        $this->results[] = new FormResult('text',$field);
        return $this;
    }
    /**
     * Добавление в результаты строки типа link
     * @param $field
     * @return $this
     */
    function addResultLink($field){
        $this->results[] = new FormResult('text',$field);
        return $this;
    }

    public function __toString() {
        return '<form data-type="dynamic-form" end_point="'.$this->end_point.'">'
            .'<div type="input-block">'.implode($this->inputs).'<button type="submit" text="'.$this->submit_text.'"></button></div>'
            .'<div type="result-block">'.implode("",$this->results).'</div>'
            .'</form>';
    }

}
