<?php

namespace FormGen\Inputs;

class SubmitInput extends Input
{
    protected function _renderSetting()
    {
        $html = "<div class='". $this->_classes['div_class'] ."'>";
        $html .= "<button  class='". $this->_classes['field_class'] ."' type='submit'>".$this->_name."</button>";
        $html .= "</div>";
        return $html;
    }
}