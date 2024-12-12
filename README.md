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
           "titoroosch/formGen": "dev-main"
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

## Usage

### Example
Here’s a simple example of how to use the library to generate a form:

```php
<?php
require_once 'vendor/autoload.php'; // Ajuste o caminho conforme necessário

use FormGen\Form;
use FormGen\TextInput;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <!-- Link for the CSS file -->
    <link rel="stylesheet" href="vendor/titoroosch/form-generator/assets/styles.css">
</head>
<body>
    <h1>test lib</h1>
<?php

$form = new Form();

$form->addInput(new TextInput("firstname", "First Name", "Bruce"));
// the fourth parameter indicates if a input is required or not, defaut true
$form->addInput(new TextInput("middlename", "Middle Name", "Thomas", false));
$form->addInput(new TextInput("lastname", "Last Name", "Wayne"));

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

