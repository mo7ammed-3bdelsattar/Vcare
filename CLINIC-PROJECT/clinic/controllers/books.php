<?php

$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM `patient` WHERE `id` = '$id'";
  $result = mysqli_query($conn, $sql);
  $patient = mysqli_fetch_assoc($result);
  $sql2 = "INSERT INTO `books` (`name`, `email`, `phone`,`date`, `patient_id`, `doctor_id`,`user_id`) VALUES
          ('$patient[name]','$patient[email]','$patient[phone]','$patient[date]','$patient[id]','$patient[doctor_id]','$patient[user_id]')";
  $result = mysqli_query($conn, $sql2);
  if(!$result){
    $_SESSION['errors'] = "Error in books";
    $fun->redirect('index.php?page=book&id=' . $docId);
  }else{
  $_SESSION['message'] = "booked successfully";
  $fun->redirect('index.php?page=booked');
}
}
