<?php
require_once "classes/Functions.php";
?>
<nav class=" navbar navbar-expand-lg navbar-light bg-blue shadow">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="navbar-brand">
            <a class="fw-bold text-white m-0 text-decoration-none h3" href="<?= Functions::url('index.php?page=home') ?>">VCare</a>
        </div>

        <button class="navbar-toggler btn-outline-light border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="collapse navbar-collapse justify-content-between " id="navbarSupportedContent">
                <div class="d-flex gap-3 flex-wrap justify-content-center" role="group">
                    <a type="button" class="btn text-light navigation--button" href="<?= Functions::url('index.php?page=home') ?>">Home</a>
                    <a type="button" class="btn text-light navigation--button" href="<?= Functions::url('index.php?page=majors') ?>">majors</a>
                    <a type="button" class="btn text-light navigation--button" href="<?= Functions::url('index.php?page=doctors') ?>">Doctors</a>
                </div>
            </div>
            <div class="navbar align-self-center d-flex gap-3">
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>
                <a class="nav-icon d-none d-lg-inline" href="<?= Functions::url('index.php?page=search') ?>" >
                    <i class="fa fa-fw fa-search text-dark mr-2" style="font-size:24px"></i>
                </a>
                <?php if(!isset($_SESSION['auth'])): ?>
                <a class="nav-icon position-relative text-decoration-none" href="<?= Functions::url('index.php?page=login') ?>">
                    <i class="fa fa-sign-in text-dark" aria-hidden="true" style="font-size:24px"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <?php endif; ?>
                <?php if(isset($_SESSION['auth'])): ?>

                <a class="nav-icon position-relative text-decoration-none" href="<?php
                    if($_SESSION['auth']['type']=="admin"): echo
                    Functions::url('index.php?page=view_admin') ;
                    elseif($_SESSION['auth']['type']=='doctor'):
                        echo Functions::url('index.php?page=profile-doc');
                    else: 
                        echo Functions::url('index.php?page=profile-user');
    
                    endif;    
                    ?>">
                    <i class="fa fa-fw fa-user text-dark mr-3" style="font-size:24px"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <a class="nav-icon position-relative text-decoration-none" href="<?= Functions::url('index.php?page=logout') ?>">
                    <i class="fa fa-fw fa-sign-out text-dark mr-3" style="font-size:24px"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark"></span>
                </a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>