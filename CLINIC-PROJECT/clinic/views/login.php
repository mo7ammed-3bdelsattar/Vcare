<?php
session_start();
$title = "Registration Page";
require_once "includes/header.php";
require_once "includes/nav.php";
require_once "classes/Functions.php"; 
require_once "classes/validation.php"; 
?>

<div class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>VCare</b></a>
        </div>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Register a new membership</p>
                <form action="<?= Functions::url('index.php?page=user-login') ?>" method="POST">
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
                        <input type="password"  class="form-control" id="password" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <span class = "text-danger"><?= $_SESSION['errors']['password'] ?? ""; ?></span>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <a href="<?= Functions::url('index.php?page=register') ?>" class="text-center">Don't have an account?</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</div>
<?php require_once "includes/footer.php" ?>