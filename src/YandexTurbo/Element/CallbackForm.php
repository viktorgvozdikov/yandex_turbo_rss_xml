<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class CallbackForm {

    /** @var string $send_to email */
    protected $send_to;
    /** @var string $agreement_company название компании */
    protected $agreement_company;
    /** @var string $agreement_link ссылка на политику конфиденциальности */
    protected $agreement_link;

    public function __construct(string $send_to = '',string $agreement_company='',string $agreement_link = '') {
        $this->send_to = $send_to;
        $this->agreement_company = $agreement_company;
        $this->agreement_link = $agreement_link;
    }

    /**
     * @param string $send_to
     * @return CallbackForm
     */
    public function setSendTo(string $send_to): CallbackForm
    {
        $this->send_to = $send_to;
        return $this;
    }

    /**
     * @param string $agreement_company
     * @return CallbackForm
     */
    public function setAgreementCompany(string $agreement_company): CallbackForm
    {
        $this->agreement_company = $agreement_company;
        return $this;
    }

    /**
     * @param string $agreement_link
     * @return CallbackForm
     */
    public function setAgreementLink(string $agreement_link): CallbackForm
    {
        $this->agreement_link = $agreement_link;
        return $this;
    }



    public function __toString() {
        return
        '<form data-type="callback"'
            .($this->send_to?' data-send-to="'.$this->send_to.'"':'')
            .($this->agreement_company?' data-agreement-company="'.$this->agreement_company.'"':'')
            .($this->agreement_link?' data-agreement-link="'.$this->agreement_link.'"':'')
        .'></form>';
    }
}
