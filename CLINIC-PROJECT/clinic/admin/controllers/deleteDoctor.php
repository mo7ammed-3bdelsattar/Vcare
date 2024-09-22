<?php 
$db = new Database();
$fun = new Functions();
$Add = new Validation();
$conn = $db->connection('clinc');

if(isset($_GET['id'])){
    if(!$conn){
        $_SESSION['errors']=  "connect error " . mysqli_error($conn);
    }
    $id = $_GET['id'];
     $sql = "DELETE FROM `doctors`  WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            $_SESSION['errors'] = "cannot delete this doctor";

        }else {$_SESSION['success'] = "data deleted succesfully";}

    $fun->redirectAdmin('index.php?page=doctors');
}