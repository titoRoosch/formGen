<?php

namespace FormGen;

class Form {

    protected $_inputs;

    public function __construct() {
        $this->_inputs = [];
    }

    /**
     *  adds an input instance to the collection of inputs managed by this form object
     */
    public function addInput(Input $input) {
        $this->_inputs[$input->name()] = $input;
    }

    /**
     *  iterates over all inputs managed by this form and returns false if any of them don't validate
     */
    public function validate() {
        $isValid =  true;

        foreach ($this->_inputs as $input) {
            if (!$input->validate()) {
                $isValid = false;
            }
        }

        return $isValid;
    }

    /**
     * returns the value of the input by $name
     */
    public function getValue($name) {
        return $this->_inputs[$name]->getValue() ?? null;
    }

    /**
     *  draws the outer form element, and the markup for each input, one input per row
     */
    public function display() {
        echo "<form method='POST'>";

        foreach ($this->_inputs as $input) {
            $input->render();  
        }

        echo "<button type='submit'>Submit</button>";
        echo "</form>";
    }
}
