<?php

namespace FormGen\Validations;

abstract class Validation {
    abstract public function validate($value): bool;

    abstract public function getErrorMessage(): string;
}
