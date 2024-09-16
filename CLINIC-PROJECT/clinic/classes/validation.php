<?php

class Validation
{
    private $errors = [];

    function require($inputName, $input)
    {
        if (empty($input)) {
            $error = [$inputName => "the field is required"];
            $array_push = [$this->errors, $error];
        }
    }
    function max($inputName, $input, $max)
    {
        if (strlen($input) > $max) {
            $error = [$inputName => "the maximum length is $max"];
            $array_push = [$this->errors, $error];
        }
    }
    function min($inputName, $input, $min)
    {
        if (strlen($input) < $min) {
            $error = [$inputName => "the minimum length is $min"];
            $array_push = [$this->errors, $error];
        }
    }
    function email($inputName, $input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $error = [$inputName => "the email is not valid"];
            $array_push = [$this->errors, $error];
        }
    }
    function email2($inputName, $input)
    {
        $regex = "/^[\w\.-]+@[\w\.-]+\.[a-z]{2,4}$/";
        if (!preg_match($regex, $input)) {
            $error = [$inputName => "the email is not valid"];
            $array_push = [$this->errors, $error];
        }
    }

    function numaric($inputName, $input)
    {
        if (!is_numeric($input)) {
            $error = [$inputName => "the field must be numeric"];
            $array_push = [$this->errors, $error];
        }
    }
    function matchInput($inputName, $input, $input2){
        if($input!== $input2){
            $error = [$inputName => "the fields do not match"];
            $array_push = [$this->errors, $error];
        }
    }
    function matchPattern($inputName,$input,$regex){
        if(!preg_match($regex,$input)) {
            $error = [$inputName => "the field does not match the required pattern"];
            $array_push = [$this->errors, $error];
        }
    }
    function password($inputName, $input){
        if (strlen($input) < 8) {
            $error = [$inputName => "the password must be at least 8 characters long"];
            $array_push = [$this->errors, $error];
        }
        if (!preg_match("#[a-z]#", $input)) {
            $error = [$inputName => "the password must contain at least one lowercase letter"];
            $array_push = [$this->errors, $error];
        }
        if (!preg_match("#[A-Z]#", $input)) {
            $error = [$inputName => "the password must contain at least one uppercase letter"];
            $array_push = [$this->errors, $error];
        }
        if (!preg_match("#\d#", $input)) {
            $error = [$inputName => "the password must contain at least one number"];
            $array_push = [$this->errors, $error];
        }
    }

    function phone($inputName, $input){
        if (!preg_match("/^\d{10}$/", $input)) {
            $error = [$inputName => "the phone number must be 10 digits long"];
            $array_push = [$this->errors, $error];
        }
    }
    
    function urlCheck($inputName, $input){
        if(!filter_var($input,FILTER_VALIDATE_URL)) {
            $error = [$inputName => "the url is not valid"];
            $array_push = [$this->errors, $error];
        }
    }

    function alpha($inputName, $input){
        if(!preg_match('/^[a-zA-Z]+$/', $input)) {
            $error = [$inputName => "the field must contain only letters"];
            $array_push = [$this->errors, $error];
        }
    }

}
