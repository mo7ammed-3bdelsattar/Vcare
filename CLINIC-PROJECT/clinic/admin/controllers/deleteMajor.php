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
    $sql = "SELECT `doctors`.*,`majors`.`title` AS maj_title FROM `doctors` 
    INNER JOIN `majors` on `majors`.`id`=`doctors`.`major_id`  WHERE `doctors`.`major_id` = '$id' ";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_row($result);
    if($row){
        $_SESSION['errors'] = "data cannot deleted";

    }else{
     $sql = "DELETE FROM `majors`  WHERE `id` = '$id' ";  
      $result=  mysqli_query($conn,$sql); 
        if(!$result){
            $_SESSION['errors'] = "data not deleted";
        }else{
            
            $_SESSION['success'] = "data deleted succesfully";
        }
      
    }


    $fun->redirectAdmin('index.php?page=majors');
}