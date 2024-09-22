<?php 
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;
    $sql = "UPDATE `bookS` SET `status` ='cancelled' WHERE `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $fun->redirect('index.php?page=booked');

}