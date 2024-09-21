<?php

class Validation{
    public function sanitizer($str) {
        return trim(htmlspecialchars($str));
    }
    public function require($str) {
        return (!empty($str))? true : false;
    }
    public function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function validatePhone($phone) {
        return preg_match('/^(010|011|012|015)[0-9]{8}$|^(02)[0-9]{8}$|^(097)[0-9]{7}$/', $phone);
    }
    public function validatePassword($password) {
        return (strlen($password) >= 8 && preg_match('/[a-z]/', $password) && preg_match('/[A-Z]/', $password) && preg_match('/\d/', $password) && preg_match('/[^\w\s]/', $password));
    }
    public function max($input,$num){
        return (strlen($input) <= $num)? true : false;
    }

    public function min($input,$num){
        return (strlen($input) >= $num)? true : false;
    }
    public function isExist($data,$thing){
        foreach ($data as $user) {
            if($user['email']==$thing){
                return true;
            }
        }
        return false;
     }
     public function validateDate($date){
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
     public function validateUrl($url){
        return filter_var($url, FILTER_VALIDATE_URL);
    }
    public function validateName($name){
        return preg_match('/^[a-zA-Z\s]+$/', $name);
    }
    public function validateEmail2($email){
        $regex = "/^[\w\.-]+@[\w\.-]+\.[a-z]{2,4}$/";
        return preg_match($regex, $email);
    }
    public function numaric($input){
        return is_numeric($input);
    }
    public function validateNumber($input){
        return preg_match("/^\d{11}$/", $input);
    }
    public function matchInput($input1, $input2){
        return ($input1 == $input2);
    }
    public function matchPattern($input1, $regex){
        return preg_match($regex, $input1);
    }
    
    public function alpha($input){
        return preg_match('/^[a-zA-Z\s]+$/', $input);
    }
    public function phoneLength($input){
        return strlen($input) == 11;
    }
    public function validationImage($input){
        $ext = pathinfo($input, PATHINFO_EXTENSION);
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $allowedExtensions)) {
            return false;
        }
        $mimeType = mime_content_type($input);
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($mimeType, $allowedMimeTypes)) {
            return false;
        }
    
        return true;
    }
}