<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

use PHPUnit\Framework\TestCase;
use FormGen\Inputs\TextInput;
use FormGen\Validations\RequiredValidation;

class InputTest extends TestCase {

    public function testValidateRequiredField() {
        $_POST['firstname'] = 'Bruce';
        $input = new TextInput('firstname', 'First Name', '');
        $input->addValidation(new RequiredValidation());
        $this->assertTrue($input->validate());
    }

    public function testValidateNotRequiredField() {
        $_POST['lastname'] = '';
        $input = new TextInput('lastname', 'First Name', '');
        $this->assertTrue($input->validate());
    }

    public function testValidateNotRequiredEmptyField() {
        $_POST['lastname'] = '';
        $input = new TextInput('lastname', 'First Name', '');
        $this->assertTrue($input->validate());
    }

    public function testValidateEmptyField() {
        $_POST['firstname'] = '';
        $input = new TextInput('firstname', 'First Name', '');
        $input->addValidation(new RequiredValidation());
        $this->assertFalse($input->validate());
    }
}
