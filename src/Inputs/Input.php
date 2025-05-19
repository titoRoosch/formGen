<?php

namespace FormGen\Inputs;

use FormGen\Validations\Validation;
use FormGen\Validations\RequiredValidation;

abstract class Input {
    protected $_name;
    protected $_label;
    protected $_initVal;
    protected $_validations = [];
    protected $_errorMessages = [];
    protected $_classes = [
            'div_class' => '',
            'field_class' => '',
            'label_class' => '',
            'error_class' => '',
    ];

   // abstract public function validate();
    abstract protected function _renderSetting();

    public function __construct($name, $label = null, $initVal = '', array $validation = []) {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
        $this->_validations = $validation;
    }

    public function addValidation(Validation $validation) {
        $this->_validations[] = $validation;
    }

    public function setClasses($div = '', $field = '', $label = '', $error = ''){
        $this->_classes = [
            'div_class' => $div,
            'field_class' => $field,
            'label_class' => $label,
            'error_class' => $error
        ];
    }

    public function validate(): bool {
        $isValid = true;
        foreach ($this->_validations as $validation) {
            if (!$validation->validate($this->getValue())) {
                $this->_errorMessages[] = $validation->getErrorMessage();
                $isValid = false;
            }
        }
        return $isValid;
    }

    /**
     * returns the name of this input
     */
    public function name() {
        return $this->_name;
    }


    /**
     *  renders a row in the form for this input. All inputs have a label on the left, and an area on the right where the actual
     *  html form element is displayed (such as a text box, radio button, select, etc)
     */
    public function render() {
        $html = $this->_renderSetting();

        return $html;
    }

    /**
     * returns the current value managed by this input
     */
    public function getValue() {
        return $_POST[$this->_name] ?? $this->_initVal;
    }
}
