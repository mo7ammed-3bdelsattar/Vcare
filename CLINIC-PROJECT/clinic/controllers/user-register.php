<?php
session_start();
require_once '../classes/validation.php'; 
require_once '../classes/database.php';    

$register = new Validation();
$db = new Database(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // user data
    $name = $register->sanitizer($_POST['name']);
    $email = $register->sanitizer($_POST['email']);
    $password = $register->sanitizer($_POST['password']);
    $phone = $register->sanitizer($_POST['phone']);

    // user vaildation
    $register->require('name', $name);
    $register->require('email', $email);
    $register->require('phone', $phone);
    $register->require('password', $password);
    $register->email('email', $email);
    $register->email2('email', $email);
    $register->min('password', $password, 8);
    $register->password('password', $password,);

    // database user email check

   // $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
   // $db->query($query);
   // $db->bind(':email', $email);
   // $user = $db->single();

    if ($user) {
        $register->getErrors();
    }

    if (empty($register->errors)) {
        // validation success   
        $hashed_password = password_hash($password, PASSWORD_BCRYPT); //passwor hashing 

        // insert user data to database

       // $query = "INSERT INTO users (name, email, password, phone) VALUES (:name, :email, :password, :phone)";
        //$db->query($query);
        //$db->bind(':name', $name);
        //$db->bind(':email', $email);
        //$db->bind(':password', $hashed_password);
        //$db->bind(':phone', $phone);

        //if ($db->execute()) {
            $_SESSION['success'] = "Registration successful! You can now log in.";
            header('Location: login.php');
            exit;
        } else {
            $_SESSION['errors'] = ['Something went wrong, please try again later.'];
        }
    } else {
       //errors
        $_SESSION['errors'] = $register->getErrors();
        header('Location: register.php');
        exit;
    }
