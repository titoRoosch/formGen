<?php
require_once __DIR__ . '/../vendor/autoload.php'; 

use PHPUnit\Framework\TestCase;
use FormGen\TextInput;

class InputTest extends TestCase {
    public function testValidateRequiredField() {
        $_POST['firstname'] = 'Bruce';
        $input = new TextInput('firstname', 'First Name', '');
        $this->assertTrue($input->validate());
    }

    public function testValidateEmptyField() {
        $_POST['firstname'] = '';
        $input = new TextInput('firstname', 'First Name', '');
        $this->assertFalse($input->validate());
    }
}
