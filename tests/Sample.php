<?php
require_once "../src/Form.php";
require_once "../src/Input.php";
require_once "../src/TextInput.php";

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", "Bruce"));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

if ($_SERVER['REQUEST_METHOD']=="POST") {
    if ($form->validate()) {
        // display user info
        $firstName = $form->getValue("firstname");
        $lastName = $form->getValue("lastname");
        echo $firstName." ".$lastName;
    } else {
        $form->display();
    }
} else {
    $form->display();
}
