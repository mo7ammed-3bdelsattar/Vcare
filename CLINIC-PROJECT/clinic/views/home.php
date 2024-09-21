<?php
$title = 'Home';
require_once "includes/header.php";
require_once "includes/nav.php";


$func = new Functions();
$db = new Database();
$conn = $db->connection('clinc');
$result1 = $db->gitAll('info');
$sql1="SELECT * FROM `doctors` ORDER BY `visitors` ASC LIMIT 5";
$result2 = $db->gitAll('majors');
$result3 = $db->query($conn,$sql1);
$info = $db->fetchAll($result1);
$major = $db->fetchAll($result2);
$doctor = $db->fetchAll($result3);

?>

<div class="page-wrapper">
    <div class="container-fluid bg-blue text-white pt-3">
        <div class="container pb-5">
            <div class="row gap-2">
                <div class="col-sm order-sm-2">
                    <img src="<?= $info[0]['image'] ?>" class="img-fluid banner-img banner-img" alt="banner-image" height="200">
                </div>
                <div class="col-sm order-sm-1">
                    <h1 class="h1"><?= $info[0]['title'] ?></h1>
                    <p><?= $info[0]['description'] ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="h1 fw-bold text-center my-4">majors</h2>
        <div class="d-flex flex-wrap gap-4 justify-content-center">
            <?php foreach ($major as $key => $value) : ?>
                <div class="card p-2" style="width: 18rem;">
                    <img src="<?= $major[$key]['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center"><?= $major[$key]['title'] ?></h4>
                        <a href="<?= Functions::url('index.php?page=doctors&major_id=') . $major[$key]['id'] ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="h1 fw-bold text-center my-4">Best 5 Doctors</h2>
        <section class="splide home__slider__doctors mb-5">
            <div class="splide__track ">
                <ul class="splide__list">
                    <?php foreach ($doctor as $key => $value) : ?>
                        <li class="splide__slide">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="<?= $doctor[$key]['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center"><?= $doctor[$key]['name'] ?></h4>
                                    <h6 class="card-title fw-bold text-center"><?= $major[$key]['title'] ?></h6>
                                    <a href="<?php if(isset($_SESSION['auth'])){echo Functions::url('index.php?page=book&id=').$doctor[$key]['id']; } 
                                                        else{echo Functions::url('index.php?page=login');}
                                    ?>" class="btn btn-outline-primary card-button">Book an
                                        appointment</a>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </div>
    <div class="container">
        <h1><br></h1>
        <div class="info">
            <div class="info__details">
                <img src="<?= $info[1]['image'] ?>" alt="" width="50" height="50">
                <h4 class="title m-0">
                    <?= $info[1]['title'] ?>
                </h4>
                <p class="content">
                    <?= $info[1]['description'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php require_once "includes/footer.php" ?>