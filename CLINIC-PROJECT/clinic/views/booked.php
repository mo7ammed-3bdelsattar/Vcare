<?php
$title = 'book';
require_once "includes/header.php";
require_once "includes/nav.php";
$db = new Database();
$fun = new Functions();
$logIn = new Validation();
$conn = $db->connection('clinc');
$id = $_SESSION['auth']['id'];
$sql = "SELECT `books`.*,`doctors`.`id` As doc_id ,`doctors`.`name` As doc_name ,`doctors`.`adress` As 
doc_adress ,`doctors`.`image` As doc_image ,`doctors`.`days` As doc_days ,`doctors`.`start-end` As doc_start
  FROM `books` INNER JOIN `doctors` ON `doctors`.`id`=`books`.`doctor_id`  WHERE `books`.`user_id` = '$id' AND `books`.`status` = 'pending' OR `books`.`status`='visited' ";
$result = mysqli_query($conn, $sql);


?>

<section class="content">
  <div class="container-fluid py-5">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Books</li>
      </ol>
    </nav>
    <div class="row">

      <?php
      while ($doctor = mysqli_fetch_assoc($result)) : ?>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column py-3">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              Doctor you booked with
            </div>

            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>Doctor: <?= $doctor['doc_name'] ?></b></h2>
                  <p class="text-muted text-sm"><b>Status:</p><?= $doctor['status'] ?> </p> </b>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: <?= $doctor['doc_adress'] ?></li>
                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-calendar"></i></span> Days: <?= $doctor['doc_days'] ?> From <?= $doctor['doc_start'] ?> </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="<?= $doctor['doc_image'] ?>" alt="user-avatar" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <?php if($doctor['status']=='pending'): ?>
            <a href="#"
            class="float-right btn-tool"><button class="btn btn-primary text-center">Calncel</button></a>
            <?php endif;?>
          </div>
        </div>
      <?php
      endwhile; ?>
    </div>
  </div>
</section>
<?php require_once "includes/footer.php";
