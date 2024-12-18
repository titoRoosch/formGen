<?php

namespace FormGen;

use FormGen\Input;

class TextInput extends Input 
{

    protected function _renderSetting() {
        $html = '<div style="display:block; width: 100%">';
        $html .= "<input id='{$this->_name}' style='display:block; margin-bottom:5px' type='text' name='{$this->_name}' value='{$this->getValue()}' />";
        foreach($this->_errorMessages as $message){
            $html .= "<p style='color:red; font-size:10px; display:block; margin-top:5px'> {$message}.</p>";
        }

        $html .= '</div>';

        return $html;
    }
}
