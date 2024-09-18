<?php

 
$title = "Registration Page";
require_once "includes/header.php";
 require_once "includes/nav.php"; 
require_once "classes/Functions.php"; ?>

<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>VCare</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>

                <form action="<?=Functions::url('index.php?page=user-register')?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['name'] ?? ""; ?></span>

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['email'] ?? ""; ?></span>

                    <div class="input-group mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['phone'] ?? ""; ?></span>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="passowrd" name="passowrd" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['password'] ?? ""; ?></span>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="confirm" name="confirm"  placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['confirm'] ?? ""; ?></span>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?=Functions::url('index.php?page=login')?>" class="text-center">I already have a membership</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>
<?php require_once "includes/footer.php" ?>
