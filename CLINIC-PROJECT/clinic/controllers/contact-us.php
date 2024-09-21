<?php
session_start();
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$errors=[];
$db=new Database();
$fun=new Functions();
$logIn = new Validation();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=$logIn->sanitizer($_POST['name']);
    $subject = $logIn->sanitizer($_POST['subject']);
    $email = $logIn->sanitizer($_POST['email']);
    $message = $logIn->sanitizer($_POST['message']);
    $nameReq=$logIn->require($name);
    if(!$nameReq){
        $errors['name']="name is required";
    }
    $emailReq=$logIn->require($email);
    if(!$emailReq){
        $errors['email']="email is required";
    }
    elseif(!$logIn->require($subject)){
        $errors['subject']="subject is required";
    }
    elseif(!$logIn->require($message)){
        $errors['message']="message is required";
    }

    elseif(!$logIn->validateName($name)){
        $errors['name']="name should be alphabets only";
    }
    elseif(!$logIn->alpha($name)){
        $errors['name']="name should not contain any numbers";
    }
    elseif(!$logIn->min($name,3)){
        $errors['name']="name should be at least 3 characters long";
    }
    elseif(!$logIn->validateEmail($email)){
        $errors['email']="email is not valid";
    }
    elseif(!$logIn->validateEmail2($email)){
        $errors['email']="email is not valid";
    }
    


    if(empty($errors)){
       
         $sql="INSERT INTO `contact_us` (`name`, `email`, `subject`,`message`)
          VALUES ('$name', '$email', '$subject',  '$message')";
         $result=mysqli_query($conn,$sql);
         $_SESSION['success']="we will take a look at your messages";
        $fun->redirect('index.php?page=contact_us');
    }
    else{
        $_SESSION['errors']=$errors;
        
    }
    $fun->redirect('index.php?page=contact-us');
}

