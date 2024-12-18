<?php
namespace FormGen;

class RequiredValidation extends Validation {
    private $errorMessage;

    public function __construct($errorMessage = 'This field is required.') {
        $this->errorMessage = $errorMessage;
    }

    public function validate($value): bool {
        return !empty($value);
    }

    public function getErrorMessage(): string {
        return $this->errorMessage;
    }
}