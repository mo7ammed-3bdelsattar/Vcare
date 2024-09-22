<?php
if (!isset($_SESSION['auth'])) {
    (new Functions)->redirect('index.php');
}
$title = 'Profile';
require_once "includes/header.php";
require_once "includes/nav.php";
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
                                    title: 'Welcome!',
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
                        <?php
                        $major = $db->getRow('majors', $_SESSION['auth']['major_id'])
                        ?>
                        <p class="text-muted text-center"><?= $major['title']  ?></p>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                        <div class="card-header">

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
                    </div>
                    <!-- /.card-header -->

                    <?php
                    $id = $_SESSION['auth']['id'];

                    $sql = "SELECT * FROM `books` WHERE `doctor_id` = '$id' AND `status` = 'pending'";
                    $result1 = mysqli_query($conn, $sql);

                    ?>

                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <?php if (isset($_SESSION['errors'])) : ?>
                                <div class="tab-pane" id="activity">
                                <?php else : ?>
                                    <div class="active tab-pane" id="activity">
                                    <?php endif; ?>
                                    <!-- Patient -->
                                    <?php if ($db->numRows($result1) > 0) :
                                        while ($patient = mysqli_fetch_assoc($result1)) :


                                    ?>
                                            <div class="container py-5">
                                                <div class="row">
                                                    <div class="card col-md-4 text-center">
                                                        <ul class="list-inline pb-3">
                                                            <li class="list-inline-item text-right">
                                                                <img class="img-circle img-bordered-sm" src="assets/images/users/00.png" alt="user image">
                                                            </li>
                                                            <li >
                                                                <span class="username">
                                                                    <h6><strong>Patient Name:</strong><?=$patient['name']?></h6>
                                                                </span>
                                                            </li>
                                                            <li >
                                                            <span class="description">Booked at: <?= $patient['date'] ?></span>
                                                            </li>
                                                        </ul>
                                                        <a class="btn" href="<?= Functions::url('index.php?page=delete-book&pat_id=' . $patient['patient_id'] . '&doc_id=' . $id) ?>" class="float-right btn-tool"><button class="btn btn-primary text-center">Confirm</button></a>

                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.Patient -->
                                        <?php endwhile;
                                    else : ?>
                                        <div class="text-center text-muted">
                                            <p>You have no patient</p>
                                        </div>
                                    <?php endif; ?>
                                    </div>

                                    <?php if (isset($_SESSION['errors'])) : ?>
                                        <div class="active tab-pane" id="settings">
                                        <?php else : ?>
                                            <div class="tab-pane" id="settings">
                                            <?php endif; ?>

                                            <form class="form-horizontal" action="<?= Functions::url('index.php?page=settings&id=') . $_SESSION['auth']['user_id'] ?>" method="POST">
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
<?php

unset($_SESSION['errors']);

require_once "includes/footer.php" ?>