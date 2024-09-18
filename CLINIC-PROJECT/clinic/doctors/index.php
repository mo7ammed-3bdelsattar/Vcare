<?php
$title = 'Doctors';
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "classes/Functions.php";
require_once "classes/Database.php";
$db = new Database();
$conn = $db->connection('clinc');
$result3 = $db->gitAll('doctors');
$doctor = $db->fetchAll($result3);



?>
<div class="page-wrapper">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href=".<?= Functions::url('index.php?page=home') ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>
        <div class="doctors-grid">
            <div class="d-flex flex-wrap gap-4 justify-content-center">
                <?php foreach ($doctor as $key => $value) : ?>
                    <div class="card p-2" style="width: 18rem;">
                        <img src="<?= $doctor[$key]['image'] ?>" class="card-img-top rounded-circle card-image-circle" alt="major">
                        <div class="card-body d-flex flex-column gap-1 justify-content-center">
                            <h4 class="card-title fw-bold text-center"><?= $doctor[$key]['name'] ?></h4>
                            <a href="<?= Functions::url('index.php?page=book&id=') . $doctor[$key]['id'] ?>" class="btn btn-outline-primary card-button">Browse Doctors</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link page-prev" href="#" aria-label="Previous">
                        <span aria-hidden="true">
                            < </span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link page-next" href="#" aria-label="Next">
                        <span aria-hidden="true"> > </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php
require_once "includes/footer.php";
?>