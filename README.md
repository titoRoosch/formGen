# Form Generator Library

## Description
FormGen is a PHP library designed to simplify the creation and rendering of HTML forms. It provides an intuitive API to dynamically generate forms with minimal effort.

---

## Installation

### Requirements
- PHP 7.0 or later
- Composer

### Steps
1. Add the github repository to your composer.json file :
   ```json
   {
       "repositories": [
           {
               "type": "vcs",
               "url": "git@github.com:titoroosch/formGen.git"
           }
       ],
       "require": {
           "titoroosch/form-generator": "dev-main"
       }
   }
   ```

2. Run
    ```bash
   composer install
   ```

3. Include the Composer autoloader in your project:
   ```php
   require_once 'vendor/autoload.php';
   ```

---

## Installation with docker

### Requirements
- Docker
- docker-compose

### Steps
1. Clone the repository

2. build the container
    ```bash
    docker-compose build
    ```
3. start the container
    ```bash
    docker-compose build
    ```
4. access the container
    ```bash
    docker-compose exec web bash
    ```
5. install the composer dependencies
    ```bash
    composer install
    ```
6. exit the container
    ```bash
    composer install
    ```
7. run the tests
    ```bash
    docker-compose exec web vendor/bin/phpunit --bootstrap vendor/autoload.php tests
    ```

## Usage

### Example
Here’s a simple example of how to use the library to generate a form:

```php
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
$gender->setClasses('input', '', 'input-label-static', 'input-error');
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
```

### Output
This will generate an HTML form that you can directly use in your project.

---


### Troubleshooting
If you encounter any issues:
- Ensure that all dependencies are properly installed by running:
  ```bash
  composer install
  ```
- Verify that the PHP version meets the requirements.

---

## License
This project is licensed under the MIT License. See the LICENSE file for more details.

