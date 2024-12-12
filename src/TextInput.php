<?php

namespace FormGen;

use FormGen\Input;

class TextInput extends Input 
{

    protected $_validate = true;

    public function validate(): bool {
        if (empty($_POST[$this->_name]) && $this->_required == true) {
            $this->_validate = false;
            return false;
        }
        $this->_validate = true;
        return true;
    }

    protected function _renderSetting() {
        echo "<input type='text' name='{$this->_name}' value='{$this->getValue()}' />";
        if(!$this->_validate){
            echo "<p style='color:red;'>The field '{$this->_label}' is required.</p>";
        }
    }
}
