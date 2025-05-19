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
        $html = '<div style="display:block; width: 100%">';
        foreach ($this->_options as $option) {
            $checked = ($this->getValue() === $option) ? 'checked' : '';
            $html .= "<label><input type='radio' name='{$this->_name}' value='{$option}' {$checked}> {$option}</label><br>";
        }
        foreach($this->_errorMessages as $message){
            $html .= "<p style='color:red; font-size:10px; display:block; margin-top:5px'> {$message}.</p>";
        }

        $html .= '</div>';

        return $html;
    }
}
