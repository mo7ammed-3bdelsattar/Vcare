<?php
$title='Users';
require_once 'includes/header.php';
require_once 'includes/nav.php';
if(isset($_GET['id'])):

    $id=$_GET['id'];
$user=$db->getRow('users',$id);

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= Functions::urlAdmin('index.php') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
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
                    <h3 class="card-title">Edit User</h3>
                </div>
                <!-- /.card-header -->
                <?php
    if (isset($_SESSION['success'])) : ?>
        <div class="alert alert-success text-center">
            <?= $_SESSION['success'];
            unset($_SESSION['success']);
            ?></div>
    <?php endif; ?>
    <form action="<?= Functions::urlAdmin("index.php?page=editUse") ?>" class="form border p-3" method="POST">
        <div class="mb-3">
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control">
                <span class="text-danger"><?= $_SESSION['errors']['name'] ?? "" ?></span>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" value="<?= $user['email'] ?>"  class="form-control">
                <span class="text-danger"><?= $_SESSION['errors']['email'] ?? "" ?></span>
            </div>
            <div class="mb-3">
                <label for="">Phone</label>
                <input type="text" name="phone" value="<?= $user['phone'] ?>"  class="form-control">
                <span class="text-danger"><?= $_SESSION['errors']['phone'] ?? "" ?></span>
            </div>
            <div class="mb-3">
                <label for="">image</label>
                <input type="text" name="image" value="<?= $user['image'] ?>"  class="form-control">
                <span class="text-danger"><?= $_SESSION['errors']['image'] ?? "" ?></span>
            </div>
            <div class="mb-3">
                <label for="">Type</label>
                <input type="text" name="type" value="<?= $user['type'] ?>"  class="form-control">
                <span class="text-danger"><?= $_SESSION['errors']['image'] ?? "" ?></span>
            </div>
            <input type="submit" value="Submit" class="form-control text-white bg-primary">
            <a href="<?=Functions::urlAdmin('index.php?page=users')?>">All Users</a>
        </div>
    </form>
                
            </div>
        </div>
    </section>


</div>

<?php 
endif;
require_once 'includes/footer.php';
?>