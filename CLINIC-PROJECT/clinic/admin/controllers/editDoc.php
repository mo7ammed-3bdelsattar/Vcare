<?php

$errors = [];
$db = new Database();
$fun = new Functions();
$Add = new Validation();
$conn = $db->connection('clinc');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_GET['id'])):
        $id=$_GET['id'];
    foreach ($_POST as $key => $value) {
        $$key = $Add->sanitizer($value);
    }
    $nameReq = $Add->require($name);
    if (!$nameReq) {
        $errors['name'] = "required";
    } elseif (!$Add->validateName($name)) {
        $errors['name'] = "name should be alphabets only";
    } elseif (!$Add->alpha($name)) {
        $errors['name'] = "name should not contain any numbers";
    } elseif (!$Add->min($name, 3)) {
        $errors['name'] = "name should be at least 3 characters long";
    }
    $emailReq = $Add->require($email);
    if (!$emailReq) {
        $errors['email'] = "required";
    } elseif (!$Add->validateEmail($email)) {
        $errors['email'] = "email is not valid";
    } elseif (!$Add->validateEmail2($email)) {
        $errors['email'] = "email is not valid";
    } 
    $phoneReq = $Add->require($phone);
    if (!$phoneReq) {
        $errors['phone'] = "required";
    } elseif (!$Add->validatePhone($phone)) {
        $errors['phone'] = "invalid phone number";
    } elseif (!$Add->numaric($phone)) {
        $errors['phone'] = "phone should be numeric";
    }  elseif (!$Add->phoneLength($phone)) {
        $errors['phone'] = "phone should be 11 digits long";
    }
    $daysReq = $Add->require($days);
    if (!$daysReq) {
        $errors['days'] = "required";
    } elseif (!$Add->min($name, 3)) {
        $errors['days'] = "should be at least 3 characters long";
    }
    $startReq = $Add->require($start_end);
    if (!$startReq) {
        $errors['start_end'] = "required";
    } elseif (!$Add->min($name, 3)) {
        $errors['start_end'] = "should be at least 3 characters long";
    }
    $imageReq = $Add->require($image);
    if (!$imageReq) {
        $errors['image'] = "required";
    } elseif (!$Add->min($name, 3)) {
        $errors['image'] = "should be at least 3 characters long";
    }

    if (empty($errors)) {
        $sql = "UPDATE `doctors` SET `name`='$name', `email`='$email'
        , `phone`='$phone',`image`='$image',`days`='$days',`start-end`='$start_end'
        ,`user_id`='$user',`major_id`='$major',`price`='$price' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $_SESSION['errors']="Doctor not edited";
        }else{
        $_SESSION['success'] = "Doctor edited succesfully";}
        $fun->redirectAdmin('index.php?page=edit-doctor&id='.$id);
    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirectAdmin('index.php?page=edit-doctor&id='.$id);
    }
endif;
}
