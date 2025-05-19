<?php

namespace FormGen\Inputs;

class SubmitInput extends Input
{
    protected function _renderSetting()
    {
        echo "<div style='align-items: flex-start'>";
        echo "<button type='submit'>".$this->_name."</button>";
        echo "</div>";
    }
}