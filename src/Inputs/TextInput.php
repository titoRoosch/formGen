<?php

namespace FormGen\Inputs;

use FormGen\Inputs\Input;

class TextInput extends Input 
{

    protected function _renderSetting() {
        $html = "<div class='input'>";
        $html .= "<input id='{$this->_name}' class='input-field' placeholder=' ' type='text' name='{$this->_name}' value='{$this->getValue()}' />";
        
        if(isset($this->_label)){
            $html .= "<label class='input-label' for='{$this->_name}' >{$this->_label}:</label>";
        }
        $html .= "</div>";

        foreach($this->_errorMessages as $message){
            $html .= "<p class='input-error'> {$message}.</p>";
        }


        return $html;
    }
}
