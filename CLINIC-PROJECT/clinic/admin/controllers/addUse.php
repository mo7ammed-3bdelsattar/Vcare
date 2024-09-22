<?php
$errors = [];
$db = new Database();
$fun = new Functions();
$Add = new Validation();
$conn = $db->connection('clinc');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
    } else {
        $result = $db->search('users', 'email', $email);
        if ($db->numRows($result) > 0) {
            $errors['email'] = "this email is already exist";
        }
    }
    $phoneReq = $Add->require($phone);
    if (!$phoneReq) {
        $errors['phone'] = "required";
    } elseif (!$Add->validatePhone($phone)) {
        $errors['phone'] = "invalid phone number";
    } elseif (!$Add->numaric($phone)) {
        $errors['phone'] = "phone should be numeric";
    }elseif (!$Add->phoneLength($phone)) {
        $errors['phone'] = "phone should be 11 digits long";
    }else {
        $result = $db->search('users', 'phone', $phone);
        if ($db->numRows($result) > 0) {
            $errors['phone'] = "this phone is already exist";
        }
    }

    if (!$Add->require($password)) {
        $errors['password'] = "password is required";
    } elseif (!$Add->validatePassword($password)) {
        $errors['password'] = "password should be at least 8 characters long and contain at least one uppercase letter
        , one lowercase letter, one number, and one special character";
    } 


    if (empty($errors)) {
        $password = sha1($password);
        $sql = "INSERT INTO `users` (`name`, `email`, `password`,`phone`,`type`)
        VALUES ('$name', '$email', '$password', '$phone','$type')";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $_SESSION['errors']="Doctor not edited";
        }else{
        $_SESSION['success'] = "User added succesfully";
        $fun->redirectAdmin('index.php?page=users');}
    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirectAdmin('index.php?page=add-user');
    }
}
