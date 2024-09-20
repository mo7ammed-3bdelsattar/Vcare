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
    $email = $logIn->sanitizer($_POST['email']);
    $password = $logIn->sanitizer($_POST['password']);
    $emailReq=$logIn->require($email);
    if(!$emailReq){
        $errors['email']="email is required";
    }
    elseif(!$logIn->require($password)){
        $errors['password']="password is required";
    }
    elseif(!$logIn->validateEmail($email)){
        $errors['email']="email is not valid";
    }
    elseif(!$logIn->validateEmail2($email)){
        $errors['email']="email is not valid";
    }
     if(empty($errors)){

        // $password=sha1($password);
        // $sql="SELECT * FROM `users` WHERE  `email` = '$email' AND `password` = '$password' ";
        // $result=mysqli_query($conn,$sql);
        // $user=mysqli_fetch_assoc($result);

        // if($user){
        //     $_SESSION['auth']=[
        //         'name'=>$user['name'],
        //         'email'=>$user['email'],
        //         'phone'=>$user['phone'],
        //         'type'=>$user['type'],
        //         'id'=>$user['id']
        // ];

        $fun->redirect('index.php');   
    }
    else{
        $_SESSION['errors']=$errors;
    }

    $fun->redirect('index.php?page=login');

}

