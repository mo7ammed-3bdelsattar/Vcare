<?php
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$errors = [];
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'], $_GET['user_id'])) {
    $docId = $_GET['id'];
    $userId = $_GET['user_id'];
    $name = $logIn->sanitizer($_POST['name']);
    $phone = $logIn->sanitizer($_POST['phone']);
    $email = $logIn->sanitizer($_POST['email']);

    $nameReq = $logIn->require($name);
    if (!$nameReq) {
        $errors['name'] = "name is required";
    } elseif (!$logIn->validateName($name)) {
        $errors['name'] = "name should be alphabets only";
    } elseif (!$logIn->alpha($name)) {
        $errors['name'] = "name should not contain any numbers";
    } elseif (!$logIn->min($name, 3)) {
        $errors['name'] = "name should be at least 3 characters long";
    }
    $emailReq = $logIn->require($email);
    if (!$emailReq) {
        $errors['email'] = "email is required";
    } elseif (!$logIn->validateEmail($email)) {
        $errors['email'] = "email is not valid";
    } elseif (!$logIn->validateEmail2($email)) {
        $errors['email'] = "email is not valid";
    }
    if (!$logIn->require($phone)) {
        $errors['phone'] = "phone is required";
    } elseif (!$logIn->validatePhone($phone)) {
        $errors['phone'] = "invalid phone number";
    } elseif (!$logIn->numaric($phone)) {
        $errors['phone'] = "phone should be numeric";
    } elseif (!$logIn->phoneLength($phone)) {
        $errors['phone'] = "phone should be 11 characters long";
    }
    if (empty($errors)) {
        $date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `patient` (`name`, `email`,`phone`,`user_id`,`doctor_id`,`date`)
         VALUES ('$name', '$email', '$phone', '$userId', '$docId', '$date')";
        $result = mysqli_query($conn, $sql);
        $sql = "SELECT * FROM `patient` WHERE `date`='$date'";
        $result = mysqli_query($conn, $sql);
        $patient = mysqli_fetch_assoc($result);
        $fun->redirect('index.php?page=books&id=' .$patient['id']);
    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirect('index.php?page=book&id=' . $docId);
    }
}
