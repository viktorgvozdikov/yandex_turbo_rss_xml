<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;
use ModuleBZ\YandexTurbo\Enum\EFeedbackStick;

class Feedback {
    /** @var string $title заголовок */
    protected $title;
    /** @var string позиция */
    protected $stick = EFeedbackStick::FALSE;
    /** @var array массив кнопок */
    protected $buttons = [];

    /**
     * Feedback constructor.
     * @param string $title
     * @param string $stick
     */
    public function __construct(string $title = '', string $stick = EFeedbackStick::LEFT)
    {
        $this->title = $title;
        $this->stick = $stick;
    }

    /**
     * Установка заголовка
     * @param string $title
     * @return Feedback
     */
    public function setTitle(string $title): Feedback
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Установка позиции
     * @param string $stick
     * @return Feedback
     */
    public function setStick(string $stick = EFeedbackStick::LEFT): Feedback
    {
        $this->stick = $stick;
        return $this;
    }



    /**
     * Добавление кнопки на перезвон
     * @param string $phone
     * @return Feedback
     */
    public function addCall(string $phone = ''){
        $this->buttons[] = ['type'=>'call','url'=>$phone];
        return $this;
    }

    public function addCallbackForm(string $send_to = '',string $agreement_company='',string $agreement_link = ''){
        $this->buttons[] = [
         'type'=>"callback",
         'send-to'=>$send_to,
         'agreement-company'=>$agreement_company,
         'agreement-link'=>$agreement_link,
        ];
        return $this;
    }

    /**
     * Добавление email
     * @param string $email
     * @return $this
     */
    public function addEmail(string $email) {
        $this->buttons[] = ['type'=>'mail','url'=>'mailto:'.$email];
        return $this;
    }

    /**
     * Добавление чата
     * @return $this
     */
    public function addChat(){
        $this->buttons[] = ['type'=>'chat'];
        return $this;
    }


    /**
     * Добавление ссылки на Facebook
     * @param string $url
     * @return $this
     */
    public function addFacebook($url = ''){
        $this->buttons[] = ['type'=>'facebook','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Google Plus
     * @param string $url
     * @return $this
     */
    public function addGoogle($url = ''){
        $this->buttons[] = ['type'=>'google','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Odnoklassniki
     * @param string $url
     * @return $this
     */
    public function addOdnoklassniki($url = ''){
        $this->buttons[] = ['type'=>'odnoklassniki','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Telegram
     * @param string $url
     * @return $this
     */
    public function addTelegram($url = ''){
        $this->buttons[] = ['type'=>'telegram','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Twitter
     * @param string $url
     * @return $this
     */
    public function addTwitter($url = ''){
        $this->buttons[] = ['type'=>'twitter','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Vkontakte
     * @param string $url
     * @return $this
     */
    public function addVkontakte($url = ''){
        $this->buttons[] = ['type'=>'vkontakte','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Whatsapp
     * @param string $url
     * @return $this
     */
    public function addWhatsapp($url = ''){
        $this->buttons[] = ['type'=>'whatsapp','url'=>$url];
        return $this;
    }

    /**
     * Добавление ссылки на Viber
     * @param string $url
     * @return $this
     */
    public function addViber($url = ''){
        $this->buttons[] = ['type'=>'viber','url'=>$url];
        return $this;
    }

    public function __toString() {
        return '<div data-block="widget-feedback" data-title="'.$this->title.'" data-stick="'.$this->stick.'">'
            .implode("",array_map(
                    function ($v){
                        return'<div '
                            .implode(" ",array_map(
                                    function($k,$v){
                                        return 'data-'.$k.'="'.$v.'"';
                                    }
                                ,array_keys($v),$v)
                            ).'></div>';
                    },$this->buttons))
            .'</div>';
    }


}
