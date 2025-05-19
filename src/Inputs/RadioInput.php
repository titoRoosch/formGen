<?php

namespace FormGen\Inputs;

use FormGen\Inputs\Input;

class RadioInput extends Input 
{
    protected $_options;

    public function __construct(string $name, string $label, string $initVal, array $options){
        parent::__construct($name, $label, $initVal);
        $this->_options = $options;
    }

    protected function _renderSetting() {

        $html = "<div class='input'>";

     
        foreach ($this->_options as $option) {
            $checked = ($this->getValue() === $option) ? 'checked' : '';
            $html .= "<label><input type='radio' name='{$this->_name}' value='{$option}' {$checked}> {$option}</label>";
        }

        if(isset($this->_label)){
            $html .= "<label class='input-label-static' for='{$this->_name}' >{$this->_label}:</label>";
        }   
        $html .= "</div>";

        foreach($this->_errorMessages as $message){
            $html .= "<p class='input-error'> {$message}.</p>";
        }

        return $html;
    }
}
