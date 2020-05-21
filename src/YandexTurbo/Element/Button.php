<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class Button extends CallbackForm {

    /** @var string $text текст кнопки */
    protected $text;
    /** @var string $form_action действие кнопки */
    protected $form_action;
    /** @var string фоновый цвет кнопки */
    protected $background;
    /** @var string $color цвет текста кнопки */
    protected $color;
    /** @var bool $turbo сделать кнопку "турбо" */
    protected $turbo;
    /** @var bool $primary сделать текст на кнопке жирным */
    protected $primary;
    /** @var bool $disabled сделать кнопку неактивной */
    protected $disabled;

    public function __construct(
            string $text = '',
            string $form_action = '',
            string $background = '',
            string $color = '',
            bool $turbo = true,
            bool $primary = false,
            bool $disabled = false,
            string $send_to = '',
            string $agreement_company='',
            string $agreement_link = ''
    ) {
        parent::__construct($send_to,$agreement_company,$agreement_link);
        $this->text = $text;
        $this->form_action = $form_action;
        $this->background = $background;
        $this->color = $color;
        $this->turbo = $turbo;
        $this->primary = $primary;
        $this->disabled = $disabled;
    }

    /**
     * Установка текста кнопки
     * @param string $text
     * @return Button
     */
    public function setText(string $text): Button
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Установка действия кнопки - url, звонок, или ссылка на приложение
     * @param string $form_action
     * @return Button
     */
    public function setFormAction(string $form_action): Button
    {
        $this->form_action = $form_action;
        return $this;
    }

    /**
     * Установка цвета фона кнопки
     * @param string $background
     * @return Button
     */
    public function setBackground(string $background): Button
    {
        $this->background = $background;
        return $this;
    }

    /**
     * Установка цвета текста
     * @param string $color
     * @return Button
     */
    public function setColor(string $color): Button
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Установка, является ли кнопка турбо
     * @param bool $turbo
     * @return Button
     */
    public function setTurbo(bool $turbo): Button
    {
        $this->turbo = $turbo;
        return $this;
    }

    /**
     * Установка, является ли текст на кнопке жирным
     * @param bool $primary
     * @return Button
     */
    public function setPrimary(bool $primary): Button
    {
        $this->primary = $primary;
        return $this;
    }

    /**
     * Установка значения активности кнопки
     * @param bool $disabled
     * @return Button
     */
    public function setDisabled(bool $disabled): Button
    {
        $this->disabled = $disabled;
        return $this;
    }



    public function __toString() {
        return
        '<button'
            .($this->form_action?' formaction="'.$this->form_action.'"':'')
            .($this->background?' data-background-color="'.$this->background.'"':'')
            .($this->color?' data-color="'.$this->color.'"':'')
            .($this->turbo?' data-turbo="true"':'')
            .($this->primary?' data-primary="true"':'')
            .($this->disabled?' disabled':'')
            .($this->send_to?' data-send-to="'.$this->send_to.'"':'')
            .($this->agreement_company?' data-agreement-company="'.$this->agreement_company.'"':'')
            .($this->agreement_link?' data-agreement-link="'.$this->agreement_link.'"':'')
        .'>'.$this->text.'</button>';
    }

}
