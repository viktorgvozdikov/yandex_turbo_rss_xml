<?php

namespace ModuleBZ\YandexTurbo\Element;

use ModuleBZ\YandexTurbo;

class FormRadioOption extends FormInput {
    /**
     * FormRadioOption constructor.
     * @param string $value
     * @param string $label
     * @param string $meta
     * @param bool $checked
     */
    public function __construct(string $value,string $label,string $meta,bool $checked = false) {
        $this->setType('option')
            ->setValue($value)
            ->setLabel($label)
            ->setMeta($meta)
            ->setChecked($checked);
    }
}
