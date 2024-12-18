<?php
namespace FormGen;

abstract class Validation {
    abstract public function validate($value): bool;

    abstract public function getErrorMessage(): string;
}
