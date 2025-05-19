<?php

namespace FormGen\Inputs;

class ClearInput extends Input
{
    protected function _renderSetting()
    {
        echo "<div style='align-items: flex-start'>";
        echo "<button type='reset'>".$this->_name."</button>";
        echo "</div>";
    }
}