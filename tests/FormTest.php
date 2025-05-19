<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use FormGen\Form;
use FormGen\Inputs\TextInput;
use FormGen\RequiredValidation;

class FormTest extends TestCase {

    public function testEmptyFormRendering() {
        $form = new Form();
    
        ob_start();
        $form->display();
        $output = ob_get_clean();
    
        $this->assertStringContainsString('<p>No inputs available.</p>', $output);
    }

    public function testNoInputs() {
        $form = new Form();
        $this->assertTrue($form->validate());
    }

    public function testFormValidationPasses() {
        $_POST['firstname'] = 'Bruce';
        $_POST['lastname'] = 'Wayne';

        $form = new Form();
        $name = new TextInput('firstname', 'First Name', '');
        $name->addValidation(new RequiredValidation());
        $lastName = new TextInput('lastname', 'Last Name', '');
        $lastName->addValidation(new RequiredValidation());

        $form->addInput($name);
        $form->addInput($lastName);

        $this->assertTrue($form->validate());
    }

    public function testFormValidationFails() {
        $_POST['firstname'] = '';
        $_POST['lastname'] = 'Wayne';

        $form = new Form();
        $name = new TextInput('firstname', 'First Name', '');
        $name->addValidation(new RequiredValidation());
        $lastName = new TextInput('lastname', 'Last Name', '');
        $lastName->addValidation(new RequiredValidation());

        $form->addInput($name);
        $form->addInput($lastName);

        $this->assertFalse($form->validate());
    }
}
