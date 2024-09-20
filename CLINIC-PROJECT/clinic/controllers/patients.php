<?php
session_start();
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$errors=[];
$db=new Database();
$fun=new Functions();
$logIn = new Validation();

// $result= $db->gitAll('contact_us');
// $data=mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=$logIn->sanitizer($_POST['name']);
    $phone = $logIn->sanitizer($_POST['subject']);
    $email = $logIn->sanitizer($_POST['email']);
    $date = $logIn->sanitizer($_POST['message']);

    $nameReq=$logIn->require($name);
    if(!$nameReq){
        $errors['name']="name is required";
    }elseif(!$logIn->validateName($name)){
        $errors['name']="name should be alphabets only";
    }
    elseif(!$logIn->alpha($name)){
        $errors['name']="name should not contain any numbers";
    }
    elseif(!$logIn->min($name,3)){
        $errors['name']="name should be at least 3 characters long";
    }
    $emailReq=$logIn->require($email);
    if(!$emailReq){
        $errors['email']="email is required";
    }elseif(!$logIn->validateEmail($email)){
        $errors['email']="email is not valid";
    }
    elseif(!$logIn->validateEmail2($email)){
        $errors['email']="email is not valid";
    }
    if(!$logIn->require($phone)){
        $errors['phone']="phone is required";
    } elseif(!$logIn->validatePhone($phone)){
        $errors['phone']="invalid phone number";
    }
    elseif(!$logIn->numaric($phone)){
        $errors['phone']="phone should be numeric";
    }
    elseif(!$logIn->phoneLength($phone)){
        $errors['phone']="phone should be 11 characters long";
    }
    if(!$logIn->require($date)){
        $errors['date']="date is required";
    }
    if(empty($errors)){
        // $password=sha1($password);
        // $confirm=sha1($confirm);
        // $sql="INSERT INTO `pationt` (`name`, `email`, `subject`,`message`)
        //  VALUES ('$name', '$email', '$subject',  '$message')";
        // $result=mysqli_query($conn,$sql);
        $fun->redirect('index.php');
    }
    else{
        $_SESSION['errors']=$errors;
        $fun->redirect('index.php?page=book');
    }
    
}


