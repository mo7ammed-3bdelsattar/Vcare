<?php
$title='Users';
require_once 'includes/header.php';
require_once 'includes/nav.php';

$result=$db->gitAll('users');

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
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($user = $db->fetchAssoc($result)) : ?>
                                <tr>
                                    <td><a href="#"><?= $user['id'] ?></a></td>
                                    <td><?= $user['name'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['phone'] ?></td>
                                    <td><?= $user['type'] ?></td>
                                    <td><a href="<?= Functions::urlAdmin('index.php?page=edit-user&id=').$user['id'] ?>" class="btn btn-info">
                                            <i class="fa fa-fw fa-edit text-dark "></i></a></td>
                                    <td><a href="<?= Functions::urlAdmin('index.php?page=deleteUse&id=').$user['id'] ?>" data-confirm="Are you sure to delete this item?" class=" delete btn btn-danger ">
                                            <i class="fa fa-fw fa-trash text-dark "></i></a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="<?= Functions::urlAdmin('index.php?page=add-user') ?>" class="btn btn-sm btn-info float-left">Place New User</a>
                </div>
                <!-- /.card-footer -->
            </div>
        </div>
    </section>


</div>

<?php require_once 'includes/footer.php';
?>