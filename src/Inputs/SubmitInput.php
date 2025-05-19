<?php

namespace FormGen\Inputs;

class SubmitInput extends Input
{
    protected function _renderSetting()
    {
        echo "<div class='input'>";
        echo "<button class='action-button' type='submit'>".$this->_name."</button>";
        echo "</div>";
    }
}