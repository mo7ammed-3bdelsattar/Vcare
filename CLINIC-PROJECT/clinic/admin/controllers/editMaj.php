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
        $sql = "UPDATE `majors` SET `title`='$title',`image`='$image' WHERE `id`=$id";
        $result = mysqli_query($conn, $sql);
        if(!$result){
            $_SESSION['errors']="Major not edited";
        }else{
        $_SESSION['success'] = "Major edited succesfully";

        $fun->redirectAdmin('index.php?page=majors');}

    } else {
        $_SESSION['errors'] = $errors;
        $fun->redirectAdmin('index.php?page=edit-major&id='.$id);
    }
endif;
}
