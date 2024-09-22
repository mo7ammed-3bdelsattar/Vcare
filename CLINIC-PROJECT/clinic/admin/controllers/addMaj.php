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
    $titleReq = $Add->require($title);
    if (!$titleReq) {
        $errors['title'] = "required";
    } elseif (!$Add->validateName($title)) {
        $errors['title'] = "title should be alphabets only";
    } elseif (!$Add->alpha($title)) {
        $errors['title'] = "title should not contain any numbers";
    } elseif (!$Add->min($title, 3)) {
        $errors['title'] = "title should be at least 3 characters long";
    }
    $imageReq = $Add->require($image);
    if (!$imageReq) {
        $errors['image'] = "required";
    } elseif (!$Add->min($image, 5)) {
        $errors['image'] = "Rong image";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO `majors` (`title`,`image`)
        VALUES ('$title', '$image')";
        $result = mysqli_query($conn, $sql);

        if(!$result){
            $_SESSION['errors']="Doctor not edited";
        }else{
        $_SESSION['success'] = "Major added succesfully";
        $fun->redirectAdmin('index.php?page=majors');}

    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirectAdmin('index.php?page=add-major');
    }
}
