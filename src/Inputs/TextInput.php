<?php

namespace FormGen\Inputs;

use FormGen\Inputs\Input;

class TextInput extends Input 
{

    protected function _renderSetting() {
        $html = "<div class='". $this->_classes['div_class'] ."'>";
        $html .= "<input id='{$this->_name}' class='". $this->_classes['field_class'] ."' placeholder=' ' type='text' name='{$this->_name}' value='{$this->getValue()}' />";
        
        if(isset($this->_label)){
            $html .= "<label class='". $this->_classes['label_class'] ."' for='{$this->_name}' >{$this->_label}:</label>";
        }
        $html .= "</div>";

        foreach($this->_errorMessages as $message){
            $html .= "<p class='". $this->_classes['error_class'] ."'> {$message}.</p>";
        }


        return $html;
    }
}
