<?php

$errors = [];
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');
$old=$_SESSION['auth']['password'];
if ($_SERVER['REQUEST_METHOD'] == 'POST'&&isset($_GET['id'])) {
    $id=$_GET['id'];
    $oldPass = $logIn->sanitizer($_POST['old-password']);
    $newPass = $logIn->sanitizer($_POST['new-password']);
    $confirm =  $logIn->sanitizer($_POST['Confirm']);
    $oldPass=sha1($oldPass);
    if (!$logIn->require($oldPass)) {
        $errors['o-password'] = "password is required";
    }
    elseif(!$logIn->matchInput($oldPass,$old)) {
        $errors['o-password'] = "old password is incorrect";
    }
    if (!$logIn->require($newPass)) {
        $errors['password'] = "password is required";
    }elseif (!$logIn->validatePassword($newPass)) {
        $errors['password'] = "password should be at least 8 characters long and contain at least one uppercase letter
        , one lowercase letter, one number, and one special character";
    }
    if (!$logIn->require($confirm)) {
        $errors['confirm'] = "required";
    } elseif (!$logIn->matchInput($newPass, $confirm)) {
        $errors['confirm'] = "password and confirm password must match";
    }

    if (empty($errors)) {
        $newPass = sha1($newPass);
        $sql="UPDATE `users` SET `password` = '$newPass' WHERE `id` = '$id'";   
        $result = $db->query($conn, $sql);
        if ($result) {
            $_SESSION['success']='password updated successfully';
            unset($_SESSION['auth']['password']);
            $_SESSION['auth']['password']=$newPass;
            if($_SESSION['auth']['type'] =='user'){$fun->redirect('index.php?page=profile-user');}
            elseif($_SESSION['auth']['type'] =='doctor'){$fun->redirect('index.php?page=profile-doc');}
            else{$fun->redirectAdmin('index.php?page=profile#settings');}
        }else{
            $_SESSION['errors']['db']='there was a problem updating password';
            if($_SESSION['auth']['type'] =='user'){$fun->redirect('index.php?page=profile-user#settings');}
            elseif($_SESSION['auth']['type'] =='doctor'){$fun->redirect('index.php?page=profile-doc#settings');}
            else{$fun->redirectAdmin('index.php?page=profile#settings');}
        }
       
      
        
    } else {
        $_SESSION['errors'] = $errors;
        if($_SESSION['auth']['type'] =='user'){$fun->redirect('index.php?page=profile-user#settings');}
        elseif($_SESSION['auth']['type'] =='doctor'){$fun->redirect('index.php?page=profile-doc#settings');}
        else{$fun->redirectAdmin('index.php?page=profile#settings');}   
     }
}

