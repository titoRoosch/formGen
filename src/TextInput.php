<?php

require_once 'Input.php';

class TextInput extends Input 
{

    protected $validate = true;

    public function validate(): bool {
        if (empty($_POST[$this->_name])) {
            $this->validate = false;
            return false;
        }
        $this->validate = true;
        return true;
    }

    protected function _renderSetting() {
        echo "<input type='text' name='{$this->_name}' value='{$this->getValue()}' />";
        if(!$this->validate){
            echo "<p style='color:red;'>The field '{$this->_label}' is required.</p>";
        }
    }
}
