<?php
require_once '../vendor/autoload.php'; 

use FormGen\Form;
use FormGen\Inputs\TextInput;
use FormGen\Inputs\RadioInput;
use FormGen\Inputs\SubmitInput;
use FormGen\Inputs\ClearInput;
use FormGen\Validations\RequiredValidation;

$form = new Form();

$validation = [new RequiredValidation()];
$firstName = new TextInput("firstname", "First Name", "", $validation);
$firstName->addValidation(new RequiredValidation());
$form->addInput($firstName);

$form->addInput(new TextInput("middlename", "Middle Name", ""));

$lastName = new TextInput("lastname", "Last Name", "");
$lastName->addValidation(new RequiredValidation());
$form->addInput($lastName);

$gender = new RadioInput("gender", "Gender", "other", ["male", "female", "other"]);
$form->addInput($gender);

$form->addInput(new SubmitInput("submit", "Submit", "submit"));
$form->addInput(new ClearInput("clear", "Reset", "clear"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <h2></h2>
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
        $gender = $form->getValue("gender");
        echo $firstName." ".$middleName." ".$lastName;
        echo "<br>";
        echo $gender;
    } else {
        $form->display();
    }
} else {
    $form->display();
}
?>
</body>
</html>