<?php
$title = 'Book';
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "classes/Functions.php";
$func = new Functions();
$db = new Database();
$conn = $db->connection('clinc');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT `doctors`.* , `majors`.`id` AS maj_id ,`majors`.`title` FROM 
              `doctors` INNER JOIN `majors` ON `majors`.`id`=`doctors`.`major_id` WHERE `doctors`.`id`='$id' ";
}
else {
  $sql = "SELECT `doctors`.* , `majors`.`id` AS maj_id ,`majors`.`title` FROM 
              `doctors` INNER JOIN `majors` ON `majors`.`id`=`doctors`.`major_id`";
}
$result = mysqli_query($conn, $sql);
if ($result) {
  $doctor = $db->fetchAll($result);
} else {
  $sql = "SELECT `doctors`.* , `majors`.`id` AS maj_id ,`majors`.`title` FROM `doctors` INNER JOIN 
         `majors` ON `majors`.`id`=`doctors`.`major_id`
         ";
  $result = $db->query($conn, $sql);
  $doctor = $db->fetchAll($result);
}

?>
 <?php if (isset($_SESSION['success'])) :

echo "<script>
Swal.fire({
title: 'Welcome!',
text: ' $_SESSION[messege]',
icon: 'success'
});
</script>";
unset($_SESSION['success']);
endif;
?>
<div class="page-wrapper">
  <div class="container">
    <nav
      style="--bs-breadcrumb-divider: '>'"
      aria-label="breadcrumb"
      class="fw-bold my-4 h4">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="<?= Functions::url('index.php?page=home') ?>">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="<?= Functions::url('index.php?page=doctors') ?>">doctors</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          doctor name
        </li>
      </ol>
    </nav>
    <div class="d-flex flex-column gap-3 details-card doctor-details">
      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
        <div class="card bg-light d-flex flex-fill">
          <div class="card-header text-muted border-bottom-0">
            Digital Strategist
          </div>
          <div class="card-body pt-0">
            <div class="row">
            <?php
                if($db->numRows($result)>0):
                foreach ($doctor as $key => $value) : ?>
                 <?php endforeach;
              endif; ?>
              <div class="col-7">
                <h2 class="lead"><b><?= $doctor[$key]['name'] ?></b></h2>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                  <li class="small"><span class="fa-li"><i class="fas fa-envelope mr-1"></i></span> Email Adress: <?= $doctor[$key]['email'] ?></li>
                  <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone: <?= $doctor[$key]['phone'] ?></li>
                </ul>
              </div>
              <div class="col-5 text-center">
                <img src="<?= $doctor[$key]['image'] ?>" alt="user-avatar" class="img-circle img-fluid">
              </div>
             
            </div>
          </div>
          <div class="card-footer">
          </div>
        </div>
      </div>
      <hr />
      <form class="form-horizontal" action="<?= Functions::url('index.php?page=patients&id='.$id.'&user_id='.$_SESSION['auth']['id'])?> " method="POST">
        <div class="form-items">
          <div class="mb-3">
            <label class="form-label required-label" for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" required />
            <span class="text-danger"><?= $_SESSION['errors']['name'] ?? ""; ?></span>
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="phone">Phone</label>
            <input type="tel" class="form-control" name="phone" id="phone" required />
            <span class="text-danger"><?= $_SESSION['errors']['phone'] ?? ""; ?></span>
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required />
            <span class="text-danger"><?= $_SESSION['errors']['email'] ?? ""; ?></span>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Confirm Booking
        </button>
      </form>
    </div>
  </div>
</div>
<?php
unset($_SESSION['errors']);
require_once "includes/footer.php";
?>