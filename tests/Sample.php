<?php
require_once '../vendor/autoload.php'; 

use FormGen\Form;
use FormGen\Inputs\TextInput;
use FormGen\Inputs\RadioInput;
use FormGen\Inputs\SubmitInput;
use FormGen\Inputs\ClearInput;
use FormGen\Validations\RequiredValidation;

$form = new Form('#', "card-form");

$validation = [new RequiredValidation()];
$firstName = new TextInput("firstname", "First Name", "", $validation);
$firstName->setClasses('input', 'input-field', 'input-label', 'input-error');
$form->addInput($firstName);

$middleName = new TextInput("middlename", "Middle Name", ""); 
$middleName->setClasses('input', 'input-field', 'input-label', 'input-error');
$form->addInput($middleName);

$lastName = new TextInput("lastname", "Last Name", "");
$lastName->setClasses('input', 'input-field', 'input-label', 'input-error');
$lastName->addValidation(new RequiredValidation());
$form->addInput($lastName);

$gender = new RadioInput("gender", "Gender", "other", ["male", "female", "other"]);
$gender->setClasses('input', "", 'input-label-static', 'input-error');
$form->addInput($gender);

$submit = new SubmitInput("submit", null, "submit");
$submit->setClasses('input', 'action-button');
$form->addInput($submit);

$clear = new ClearInput("clear", null, "clear");
$clear->setClasses('input', 'reset-button');
$form->addInput($clear);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <h2></h2>
    <!-- Link para o arquivo CSS -->
    <link rel="stylesheet" href="/assets/template.css">
</head>
<body>

<div class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image">	
			<h2 class="card-heading">
				Get started
				<small>Let us create your account</small>
			</h2>
		</div>
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

<div class="card-info">
			<p>By signing up you are agreeing to our <a href="#">Terms and Conditions</a></p>
		</div>
	</div>
</div>
</body>
</html>