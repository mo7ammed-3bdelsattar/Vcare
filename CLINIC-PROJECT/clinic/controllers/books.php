<?php
$title = 'book';
require_once "includes/header.php";
require_once "includes/nav.php";
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
  $resul2t = mysqli_query($conn, $sql2);
  $_SESSION['message'] = "booked successfully";
}
?>
<?php
$sql = "SELECT * FROM `doctors` WHERE id = '$patient[doctor_id]'";
$result = mysqli_query($conn, $sql);
$doctor = mysqli_fetch_assoc($result);
?>

<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
  <div class="card bg-light d-flex flex-fill">
    <div class="card-header text-muted border-bottom-0">
      You booked with
    </div>
    <div class="card-body pt-0">
      <div class="row">
        <div class="col-7">
          <h2 class="lead"><b>Doctor: <?= $doctor['name'] ?></b></h2>
          <p class="text-muted text-sm"><b>Status: </b> Pending... </p>
          <ul class="ml-4 mb-0 fa-ul text-muted">
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $doctor['adress'] ?></li>
            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Days: <?= $doctor['days'] ?> From <?= $doctor['start-end'] ?> </li>
          </ul>
        </div>
        <div class="col-5 text-center">
          <img src="<?= $doctor['image'] ?>" alt="user-avatar" class="img-circle img-fluid">
        </div>
      </div>
    </div>
  </div>
</div>
<?php require_once "includes/footer.php";
