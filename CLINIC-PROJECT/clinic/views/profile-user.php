<?php
$title = 'Profile';
require_once "includes/header.php";
require_once "includes/nav.php";
if (!isset($_SESSION['auth'])) {
    (new Functions)->redirect('index.php');
}
$func = new Functions();
$db = new Database();
$conn = $db->connection('clinc');
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <?php if (isset($_SESSION['success'])) :

                    echo "<script>
                            Swal.fire({
                                title: 'well done!',
                                text: ' $_SESSION[success]',
                                icon: 'success'
                            });
                         </script>";
                    unset($_SESSION['success']);

                endif;
                ?>
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle rounded-circle card-image-circle" src="<?= $_SESSION['auth']['image'] ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $_SESSION['auth']['name'] ?></h3>
                        <p class="text-muted text-center"></p>

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
                        <strong><i class="fas fa-phone mr-1"></i> phone</strong>
                        <p class="text-muted"><?= $_SESSION['auth']['phone'] ?></p>

                        <hr>

                        <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                        <p class="text-muted"><?= $_SESSION['auth']['email'] ?></p>

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

                            <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <div class=" tab-pane active" id="settings">
                                <form class="form-horizontal" action="<?= Functions::url('index.php?page=settings&id=') . $_SESSION['auth']['id'] ?>" method="POST">
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
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<?php unset($_SESSION['errors']); ?>
<?php require_once "includes/footer.php" ?>