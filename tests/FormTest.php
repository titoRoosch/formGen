<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use FormGen\Form;
use FormGen\TextInput;

class FormTest extends TestCase {
    public function testFormValidationPasses() {
        $_POST['firstname'] = 'Bruce';
        $_POST['lastname'] = 'Wayne';

        $form = new Form();
        $form->addInput(new TextInput('firstname', 'First Name', ''));
        $form->addInput(new TextInput('lastname', 'Last Name', ''));

        $this->assertTrue($form->validate());
    }

    public function testFormValidationFails() {
        $_POST['firstname'] = '';
        $_POST['lastname'] = 'Wayne';

        $form = new Form();
        $form->addInput(new TextInput('firstname', 'First Name', ''));
        $form->addInput(new TextInput('lastname', 'Last Name', ''));

        $this->assertFalse($form->validate());
    }
}
