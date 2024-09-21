<?php 
$db = new Database();
$fun = new Functions();
$Add = new Validation();
$conn = $db->connection('clinc');

if(isset($_GET['id'])){
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_connect_error($conn);
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `doctors`  WHERE `id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
  
    if(!$row){
        $_SESSION['errors'] = "data not exists";
    }else{
        $sql = "DELETE FROM `doctors`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        $_SESSION['success'] = "data deleted succesfully";

    }

    $fun->redirectAdmin('index.php?page=doctors');
}