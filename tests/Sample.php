<?php
require_once '../vendor/autoload.php'; // Ajuste o caminho conforme necessário

use FormGen\Form;
use FormGen\TextInput;

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", "Bruce"));
$form->addInput(new TextInput("middlename", "Middle Name", "Thomas", false));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
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