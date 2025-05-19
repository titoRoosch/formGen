<?php

namespace FormGen\Inputs;

class ClearInput extends Input
{
    protected function _renderSetting()
    {
        echo "<div class='input'>";
        echo "<button class='reset-button' type='reset'>".$this->_name."</button>";
        echo "</div>";
    }
}