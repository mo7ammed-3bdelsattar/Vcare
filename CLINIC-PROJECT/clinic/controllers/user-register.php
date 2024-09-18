<?php

require_once 'classes/Database.php';
require_once 'classes/Functions.php';
require_once 'classes/Validation.php';

class UserRegisterController {

    private $db;
    private $validation;
    private $functions;

    public function __construct() {
        $this->db = new Database();
        $this->validation = new Validation();
        $this->functions = new Functions();
    }

    public function register($userData) {
    
        $conn = $this->db->connection('clinic');

   
        $this->validation->require('Name', $userData['Name']);
        $this->validation->email('Email', $userData['Email']);
        $this->validation->phone('Phone', $userData['Phone']);
        $this->validation->password('Password', $userData['Password']);
        $this->validation->matchInput('Retype_password', $userData['Retype_password'], $userData['Retype_password']);

   
        

        $errors = $this->validation->getErrors();

        if (!empty($errors)) {
            $_SESSION['register_errors'] = $errors;
            $this->functions->redirect('index.php?page=register');
            return; 
    }
      
        $name = $this->db->escape($conn, $userData['Name']);
        $email = $this->db->escape($conn, $userData['Email']);
        $phone = $this->db->escape($conn, $userData['Phone']);
        $password = password_hash($userData['Password'], PASSWORD_BCRYPT); // تشفير كلمة المرور

        $checkUser = $this->db->query($conn, "SELECT * FROM `users` WHERE `email` = '$email'");

        if ($this->db->numRows($checkUser) > 0) {
            $_SESSION['register_errors'] = [['email' => 'User already exists with this email address.']];
            $this->functions->redirect('index.php?page=register');
        }
       
        $user = [
            'Name' => $name,
            'Email' => $email,
            'Phone' => $phone,
            'Password' => $password,
        ];

       

        if ($this->db->insert('users', $user)) {
          
            $this->functions->redirectAfter($this->functions->url('index.php?page=home'), 3);
        } else {
            $_SESSION['register_errors'] = [['general' => 'Error: Could not register the user.']];
            $this->functions->redirect('index.php?page=register');
        }

    
        $this->db->closeConnection($conn);
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller = new UserRegisterController();
    $controller->register($_POST);
}

?>
