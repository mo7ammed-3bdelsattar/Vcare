<?php
$title = 'Profile';
require_once "includes/header.php";
$admin = $db->getRow('users', $_SESSION['auth']['id']);

?>
<div class="wrapper">
    <?php require_once "includes/nav.php" ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle rounded-circle card-image-circle" src="../<?= $admin['image'] ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $admin['name'] ?></h3>


                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><span class="fas fa-envelope"></span> Email</strong>

                                <p class="text-muted">
                                    <?= $admin['email'] ?>
                                </p>

                                <hr>

                                <strong><span class="fas fa-phone"></span> Phone</strong>

                                <p class="text-muted"><?= $admin['phone'] ?></p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>

                        <!-- /.card -->
                    </div>

                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <?php if (isset($_SESSION['errors']) || isset($_SESSION['success'])) : ?>
                                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>
                                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>

                                    <?php else : ?>
                                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>

                                    <?php endif; ?>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="text-center text-muted">
                                            <p>You have nothing</p>
                                        </div>
                                    </div>

                                    <?php if (isset($_SESSION['errors']) || isset($_SESSION['success'])) : ?>
                                        <div class="active tab-pane" id="settings">
                                        <?php else : ?>
                                            <div class="tab-pane" id="settings">
                                            <?php endif; ?>
                                            <?php if (isset($_SESSION['success'])) : ?>
                                                <div class="alert alert-success text-center">
                                                    <?php
                                                    echo $_SESSION['success'];
                                                    unset($_SESSION['success']);
                                                    ?>
                                                </div>
                                            <?php endif; ?>
                                            <form class="form-horizontal" action="<?= Functions::url('index.php?page=settings&id=') . $_SESSION['auth']['id'] ?>" method="POST">
                                                <span class="text-danger"><?= $_SESSION['errors']['db'] ?? ""; ?></span>
                                                <div class="form-group row">
                                                    <label for="old-password" class="col-sm-2 col-form-label">Old Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="old-password" id="inputName" placeholder="Old Password">
                                                        <span class="text-danger"><?= $_SESSION['errors']['o-password'] ?? ""; ?></span>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="old-password" class="col-sm-2 col-form-label">New Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="new-password" id="inputName" placeholder="New Password">
                                                        <span class="text-danger"><?= $_SESSION['errors']['password'] ?? ""; ?></span>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="old-password" class="col-sm-2 col-form-label">Confirm Password</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="Confirm" id="inputName" placeholder="Confirm Password">
                                                        <span class="text-danger"><?= $_SESSION['errors']['confirm'] ?? ""; ?></span>

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                            <!-- /.tab-pane -->
                                        </div>
                                        <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
</div>
<?php
unset($_SESSION['errors']);
require_once "includes/footer.php" ?>