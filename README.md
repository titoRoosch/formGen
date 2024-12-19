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
require_once 'vendor/autoload.php'; 

use FormGen\Form;
use FormGen\TextInput;
use FormGen\RequiredValidation;

$form = new Form();

$firstName = new TextInput("firstname", "First Name", "Bruce");
$firstName->addValidation(new RequiredValidation());
$form->addInput($firstName);

$form->addInput(new TextInput("middlename", "Middle Name", "Thomas"));

$lastName = new TextInput("lastname", "Last Name", "Wayne");
$lastName->addValidation(new RequiredValidation());
$form->addInput($lastName);

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

