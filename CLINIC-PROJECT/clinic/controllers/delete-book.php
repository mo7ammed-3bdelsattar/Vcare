<?php 
require_once 'classes/validation.php';
require_once 'classes/Database.php';
require_once 'classes/Functions.php';
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');
if (isset($_GET['pat_id']) && isset($_GET['doc_id'])) {
    $pat_id = $_GET['pat_id'];
    $doc_id = $_GET['doc_id'];
    $sql = "SELECT * FROM `doctors` WHERE `id` = '$doc_id'";
    $result = mysqli_query($conn, $sql);
    $doctor = $db->fetchAssoc($result);
    $sql = "UPDATE `books` SET `status`='visited' WHERE `patient_id` = '$pat_id'";
    $result = $db->query($conn, $sql);
    if ($result) {
        $visitors = $doctor['visitors'] + 1;
        $sql = "UPDATE `doctors` SET `visitors`='$visitors' WHERE `id` = '$doc_id'";
        $result = $db->query($conn, $sql);
    }
    $fun->redirect('index.php?page=profile-doc');
}else{
    echo "Sorry";
}


