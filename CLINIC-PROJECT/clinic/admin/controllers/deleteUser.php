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
    $sql = "SELECT * FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
  
    if(!$row){
        $_SESSION['errors'] = "data not exists";
    }else{
        $sql = "DELETE FROM `users`  WHERE `id` = '$id' ";
        try {
            $result = mysqli_query($conn,$sql);
            if (!$result) {
                throw new Exception("Cannot delete this user.");
            }
            $_SESSION['success']= "User deleted succesfully";
             $fun->redirectAdmin('index.php?page=users');
        } catch (Exception $e) {
             $_SESSION['errors']= $e->getMessage();
             $fun->redirectAdmin('index.php?page=users');
        }
        }
    

    $fun->redirectAdmin('index.php?page=users');
}