<?php
require_once '../vendor/autoload.php'; 

use FormGen\Form;
use FormGen\TextInput;
use FormGen\RequiredValidation;

$form = new Form();

$firstName = new TextInput("firstname", "First Name", "Bruce");
$firstName->addValidation(new RequiredValidation());
$form->addInput($firstName);
$form->addInput(new TextInput("middlename", "Middle Name", "Thomas", false));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <h2>teste</h2>
    <!-- Link para o arquivo CSS -->
    <link rel="stylesheet" href="/assets/styles.css">
</head>
<body>
<?php
if ($_SERVER['REQUEST_METHOD']=="POST") {
    if ($form->validate()) {
        // display user info
        $firstName = $form->getValue("firstname");
        $middleName = $form->getValue("middlename")." ";
        $lastName = $form->getValue("lastname");
        echo $firstName." ".$middleName.$lastName;
    } else {
        $form->display();
    }
} else {
    $form->display();
}
?>
</body>
</html>