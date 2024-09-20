<?php
if (!isset($_SESSION['auth'])) {
    (new Functions)->redirect('index.php');
}
$title = 'Profile';
require_once "includes/header.php";
require_once "includes/nav.php";
$db = new Database();
$conn = $db->connection('clinc');
if (isset($_GET['pat_id'])&&isset($_GET['doc_id'])&&isset($_GET['use_id'])) {
    $pat_id=$_GET['pat_id'];
    $use_id=$_GET['use_id'];
    $doc_id=$_GET['doc_id'];
    $db->delete('patient',$pat_id);
    $data=[
        'doctor_id'=> $doc_id,
        'user_id'=> $use_id,
    ];

    $db->insert('visitors',$data);
    
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle rounded-circle card-image-circle" src="<?= $_SESSION['auth']['image'] ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $_SESSION['auth']['name'] ?></h3>
                        <?php if ($_SESSION['auth']['type'] == 'doctor') :
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            Medecin
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted"><?= $_SESSION['auth']['adress'] ?></p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            <?php
                            $id=$_SESSION['auth']['id'];
                            $sql = "SELECT `patient`.* , `doctors`.`id` AS doc_id ,`doctors`.`name` FROM 
                            `patient` INNER JOIN `doctors` ON `doctors`.`id`=`patient`.`doctor_id`
                            WHERE `patient`.`doctor_id`='$id'";
                            $result1 = mysqli_query($conn, $sql);
            ?>
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
                            <div class="active tab-pane" id="activity">
                                <!-- Patient -->
                                <?php if ($db->numRows($result1) > 0) :
                                    while ($patient = mysqli_fetch_assoc($result1)) :
                                        $user=$db->getRow('users',$patient['user_id']);

                                ?>
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="<?= $user['image'] ?>" alt="user image">
                                                <span class="username">
                                                    <a href="#"><?= $user['name'] ?></a>
                                                    <a href=
                                                    "<?=Functions::url('index.php?page=profile&pat_id='.$patient['id'].'&doc_id='.$id.'&use_id='.$user['id'])?>"
                                                      class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Booked - 7:30 PM today</span>
                                            </div>
                                        </div>

                                        <!-- /.Patient -->
                                    <?php endwhile; else : ?>
                                    <div class="text-center text-muted">
                                        <p>You have no patient</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
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
<?php require_once "includes/footer.php" ?>