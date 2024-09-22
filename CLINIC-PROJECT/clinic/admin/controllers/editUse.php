<?php
$errors = [];
$db = new Database();
$fun = new Functions();
$Edit = new Validation();
$conn = $db->connection('clinc');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_GET['id'])):
        $id=$_GET['id'];
    foreach ($_POST as $key => $value) {
        $$key = $Edit->sanitizer($value);
    }

    $nameReq = $Edit->require($name);
    if (!$nameReq) {
        $errors['name'] = "required";
    } elseif (!$Edit->validateName($name)) {
        $errors['name'] = "name should be alphabets only";
    } elseif (!$Edit->alpha($name)) {
        $errors['name'] = "name should not contain any numbers";
    } elseif (!$Edit->min($name, 3)) {
        $errors['name'] = "name should be at least 3 characters long";
    }
    $emailReq = $Edit->require($email);
    if (!$emailReq) {
        $errors['email'] = "required";
    } elseif (!$Edit->validateEmail($email)) {
        $errors['email'] = "email is not valid";
    } elseif (!$Edit->validateEmail2($email)) {
        $errors['email'] = "email is not valid";
    } else {
        $result = $db->search('users', 'email', $email);
        if ($db->numRows($result) > 0) {
            $errors['email'] = "this email is already exist";
        }
    }
    $phoneReq = $Edit->require($phone);
    if (!$phoneReq) {
        $errors['phone'] = "required";
    } elseif (!$Edit->validatePhone($phone)) {
        $errors['phone'] = "invalid phone number";
    } elseif (!$Edit->numaric($phone)) {
        $errors['phone'] = "phone should be numeric";
    }elseif (!$Edit->phoneLength($phone)) {
        $errors['phone'] = "phone should be 11 digits long";
    }else {
        $result = $db->search('users', 'phone', $phone);
        if ($db->numRows($result) > 0) {
            $errors['phone'] = "this phone is already exist";
        }
    }


    if (empty($errors)) {
        $sql = "UPDATE `users` SET 
        `name`='$name', `email`='$email',`phone`='$phone',`type`='$type' WHERE `id`='$id'";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $_SESSION['errors']="User not edited";
        }else{
        $_SESSION['success'] = "User edited succesfully";
        $fun->redirectAdmin('index.php?page=users');}
    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirectAdmin('index.php?page=edit-user&id='.$id);
    }
endif;
}
