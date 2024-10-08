<?php

$title = 'Add Doctor';
require_once 'includes/header.php';
require_once 'includes/nav.php';

$result1 = $db->gitAll('majors');
$sql = "SELECT * FROM `users` WHERE `type`='user'";
$result2 = $db->query($conn, $sql);
$majorSelect = $db->fetchAssoc($result1);
$userSelect = $db->fetchAssoc($result2);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Doctor</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Functions::urlAdmin('index.php') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Add Doctor</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Add Doctor</h3>
                </div>
                <!-- /.card-header -->
                <?php
                if (isset($_SESSION['success'])) : ?>
                    <div class="alert alert-success text-center">
                        <?= $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?></div>
                <?php endif; ?>
                <form action="<?= Functions::urlAdmin("index.php?page=addDoc") ?>" class="form border p-3" method="POST">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control">
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?? "" ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control">
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?? "" ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" class="form-control">
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?? "" ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="">image</label>
                            <input type="text" name="image" class="form-control">
                            <span class="text-danger"><?= $_SESSION['errors']['image'] ?? "" ?></span>
                        </div>
                        <div class="form-group">
                            <label for="">User</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="user" aria-label="select example" placeholder="Select User">
                                <option value="<?= $userSelect['id'] ?>" selected="selected"><?= $userSelect['name'] ?></option>
                                <?php while ($user = $db->fetchAssoc($result2)) : ?>
                                    <option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <span class="text-danger"><?= $_SESSION['errors']['rate'] ?? "" ?></span>
                        </div>
                        <div class="form-group">
                            <label for="">Major</label>
                            <select class="form-control select2bs4" style="width: 100%;" name="major" aria-label="select example" placeholder="Select Major">
                                <option value="<?= $majorSelect['id'] ?>" selected="selected"><?= $majorSelect['title'] ?></option>
                                <?php while ($major = $db->fetchAssoc($result1)) : ?>
                                    <option value="<?= $major['id'] ?>"><?= $major['title'] ?></option>
                                <?php endwhile; ?>
                            </select>
                            <span class="text-danger"><?= $_SESSION['errors']['rate'] ?? "" ?></span>
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" class="form-control">
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?? "" ?></span>
                        </div>
                        <div class="mb-3">
                        <label for="">Dates</label>
                            <ul class="list-inline pb-3">
                                <li class="list-inline-item text-right">
                                    Days
                                    <input type="text" name="days" id="days" >
                                </li>
                                <li class="list-inline-item text-right">
                                    Start-End
                                    <input type="text" name="start_end" id="days" >
                                </li>
                            </ul>
                            <span class="text-danger"><?= $_SESSION['errors']['image'] ?? "" ?></span>
                        </div>

                        <input type="submit" value="Submit" class="form-control text-white bg-primary">
                        <a href="<?= Functions::urlAdmin('index.php?page=doctors') ?>">All Doctors</a>
                    </div>
                </form>

            </div>
        </div>
    </section>


</div>

<?php
unset($_SESSION['errors']);
require_once 'includes/footer.php';
?>