<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class FormInput {
    protected $value;
    protected $checked;
    protected $label;
    protected $meta;
    protected $type;
    protected $name;
    protected $text;
    protected $content;
    protected $required;
    protected $placeholder;
    protected $input_type;
    /** @var FormInput[] $options */
    protected $options = [];

    /**
     * @param mixed $value
     * @return FormInput
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param mixed $checked
     * @return FormInput
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;
        return $this;
    }

    /**
     * @param mixed $label
     * @return FormInput
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param mixed $meta
     * @return FormInput
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * @param mixed $type
     * @return FormInput
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param mixed $name
     * @return FormInput
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $text
     * @return FormInput
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param mixed $content
     * @return FormInput
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $required
     * @return FormInput
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * @param mixed $placeholder
     * @return FormInput
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    /**
     * @param mixed $input_type
     * @return FormInput
     */
    public function setInputType($input_type)
    {
        $this->input_type = $input_type;
        return $this;
    }

    /**
     * Добавление варианта выбора в select
     * @param $value
     * @param $text
     * @return $this
     */
    public function addSelectOption($value,$text){
        $this->options[] = (new FormInput())
            ->setType('option')
            ->setValue($value)
            ->setText($text)
        ;
        return $this;
    }

    /**
     * Установка полей выбора
     * @param FormInput[] $options
     * @return FormInput
     */
    public function setOptions(array $options): FormInput
    {
        $this->options = $options;
        return $this;
    }



    public function __toString() {
        return '<span'
            .($this->value?' value="'.$this->value.'"':'')
            .($this->checked?' checked="'.$this->checked.'"':'')
            .($this->label?' label="'.$this->label.'"':'')
            .($this->meta?' meta="'.$this->meta.'"':'')
            .($this->type?' type="'.$this->type.'"':'')
            .($this->name?' name="'.$this->name.'"':'')
            .($this->text?' text="'.$this->text.'"':'')
            .($this->content?' content="'.$this->content.'"':'')
            .(isset($this->required)?' required="'.($this->required?'true':'false').'"':'')
            .($this->placeholder?' placeholder="'.$this->placeholder.'"':'')
            .($this->input_type?' input-type="'.$this->input_type.'"':'')
        .'>'.implode("",$this->options).'</span>';
    }


}
