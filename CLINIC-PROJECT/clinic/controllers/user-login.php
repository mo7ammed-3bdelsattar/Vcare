<?php

$errors = [];
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $logIn->sanitizer($_POST['email']);
    $password = $logIn->sanitizer($_POST['password']);
    $emailReq = $logIn->require($email);

    if (!$emailReq) {
        $errors['email'] = "email is required";
    } elseif (!$logIn->validateEmail($email)) {
        $errors['email'] = "email is not valid";
    } elseif (!$logIn->validateEmail2($email)) {
        $errors['email'] = "email is not valid";
    }
    if (!$logIn->require($password)) {
        $errors['password'] = "password is required";
    }
    if (empty($errors)) {

        $password = sha1($password);
        $sql = "SELECT * FROM `users` WHERE  `email` = '$email' AND `password` = '$password' ";
        $result = $db->query($conn, $sql);
        if ($db->numRows($result) > 0) {
            $user = $db->fetchAssoc($result);
            if ($user['type'] == 'doctor') {
                $doctor = $db->gitRow('doctors', 'user_id', $user['id']);
                foreach ($doctor as $key => $value) {
                    $_SESSION['auth'][$key] = $value;
                }
                $_SESSION['auth']['type'] = 'doctor';
            } else {
                $_SESSION['auth'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'phone' => $user['phone'],
                    'image' => $user['image'],
                    'type' => $user['type']
                ];
            }
            // $fun->dd($_SESSION['auth'] );
        } else {
            $_SESSION['errors'] = "Invalid email or password";
            $fun->redirect('index.php?page=login');
        }


        $fun->redirect('index.php');
    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirect('index.php?page=login');
    }
}
