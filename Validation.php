<?php

/**
 * Stores information relating to the attempted validation of historical dates.
 */
class Validation {

    public $message;
    public $valid;

    public function setMessage(string $message) {
        $this->message = $message;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setValid(bool $isValid){
        $this->valid = $isValid;
    }

    public function isValid() {
        return $this->valid;
    }
}
