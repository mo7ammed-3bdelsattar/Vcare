<?php
session_start();
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$errors=[];
$db=new Database();
$fun=new Functions();
$logIn = new Validation();

// $result= $db->gitAll('users');
// $data=mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=$logIn->sanitizer($_POST['name']);
    $phone = $logIn->sanitizer($_POST['phone']);
    $email = $logIn->sanitizer($_POST['email']);
    $password = $logIn->sanitizer($_POST['password']);
    $confirm = $logIn->sanitizer($_POST['confirm']);

    $nameReq=$logIn->require($name);
    if(!$nameReq){
        $errors['name']="name is required";
    }
    $phoneReq=$logIn->require($phone);
    if(!$phoneReq){
        $errors['phone']="phone is required";
    }
    $emailReq=$logIn->require($email);
    if(!$emailReq){
        $errors['email']="email is required";
    }
    elseif(!$$logIn->require($password)){
        $errors['password']="password is required";
    }
    elseif(!$$logIn->require($confirm)){
        $errors['confirm']="confirm password is required";
    }

    elseif(!$logIn->validateName($name)){
        $errors['name']="name should be alphabets only";
    }
    elseif(!$logIn->alpha($name)){
        $errors['name']="name should not contain any numbers";
    }
    elseif(!$logIn->validatePhone($phone)){
        $errors['phone']="invalid phone number";
    }
    elseif(!$logIn->numaric($phone)){
        $errors['phone']="phone should be numeric";
    }
    elseif(!$logIn->validatePassword($password)){
        $errors['password']="password should be at least 8 characters long and contain at least one uppercase letter
        , one lowercase letter, one number, and one special character";
    }
    elseif(!$logIn->min($name,3)){
        $errors['name']="name should be at least 3 characters long";
    }
    elseif(!$logIn->phoneLength($phone)){
        $errors['phone']="phone should be 11 digits long";
    }
    elseif(!$logIn->validateEmail($email)){
        $errors['email']="email is not valid";
    }
    elseif(!$logIn->validateEmail2($email)){
        $errors['email']="email is not valid";
    }
    elseif(!$logIn->matchInput('password','confirm')){
        $errors['confirm']="password and confirm password must match";
    }
    
    if(empty($errors)){
        // $password=sha1($password);
        // $confirm=sha1($confirm);
        // $sql="INSERT INTO `users` (`name`, `email`, `password`,`phone`,`type`)
        //  VALUES ('$name', '$email', '$password',  '$phone','user')";
        // $result=mysqli_query($conn,$sql);
        // $_SESSION['auth']=[
        //     'name'=>$name,
        //     'email'=>$email,
        //     'phone'=>$phone,
        //     'type'=>'user'
        // ];
        $fun->redirect('index.php');
    }
    else{
        $_SESSION['errors']=$errors;
        
    }
    $fun->redirect('index.php?page=login');
}

