<?php
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$errors=[];
$db=new Database();
$fun=new Functions();
$logIn = new Validation();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=$logIn->sanitizer($_POST['name']);
    $phone = $logIn->sanitizer($_POST['phone']);
    $email = $logIn->sanitizer($_POST['email']);
    $major = $logIn->sanitizer($_POST['major']);
    $image = $logIn->sanitizer($_POST['image']);
    $nameReq=$logIn->require($name);
    if(!$nameReq){
        $errors['name']="name is required";
    }elseif(!$logIn->validateName($name)){
        $errors['name']="name should be alphabets only";
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
        $errors['phone']="subject is required";
    } elseif (!$logIn->phoneLength($phone)) {
        $errors['phone'] = "phone should be 11 digits long";
    }
    if(!$logIn->require($major)){
        $errors['major']="message is required";
    }
    if(!$logIn->require($image)){
        $errors['image']="message is required";
    }
    // elseif(!$logIn->validationImage($image)){
    //     $errors['image']="image is not valid";
    // }


    if(empty($errors)){
       
         $sql="INSERT INTO `apply` (`name`, `email`, `phone`,`image`,`major_id`)
         VALUES ('$name', '$email', '$phone',  '$image', '$major')";
         $result=mysqli_query($conn,$sql);
         $_SESSION['success']="We will keep you updated on your order status.";
        $fun->redirect('index.php?page=apply');
    }
    else{
        $_SESSION['errors']=$errors;
        
    }
    $fun->redirect('index.php?page=apply');
}

