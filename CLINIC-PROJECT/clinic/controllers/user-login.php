<?php
session_start();
require_once 'classes/validation.php';

$logIn = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $logIn->sanitizer($_POST['email']);
    $password = $logIn->sanitizer($_POST['password']);

    $logIn->require('email', $email);
    $logIn->require('password', $password);
    $logIn->email('email', $email);
    $logIn->email2('email', $email);
    $logIn->min('password', $password, 8);
    $logIn->password('password', $password);
    if (empty($logIn->errors)) {
    }
    else{
        $_SESSION['errors'] = $logIn->getErrors();
    }
}
